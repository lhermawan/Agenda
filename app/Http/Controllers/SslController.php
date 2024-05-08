<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\ssl;

class SslController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        $ssl = ssl::all();
        $halaman = 'ssl';
        return view('ssl', compact('ssl','halaman'));
    }
    public function cari(Request $request)
	{
		// menangkap data pencarian
		$cari = $request->cari;

    		// mengambil data dari table pegawai sesuai pencarian data
		$pegawai = DB::table('website_ssl')
		->where('host','like',"%".$cari."%")
		->paginate();

    		// mengirim data pegawai ke view index
		return view('ssl',['ssl' => $pegawai]);
}
}
