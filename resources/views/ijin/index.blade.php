@extends('layouts.main')

@section('content')
<!-- Header -->
<div class="header bg-primary pb-3">
    <div class="container-fluid">
        <div class="header-body">
        <div class="row align-items-center py-4">
            <div class="col-lg-6 col-7">
            <h6 class="h2 text-white d-inline-block mb-0">Form Pengajuan Ijin</h6>
            <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
                <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                <li class="breadcrumb-item"><a href="/dashboard"><i class="fas fa-home"></i></a></li>
                <li class="breadcrumb-item active" aria-current="page">Ijin</li>
                </ol>
            </nav>
            </div>
        </div>
        </div>
    </div>
</div>
<!-- Header -->
<!-- Page content -->
<div class="container-fluid mt-4">
    <div class="row">
        <div class="col-xl-8 order-xl-1">
        <div class="card">
            <div class="card-header">
            <div class="row align-items-center">
                <div class="col-8">
                <h3 class="mb-0">Form Pengajuan </h3>
                </div>
                <div class="col-4 text-right">

                </div>
            </div>
            </div>
            <div class="card-body">
                <form role="form" method="POST" action="/st/ij" >
                @csrf

                <div class="pl-lg-4">
                    <div class="row">
                        <div class="col-lg-6">
                        <div class="form-group">
                            <label class="form-control-label" for="input-username">Cuti/Sakit</label>
                            <select name="kategori" class="form-control" id="kategori" required>
                                <option value="">Pilih</option>
                                <option value="1">Sakit</option>
                                <option value="2">Cuti</option>
                            </select>
                        </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label class="form-control-label" for="input-email">Tanggal Ijin</label>
                                <input type="date" name="start_ijin" id="date_ijin" class="form-control">
                            </div>

                        </div>
                        <div class="col-lg-12">
                            <div class="form-group">
                                <label class="form-control-label" for="input-email">Alasan</label>
                                <textarea name="alasan" id="" cols="30" rows="10" class="form-control" placeholder="Alasan"></textarea>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="pl-lg-4">

                </div>
                <div class="pl-lg-12" align="right">
                    <input type="submit" class="btn btn-primary" value="Ajukan Ijin">
                </div>

            </form>
            </div>
        </div>
        </div>
    </div>
</div>

@endsection
