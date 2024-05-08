<?php

namespace App\Http\Controllers;
use App\Models\KategoriPost;
use App\Models\Post;
use Illuminate\Http\Request;

class BeritaController extends Controller
{
    public function index()
    {
        $berita = Post::where('post_status', 'Publikasi')->orderBy('tanggal', 'DESC')->Paginate(4);
        $cabor = KategoriPost::all();
        $berita_baru = Post::where('post_status', 'Publikasi')->orderBy('created_at', 'DESC')->limit(5)->get();

        $berita_popular  = Post::where('post_status', 'Publikasi')->orderBy('hits', 'DESC')->limit(6)->get();
        $halaman = 'post/post';
        return view('post/post', compact('berita','halaman','berita_baru', 'berita_popular','cabor'));
    }
}
