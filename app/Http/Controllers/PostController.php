<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\KategoriPost;
use App\Models\Post;
use App\Helpers;
Use Redirect;
use DB;
use Auth;
use Hash;
use Brian2694\Toastr\Facades\Toastr;

class PostController extends Controller
{
    public function index(Request $request)
    {
        if (Auth::user()->status=='Active')
        {

            $kategori = KategoriPost::where('jenis', 'Berita')->get();

            $id_kategori_post = $request->id_kategori_post;
            if(!empty($id_kategori_post)){
                $data = Post::query()
                ->where('id_kategori_post', 'like', "%" . $id_kategori_post . "%")
                ->paginate(5);

            }else{

                $data = Post::orderBy('tanggal', 'DESC')->get();
            }

            return view('admin.post.data_post', compact('data','kategori'));

            }
            else
            {
                return redirect()->route('home');
            }
    }


    public function TambahPost()
    {
        $kategori = KategoriPost::where('jenis', 'Berita')->get();
        return view('admin.Post.tambah_Post', compact('kategori'));
    }

    public function viewEdit($id)
    {
        $data = Post::where('id_Post',$id)->get();
        $kategori = KategoriPost::all();
        return view('admin.Post.edit_Post',compact('data', 'kategori'));
    }



    public function savepost(Request $request)
    {
        // dd($request);die;
        $request->validate([
            'id_kategori_post'              => 'required',
            'author'                        => 'required',
            'tanggal'                       => 'required',
            'title_slug'                    => 'required',
            'title'                         => 'required',
            'content'                       => 'required',
            'avatar'                        => 'required|image|mimes:jpeg,jpg,png|max:5000',
            'waktu'                         => 'required',
            'post_status'                   => 'required',
            'hits'                          => 'required',

        ]);

        //  dd($request);die;

        $file2 = time().'.'.$request->avatar->extension();
        $request->avatar->move(public_path('images/post'), $file2);


        $form = new Post;
        $form->id_kategori_post                   = $request->id_kategori_post;
        $form->author                               = $request->author;
        $form->tanggal                              = $request->tanggal;
        $form->avatar                               = $file2;
        $form->title_slug                           = $request->title_slug;
        $form->title                                = $request->title;
        $form->content                              = $request->content;
        $form->waktu                                = $request->waktu;
        $form->post_status                         = $request->post_status;
        $form->hits                                = $request->hits;

        // dd($form);die;

        $form->save();
        Toastr::success('Data Berhasil Disimpan :)','Success');
        return redirect()->route('admin/post/data_post');
    }

    public function updatePost(Request $request)
    {
       $id_post                   = $request->id_post;
       $id_kategori_post          = $request->id_kategori_post;
       $author                      = $request->author;
       $tanggal                     = $request->tanggal;
       $title_slug                  = $request->title_slug;
       $title                       = $request->title;
       $content                     = $request->content;
       $waktu                       = $request->waktu;
       $post_status                 = $request->post_status;


       $old_image = Post::find($id_post);
       $image_name = $request->hidden_image;
       $image = $request->file('image');

       if($old_image->avatar=='group-xxl.png')
       {
           if($image != '')
           {
               $image_name = rand() . '.' . $image->getClientOriginalExtension();
               $image->move(public_path('images/Post/'), $image_name);
           }
       }
       else{

           if($image != '')
           {
               $image_name = rand() . '.' . $image->getClientOriginalExtension();
               $image->move(public_path('images/Post/'), $image_name);
               unlink(public_path('images/Post/'.$old_image->avatar));
           }
       }

       $update = [

            'id_post'                  => $id_post,
            'id_kategori_post'             => $id_kategori_post,
           'author'                        => $author,
           'tanggal'                      => $tanggal,
           'avatar'                       => $image_name,
           'title_slug'                   => $title_slug,
           'title'                        => $title,
           'content'                      => $content,
           'waktu'                        => $waktu,
           'post_status'                  => $post_status,
       ];
       Post::where('id_post',$request->id_post)->update($update);
       Toastr::success('Post Berhasil Diupdate :)','Success');
       return redirect()->route('admin/post/data_post');
    }

    public function deletePost(Request $request)
    {
        $data = Post::findOrFail($request->id_post);
        unlink(public_path('images/Post/'.$data->avatar));
        $data->delete();
        Toastr::success('Post Berhasil Dihapus :)','Success');
        return redirect()->route('admin/post/data_post');
    }
}
