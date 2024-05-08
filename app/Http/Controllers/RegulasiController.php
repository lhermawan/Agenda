<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Regulasi;
use App\Helpers;
Use Redirect;
use RealRashid\SweetAlert\Facades\Alert;
use DB;
use Auth;
use Hash;
use Brian2694\Toastr\Facades\Toastr;

class RegulasiController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(Request $request)
    {
        if (Auth::check() && Auth::user()->name == 'Admin')
        {
            $data = Regulasi::orderBy('tanggal', 'DESC')->paginate(5);
            return view('admin.regulasi.regulasi', compact('data'));
        }
        else
        {
            return redirect()->route('home');
        }
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function saveRegulasi(Request $request)
    {
        // dd($request);die;
        $request->validate([
            'tanggal'                       => 'required',
            'judul'                         => 'required',
            // 'file'                         => 'required|image|mimes:jpeg,jpg,png|max:5000',
            'file'                          => 'required|file|mimes:pdf|max:5000',


        ]);

        //  dd($request);die;


        $file2 = time().'.'.$request->file->extension();
        $request->file->move(public_path('file/regulasi'), $file2);

        $form = new Regulasi;
        $form->judul                            = $request->judul;
        $form->tanggal                          = $request->tanggal;
        $form->file                             = $file2;

        // dd($form);die;

        $form->save();
        Alert::success('Data Berhasil Disimpan :)','Success');
        return redirect()->route('admin/regulasi/regulasi');
    }

    public function Download($id)
    {
        if (Auth::user()->status=='Active')
        {
            $data = Regulasi::find($id);
            $download = public_path().'/file/regulasi/' . $data->file;
            return response()->download($download);
        }
        else
        {
            return redirect()->route('home');
        }
    }


    public function deleteRegulasi(Request $request)
    {
        $data = Regulasi::findOrFail($request->id_regulasi);
        unlink(public_path('file/regulasi/'.$data->file));
        $data->delete();
        Alert::success('Berita Berhasil Dihapus :)','Success');
        return redirect()->route('admin/regulasi/regulasi');
    }

}
