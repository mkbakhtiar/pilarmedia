<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Session;
use Illuminate\Support\Facades\Hash;
class DashboardController extends Controller
{
    public function index(){
        $d = DB::table('tb_absen')->where('id_karyawan', Session::get('idUser'))->get();

        $tTl = DB::table('tb_absen')->where('id_karyawan', Session::get('idUser'))->where('is_telat', 1)->where('kategori_absen','1')->whereMonth('date_absen',date('m'))->sum('menit');
        $tc = DB::table('tb_absen')->where('id_karyawan', Session::get('idUser'))->where('is_telat', 1)->where('kategori_absen','2')->whereMonth('date_absen',date('m'))->sum('menit');
        $sakit = DB::table('tb_ijin')->where('id_karyawan', Session::get('idUser'))->where('is_approval', 1)->where('is_kategori','1')->count();
        $cuti = DB::table('tb_ijin')->where('id_karyawan', Session::get('idUser'))->where('is_approval', 1)->where('is_kategori','2')->count();

        $data = array(
            'data' => $d,
            'telat' => $tTl,
            'cepat' => $tc,
            'sakit' => $sakit,
            'cuti' => $cuti,
        );
        return view('main.dashboard')->with($data);
    }
    public function tolak($id){
        $g=DB::table('tb_ijin')->where('id', $id)->update([
            'is_approval' => 0
        ]);

        Session::flash('sukses','Tolak Berhasil');
        return redirect('/d-manajer');
    }

    public function acc($id){
        $g=DB::table('tb_ijin')->where('id', $id)->update([
            'is_approval' => 1
        ]);

        Session::flash('sukses','ACC Berhasil');
        return redirect('/d-manajer');
    }

    public function manajer(){
        $d = DB::table('tb_absen')->join('tb_user','tb_absen.id_karyawan','=','tb_user.id')->get();
        $ds = \App\Ijin::all();
        $data = array(
            'data' => $d,
            'pj' => $ds,
        );
        return view('main.d_manajer')->with($data);
    }

    public function profil(){
        $ge = DB::table('tb_user')->where('id', Session::get('idUser'))->first();
        $d=array(
            'data' => $ge
        );
        return view('main.profil')->with($d);
    }
    public function updateProfil(Request $request){
        if($request->password != ''){
            DB::table('tb_user')->where('id', $request->id)->update([
                'nama' => $request->nama,
                'username' => $request->username,
                'password' => Hash::make($request->password),
                'updated_at' => date('Y-m-d H:i:s')
            ]);

        }else{
            DB::table('tb_user')->where('id', $request->id)->update([
                'nama' => $request->nama,
                'username' => $request->username,
                'updated_at' => date('Y-m-d H:i:s')
            ]);
        }

        Session::flash('sukses','Perubahan Profil Telah Tersimpan');
                return redirect('/profil');
    }
}
