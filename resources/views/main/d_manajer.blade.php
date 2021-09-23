@extends('layouts.maind')

@section('content')

<!-- Header -->
<!-- Header -->
<div class="header bg-primary pb-6">
    <div class="container-fluid">
        <div class="header-body">
        <div class="row align-items-center py-4">
            <div class="col-lg-6 col-7">
            <h6 class="h2 text-white d-inline-block mb-0">Dashboard Manajer</h6>
            <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
                <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                <li class="breadcrumb-item"><a href="/dashboard"><i class="fas fa-home"></i></a></li>
                <li class="breadcrumb-item active" aria-current="page">Dashboard Manajer</li>
                </ol>
            </nav>
            </div>
            <div class="col-lg-6 col-5 text-right">

            </div>
        </div>
        </div>
    </div>
</div>
<!-- Page content -->
<div class="container-fluid mt--6">
    <div class="row">
        <div class="col-xl-7">
            <div class="card">
                <div class="card-header border-0">
                <div class="row align-items-center">
                    <div class="col">
                    <h3 class="mb-0">Daftar Absensi </h3>
                    </div>
                    <div class="col text-right">
                    {{-- <a href="#!" class="btn btn-sm btn-primary">See all</a> --}}
                    </div>
                </div>
                </div>
                <div class="table-responsive">
                <!-- Projects table -->
                <table class="table align-items-center table-flush">
                    <thead class="thead-light">
                    <tr>
                        <th scope="col">Nama</th>
                        <th scope="col">Kategori Absen</th>
                        <th scope="col">Waktu</th>
                        <th scope="col">Status</th>
                    </tr>
                    </thead>
                    <tbody>
                        @foreach ($data as $dE)
                            <tr>
                                <td>{{$dE->nama}}</td>
                                <th scope="row">
                                    @if($dE->kategori_absen==='2')
                                        {{'Absen Pulang'}}
                                    @else
                                        {{'Absen Masuk'}}
                                    @endif
                                </th>
                                <td>
                                {{$dE->date_absen}}
                                </td>
                                <td>
                                @if($dE->is_telat === 1)
                                    @if($dE->kategori_absen === '1')
                                        {{'Telat '.$dE->menit}} Menit
                                    @else
                                        {{'Pulang Cepat '.$dE->menit}} Menit
                                    @endif
                                @else
                                    {{'Tidak Telat'}}
                                @endif
                                </td>
                            </tr>
                        @endforeach

                    </tbody>
                </table>
                </div>
            </div>
        </div>
        <div class="col-xl-5">
            <div class="card">
                <div class="card-header border-0">
                    <div class="row align-items-center">
                        <div class="col">
                        <h3 class="mb-0">Pengajuan Ijin </h3>
                        </div>
                        <div class="col text-right">
                        {{-- <a href="#!" class="btn btn-sm btn-primary">See all</a> --}}
                        </div>
                    </div>
                </div>
                <div class="table-responsive">
                    <!-- Projects table -->
                    <table class="table align-items-center table-flush">
                        <thead class="thead-light">
                            <tr>
                                <th scope="col">Tanggal</th>
                                <th scope="col">Alasan</th>
                                <th scope="col">Kategori</th>
                                <th scope="col">Status</th>
                            </tr>
                            </thead>
                            <tbody>
                                @foreach ($pj as $pjE)
                                    <tr>
                                        <td>{{$pjE->start_ijin}}</td>
                                        <td>{{$pjE->alasan}}</td>
                                        <td>@if($pjE->is_kategori === 1) Sakit @else Cuti @endif</td>
                                        <td>@if($pjE->is_approval === 0) <a href="/acc/{{$pjE->id}}" class="btn btn-success">Setuju</a> @else <a href="/tolak/{{$pjE->id}}" class="btn btn-success">Tolak</a> @endif</td>
                                    </tr>
                                @endforeach

                            </tbody>
                    </table>
                    {{-- {!! $userChart->container() !!} --}}
                    {{-- @push('js') --}}
                    {{-- <script src="https://code.jquery.com/jquery-3.3.1.js"></script> --}}
                    {{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/highcharts/6.0.6/highcharts.js" charset="utf-8"></script> --}}

                    {{-- {!! $userChart->script() !!} --}}
                    </div>
            </div>
        </div>
    </div>
</div>
@endsection
