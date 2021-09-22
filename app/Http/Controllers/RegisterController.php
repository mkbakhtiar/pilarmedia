<?php

namespace App\Http\Controllers;

use DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Session;

class RegisterController extends Controller
{
    public function index(){
        return view('login.register');
    }
    public function store(Request $request)
    {
        $validatedData = $request->validate([
          'nama' => 'required',
          'username' => 'required',
          'password' => 'required',
        ]);

        $project = \App\UserModel::create([
          'nama' => $validatedData['nama'],
          'username' => $validatedData['username'],
          'user_akses' =>2,
          'password' => Hash::make($validatedData['password']),
        ]);

        if($project){
            Session::flash('sukses','Berhasil Membuat Akun Karyawan, SIlahkan Login');
		    return redirect('/');
        }else{
            Session::flash('gagal','Gagal, Membuat Akun Karyawan, Silahkan Coba Lagi');
		    return redirect('/daftar');
        }


    }
}
