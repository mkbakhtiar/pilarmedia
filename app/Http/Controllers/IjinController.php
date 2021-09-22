<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Session;
use DateTime;

class IjinController extends Controller
{
    public function index(){
        return view('ijin.index');
    }

    public function store(Request $request){
        $validatedData = $request->validate([
            'kategori' => 'required',
            'start_ijin' => 'required',
            'alasan' => 'required',
          ]);

          $var = $validatedData['start_ijin'];
            $dd = date("Y-m-d", strtotime($var) );

          $project = \App\Ijin::create([
            'id_karyawan' => Session::get('idUser'),
            'is_kategori' => $validatedData['kategori'],
            'is_approval' => 0,
            'date_ijin' => date('Y-m-d H:i:s'),
            'alasan' => $validatedData['alasan'],
            'start_ijin' => $dd,
          ]);
          if($project){
            Session::flash('sukses','Berhasil Mengajukan Ijin');
            return redirect('/f/ijin/list');
        }else{
            Session::flash('gagal','Gagal Mengajukan Ijin');
            return redirect('/f/ijin');
        }
    }
    public function show()
    {
        $d = \App\Ijin::all();
        $d=array(
            'data' => $d
        );
        return view('ijin.list')->with($d);

    }
}
