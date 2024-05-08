<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\KategoriPost;
use App\Models\Event;
use App\Helpers;
Use Redirect;
use DB;
use Auth;
use Hash;
use Brian2694\Toastr\Facades\Toastr;

class EventController extends Controller
{
    public function index(Request $request)
    {
        if (Auth::user()->status=='Active')
        {

            $kategori = KategoriPost::where('jenis', 'Event')->get();

            $id_kategori_post = $request->id_kategori_post;
            if(!empty($id_kategori_post)){
                $data = Event::query()
                ->where('id_kategori_post', 'like', "%" . $id_kategori_post . "%")
                ->paginate(5);

            }else{

                $data = Event::orderBy('created_at', 'DESC')->paginate(5);
            }

            return view('admin.event.data_event', compact('data','kategori'));

            }
            else
            {
                return redirect()->route('home');
            }
    }


    public function TambahEvent()
    {
        $kategori = KategoriPost::where('jenis', 'Event')->get();
        return view('admin.Event.tambah_event', compact('kategori'));
    }

    public function viewEdit($id)
    {
        $data = Event::where('id_Post',$id)->get();
        $kategori = KategoriPost::all();
        return view('admin.Event.edit_event',compact('data', 'kategori'));
    }



    public function saveevent(Request $request)
    {
        // dd($request);die;
        $request->validate([
            'id_kategori_post'              => 'required',
            'author'                        => 'required',
            'tanggal_mulai'                       => 'required',
            'tanggal_selesai'                       => 'required',
            'title_slug'                    => 'required',
            'title'                         => 'required',
            'lokasi'                       => 'required',
            'avatar'                        => 'required|image|mimes:jpeg,jpg,png|max:5000',

            'post_status'                   => 'required',
            'hits'                          => 'required',

        ]);

        //  dd($request);die;

        $file2 = time().'.'.$request->avatar->extension();
        $request->avatar->move(public_path('images/Event'), $file2);


        $form = new Event;
        $form->id_kategori_post                   = $request->id_kategori_post;
        $form->author                               = $request->author;
        $form->tanggal_mulai                              = $request->tanggal_mulai;
        $form->tanggal_selesai                              = $request->tanggal_selesai;
        $form->avatar                               = $file2;
        $form->title_slug                           = $request->title_slug;
        $form->title                                = $request->title;
        $form->lokasi                              = $request->lokasi;

        $form->post_status                         = $request->post_status;
        $form->hits                                = $request->hits;

        // dd($form);die;

        $form->save();
        Toastr::success('Data Berhasil Disimpan :)','Success');
        return redirect()->route('admin/event/data_event');
    }

    public function updatePost(Request $request)
    {
       $id_event                   = $request->id_event;
       $id_kategori_post          = $request->id_kategori_post;
       $author                      = $request->author;
       $tanggal_mulai                     = $request->tanggal_mulai;
       $tanggal_selesai                    = $request->tanggal_selesai;
       $title_slug                  = $request->title_slug;
       $title                       = $request->title;
       $lokasi                     = $request->lokasi;

       $post_status                 = $request->post_status;


       $old_image = Event::find($id_event);
       $image_name = $request->hidden_image;
       $image = $request->file('image');

       if($old_image->avatar=='group-xxl.png')
       {
           if($image != '')
           {
               $image_name = rand() . '.' . $image->getClientOriginalExtension();
               $image->move(public_path('images/Event/'), $image_name);
           }
       }
       else{

           if($image != '')
           {
               $image_name = rand() . '.' . $image->getClientOriginalExtension();
               $image->move(public_path('images/Event/'), $image_name);
               unlink(public_path('images/Event/'.$old_image->avatar));
           }
       }

       $update = [

            'id_event'                  => $id_event,
            'id_kategori_post'             => $id_kategori_post,
           'author'                        => $author,
           'tanggal_mulai'                      => $tanggal_mulai,
           'tanggal_selesai'                      => $tanggal_selesai,
           'avatar'                       => $image_name,
           'title_slug'                   => $title_slug,
           'title'                        => $title,
           'lokasi'                      => $lokasi,

           'post_status'                  => $post_status,
       ];
       Event::where('id_event',$request->id_event)->update($update);
       Toastr::success('Event Berhasil Diupdate :)','Success');
       return redirect()->route('admin/event/data_event');
    }

    public function deleteevent(Request $request)
    {
        $data = Event::findOrFail($request->id_event);
        unlink(public_path('images/Event/'.$data->avatar));
        $data->delete();
        Toastr::success('Event Berhasil Dihapus :)','Success');
        return redirect()->route('admin/event/data_event');
    }
}
