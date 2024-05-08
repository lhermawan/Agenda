<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\website;

class WebsiteController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        $website = website::all();
        $halaman = 'website';
        return view('website', compact('website','halaman'));
    }
    public function cari(Request $request)
	{
		// menangkap data pencarian
		$cari = $request->cari;

    		// mengambil data dari table pegawai sesuai pencarian data
		$pegawai = DB::table('website')
		->where('host','like',"%".$cari."%")
        ->orWhere('status', 'LIKE', "%$cari%")
		->paginate();

    		// mengirim data pegawai ke view index
		return view('website',['website' => $pegawai]);
}


}
