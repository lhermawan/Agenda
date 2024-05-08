<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\KategoriPost;
use App\Models\Post;
use App\Models\Agenda;
use App\Helpers;
Use Redirect;
use DataTables;
use Carbon;
use DB;

class HomeController extends Controller
{
    public function index()
    {
        $agenda = Agenda::whereDate('tgl_agenda', date('Y-m-d'))->orderBy('waktu', 'asc')->limit(6)->Paginate(6);

        if(\request()->ajax()){
            $data = Agenda::whereDate('tgl_agenda', date('Y-m-d'))->get();
            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function($row){
                    $actionBtn = '<a href="javascript:void(0)" class="edit btn btn-success btn-sm">Edit</a> <a href="javascript:void(0)" class="delete btn btn-danger btn-sm">Delete</a>';
                    return $actionBtn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }
        return view('landingpage', compact('agenda'));
    }

    }

