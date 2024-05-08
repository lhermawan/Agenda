<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\KategoriPost;
use DB;
use Auth;
use Hash;
use Brian2694\Toastr\Facades\Toastr;
use RealRashid\SweetAlert\Facades\Alert;

class KategoriPostController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        if (Auth::check() && Auth::user()->name == 'Admin')
        {

        $data = KategoriPost::all();
        return view('admin.post.kategori_post', compact('data'));

        }
        else
        {
            return redirect()->route('home');
        }
    }


    public function saveKategoriPost(Request $request)
    {
        $request->validate([
            'nama_kategori'                   => 'required',
            'jenis'                   => 'required',
        ]);

        $form = new KategoriPost;
        $form->nama_kategori                   = $request->nama_kategori;
        $form->jenis                   = $request->jenis;

        // dd($form);die;

        $form->save();
        Alert::success('Data Berhasil Disimpan :)','Success');
        return redirect()->route('admin/post/kategori_post');
    }

    public function updateKategoriPost(Request $request)
    {
       $id_kategori_post              = $request->id_kategori_post;
       $nama_kategori                        = $request->nama_kategori;
       $jenis                        = $request->jenis;

       $update = [

           'id_kategori_post'             => $id_kategori_post,
           'nama_kategori'                       => $nama_kategori,
           'jenis'                       => $jenis,
       ];
       KategoriPost::where('id_kategori_post',$request->id_kategori_post)->update($update);
       Alert::success('Data Berhasil Diubah :)','Success');
       return redirect()->route('admin/post/kategori_post');
    }

    public function deleteKategoriPost(Request $request)
    {
        $data = KategoriPost::findOrFail($request->id_kategori_post);
        $data->delete();
        Alert::success('Data Berhasil Dihapus :)','Success');
        return redirect()->route('admin/post/kategori_post');
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
