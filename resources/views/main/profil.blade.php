@extends('layouts.main')

@section('content')
<!-- Header -->
<!-- Header -->
<div class="header pb-6 d-flex align-items-center" style="min-height: 400px; background-image: url(../assets/img/theme/profile-cover.jpg); background-size: cover; background-position: center top;">
<!-- Mask -->
    <span class="mask bg-gradient-default opacity-8"></span>
<!-- Header container -->
    <div class="container-fluid d-flex align-items-center">
        <div class="row">
        <div class="col-lg-7 col-md-10">
            <h1 class="display-2 text-white">Hello {{$data->nama}}</h1>
            <p class="text-white mt-0 mb-5">Ini adalah halaman profilmu. Kamu bisa melihat & merubah datamu disini</p>
        </div>
        </div>
    </div>
</div>
<!-- Page content -->
<div class="container-fluid mt--6">
    <div class="row">
        <div class="col-xl-4 order-xl-2">
        <div class="card card-profile">
            <img src="../assets/img/theme/img-1-1000x600.jpg" alt="Image placeholder" class="card-img-top">
            <div class="row justify-content-center">
            <div class="col-lg-3 order-lg-2">
                <div class="card-profile-image">
                <a href="#">
                    <img src="../assets/img/theme/team-4.jpg" class="rounded-circle">
                </a>
                </div>
            </div>
            </div>
            <div class="card-header text-center border-0 pt-8 pt-md-4 pb-0 pb-md-4">
            <div class="d-flex justify-content-between">
                <a href="#" class="btn btn-sm btn-info  mr-4 ">Connect</a>
                <a href="#" class="btn btn-sm btn-default float-right">Message</a>
            </div>
            </div>
            <div class="card-body pt-0">
            <div class="text-center">
                <h5 class="h3">
                {{$data->nama}}
                </h5>
                <div class="h5 font-weight-300">
                <i class="ni location_pin mr-2"></i>{{$data->username}}
                </div>
                <div class="h5 mt-4">
                <i class="ni business_briefcase-24 mr-2"></i>{{$data->nama}}
                </div>
                <div>
                <i class="ni education_hat mr-2"></i>Im a Programmer
                </div>
            </div>
            </div>
        </div>
        </div>
        <div class="col-xl-8 order-xl-1">
        <div class="card">
            <div class="card-header">
            <div class="row align-items-center">
                <div class="col-8">
                <h3 class="mb-0">Edit profile </h3>
                </div>
                <div class="col-4 text-right">

                </div>
            </div>
            </div>
            <div class="card-body">
                <form role="form" method="POST" action="/up/pr" >
                @csrf
                <h6 class="heading-small text-muted mb-4">User information</h6>
                <div class="pl-lg-4">
                    <div class="row">
                        <div class="col-lg-6">
                        <div class="form-group">
                            <label class="form-control-label" for="input-username">Username</label>
                            <input type="email" name="username" id="input-username" value="{{$data->username}}" class="form-control" placeholder="Username" value="lucky.jesse">
                            <input type="hidden" name="id" id="input-username" value="{{$data->id}}" class="form-control" placeholder="Username" value="lucky.jesse">
                        </div>
                        </div>
                        <div class="col-lg-6">
                        <div class="form-group">
                            <label class="form-control-label" for="input-email">Password</label>
                            <input type="password" id="input-email" name="password" class="form-control">
                        </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-6">
                        <div class="form-group">
                            <label class="form-control-label" for="input-first-name">Nama Lengkap</label>
                            <input type="text" id="input-first-name" name="nama" class="form-control" placeholder="First name" value="{{$data->nama}}">
                        </div>
                        </div>
                        <div class="col-lg-6">
                        </div>
                    </div>
                </div>

                <div class="pl-lg-4">

                </div>
                <div class="pl-lg-12" align="right">
                    <input type="submit" class="btn btn-primary" value="Simpan Perubahan">
                </div>

            </form>
            </div>
        </div>
        </div>
    </div>
</div>

@endsection
