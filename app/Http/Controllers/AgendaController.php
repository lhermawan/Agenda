<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\models\Agenda;
use RealRashid\SweetAlert\Facades\Alert;
use Auth;

class AgendaController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        if (Auth::check() && Auth::user()->name == 'Admin')
        {

        $data = Agenda::all();
        return view('admin.agenda.agenda', compact('data'));

        }
        else
        {
            return redirect()->route('home');
        }
    }

    public function TambahAgenda()
    {
        // $kategori = KategoriPost::where('jenis', 'Berita')->get();
        return view('admin.agenda.tambah_agenda');
    }


    public function saveAgenda(Request $request)
    {
        $request->validate([
            'nama_agenda'                   => 'required',
            'lokasi'                        => 'required',
            'tgl_agenda'                    => 'required',
            'waktu'                         => 'required',
            'deskripsi'                     => 'required',

        ]);

        $form = new Agenda;
        $form->nama_agenda                  = $request->nama_agenda;
        $form->lokasi                       = $request->lokasi;
        $form->tgl_agenda                       = $request->tgl_agenda;
        $form->waktu                       = $request->waktu;
        $form->deskripsi                       = $request->tgl_agenda;



        // dd($form);die;

        $form->save();
        Alert::success('Data Berhasil Disimpan :)','Success');
        return redirect()->route('admin/agenda/agenda');
    }

    public function updateStatusAgenda(Request $request)
    {
       $id_agenda                       = $request->id_agenda;


       $update = [

           'id_agenda'                  => $id_agenda,
           

       ];
       Agenda::where('id_agenda',$request->id_agenda)->update($update);
       Alert::success('Data Berhasil Diubah :)','Success');
       return redirect()->route('admin/agenda/agenda');
    }

    public function updateAgenda(Request $request)
    {
       $id_agenda                       = $request->id_agenda;
       $nama_agenda                     = $request->nama_agenda;
       $lokasi                          = $request->lokasi;
       $tgl_agenda                      = $request->tgl_agenda;
       $deskripsi                       = $request->deskripsi;

       $update = [

           'id_agenda'                  => $id_agenda,
           'nama_agenda'                => $nama_agenda,
           'lokasi'                     => $lokasi,
           'tgl_agenda'                 => $tgl_agenda,
           'deskripsi'                  => $deskripsi,

       ];
       Agenda::where('id_agenda',$request->id_agenda)->update($update);
       Alert::success('Data Berhasil Diubah :)','Success');
       return redirect()->route('admin/agenda/agenda');
    }

    public function deleteKategoriPost(Request $request)
    {
        $data = Agenda::findOrFail($request->id_agenda);
        $data->delete();
        Alert::success('Data Berhasil Dihapus :)','Success');
        return redirect()->route('admin/agenda/agenda');
    }
}
