@extends('layouts.app')

@section('content')
<div class="header bg-gradient-primary py-7 py-lg-7">
    <div class="container">
      <div class="header-body text-center mb-7">
        <div class="row justify-content-center">
          <div class="col-xl-5 col-lg-6 col-md-8 px-5">
            <h1 class="text-white">Selamat Datang!</h1>
            <p class="text-lead text-white">Silahkan Login</p>
          </div>
        </div>
      </div>
    </div>
    <div class="separator separator-bottom separator-skew zindex-100">
      <svg x="0" y="0" viewBox="0 0 2560 100" preserveAspectRatio="none" version="1.1" xmlns="http://www.w3.org/2000/svg">
        <polygon class="fill-default" points="2560 0 2560 100 0 100"></polygon>
      </svg>
    </div>
</div>
  <!-- Page content -->
<div class="container mt--8 pb-5">
    <div class="row justify-content-center">
        <div class="col-lg-5 col-md-7">
        <div class="card bg-secondary border-0 mb-0">

            <div class="card-body px-lg-5 py-lg-5">
            <form role="form" method="POST" action="/log/lg" >
                @csrf
                <div class="form-group mb-3">
                <div class="input-group input-group-merge input-group-alternative">
                    <div class="input-group-prepend">
                    <span class="input-group-text"><i class="ni ni-email-83"></i></span>
                    </div>
                    <input class="form-control" placeholder="Email" name="username" type="email">
                </div>
                </div>
                <div class="form-group">
                    <div class="input-group input-group-merge input-group-alternative">
                        <div class="input-group-prepend">
                        <span class="input-group-text"><i class="ni ni-lock-circle-open"></i></span>
                        </div>
                        <input class="form-control" placeholder="Password" name="password" type="password">
                    </div>
                </div>
                <div class="text-center">
                <button type="submit" class="btn btn-primary">Sign in</button>
                </div>
            </form>
            </div>
        </div>
        <div class="row mt-3">
            <div class="col-12 text-center">
            <a href="/daftar" class="text-light"><small>Belum Daftar Karyawan ? Klik Disini</small></a>
            </div>
        </div>
        </div>
    </div>
</div>
@endsection
