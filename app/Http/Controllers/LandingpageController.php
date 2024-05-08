<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use App\Models\Post;

use DB;

class LandingpageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     *
     */
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
    public function __construct()
{
    $this->middleware('auth');
}
    public function index()
    {
        $data = DB::table('post')->count();
        $data1 = DB::table('event')->count();
        $halaman = 'admin/landingpage';
        return view('admin/landingpage', ['data' => $data], ['data1' => $data1], compact('halaman'));
    }
}
