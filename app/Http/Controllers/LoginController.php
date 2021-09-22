<?php

namespace App\Http\Controllers;

use DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Session;

class LoginController extends Controller
{
    public function index(){
        return view('login.index');
    }

    public function login(Request $request){
        $cU = DB::table('tb_user')->where('username', $request->username)->count();
        if($cU > 0){
            $sU = DB::table('tb_user')->where('username', $request->username)->first();
            if(Hash::check($request->password, $sU->password)){
                Session::put('idUser', $sU->id);
                Session::put('nameUser', $sU->nama);
		        return redirect('/dashboard');
            }else{
                Session::flash('gagal','Gagal, Password Tidak Sesuai');
                return redirect('/');
            }
        }else{
            Session::flash('gagal','Gagal, Username Tidak Terdaftar');
		    return redirect('/');
        }
    }

}
