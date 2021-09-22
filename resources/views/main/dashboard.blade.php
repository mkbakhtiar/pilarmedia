@extends('layouts.main')

@section('content')

<!-- Header -->
<!-- Header -->
<div class="header bg-primary pb-6">
    <div class="container-fluid">
        <div class="header-body">
        <div class="row align-items-center py-4">
            <div class="col-lg-6 col-7">
            <h6 class="h2 text-white d-inline-block mb-0">Dashboard</h6>
            <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
                <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                <li class="breadcrumb-item"><a href="/dashboard"><i class="fas fa-home"></i></a></li>
                <li class="breadcrumb-item active" aria-current="page">Dashboard</li>
                </ol>
            </nav>
            </div>
            <div class="col-lg-6 col-5 text-right">
                @if ($message = Session::get('isAbsen'))
                <span style="font-size:14px;color:#ffffff">{{'Telah Absen Pukul : '.Session::get('dateAbsen')}} </span>
                <a href="/ab/pl" class="btn btn-lg btn-danger"> Klik, Untuk Absen Pulang</a>

                @else
                <a href="/ab/nw" class="btn btn-lg btn-success"> Klik, Untuk Absen Masuk</a>
                @endif
            </div>
        </div>
        <!-- Card stats -->
        <div class="row">
            <div class="col-xl-3 col-md-6">
                <div class="card card-stats">
                    <!-- Card body -->
                    <div class="card-body">
                    <div class="row">
                        <div class="col">
                        <h5 class="card-title text-uppercase text-muted mb-0">Total Telat</h5>
                        <span class="h2 font-weight-bold mb-0">{{$telat}} Menit</span>
                        </div>
                        <div class="col-auto">
                        <div class="icon icon-shape bg-gradient-red text-white rounded-circle shadow">
                            <i class="ni ni-active-40"></i>
                        </div>
                        </div>
                    </div>
                    <p class="mt-3 mb-0 text-sm">
                        <span class="text-nowrap">Dalam Bulan Ini</span>
                    </p>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-md-6">
            <div class="card card-stats">
                <!-- Card body -->
                <div class="card-body">
                <div class="row">
                    <div class="col">
                    <h5 class="card-title text-uppercase text-muted mb-0">Pulang Awal</h5>
                    <span class="h2 font-weight-bold mb-0">{{$cepat}} Menit</span>
                    </div>
                    <div class="col-auto">
                    <div class="icon icon-shape bg-gradient-orange text-white rounded-circle shadow">
                        <i class="ni ni-chart-pie-35"></i>
                    </div>
                    </div>
                </div>
                <p class="mt-3 mb-0 text-sm">
                    <span class="text-nowrap">Dalam Bulan Ini</span>
                </p>
                </div>
            </div>
            </div>
            <div class="col-xl-3 col-md-6">
            <div class="card card-stats">
                <!-- Card body -->
                <div class="card-body">
                <div class="row">
                    <div class="col">
                    <h5 class="card-title text-uppercase text-muted mb-0">SAKIT</h5>
                    <span class="h2 font-weight-bold mb-0">924</span>
                    </div>
                    <div class="col-auto">
                    <div class="icon icon-shape bg-gradient-green text-white rounded-circle shadow">
                        <i class="ni ni-money-coins"></i>
                    </div>
                    </div>
                </div>
                <p class="mt-3 mb-0 text-sm">
                    <span class="text-success mr-2"><i class="fa fa-arrow-up"></i> 3.48%</span>
                    <span class="text-nowrap">Since last month</span>
                </p>
                </div>
            </div>
            </div>
            <div class="col-xl-3 col-md-6">
            <div class="card card-stats">
                <!-- Card body -->
                <div class="card-body">
                <div class="row">
                    <div class="col">
                    <h5 class="card-title text-uppercase text-muted mb-0">CUTI</h5>
                    <span class="h2 font-weight-bold mb-0">49,65%</span>
                    </div>
                    <div class="col-auto">
                    <div class="icon icon-shape bg-gradient-info text-white rounded-circle shadow">
                        <i class="ni ni-chart-bar-32"></i>
                    </div>
                    </div>
                </div>
                <p class="mt-3 mb-0 text-sm">
                    <span class="text-success mr-2"><i class="fa fa-arrow-up"></i> 3.48%</span>
                    <span class="text-nowrap">Since last month</span>
                </p>
                </div>
            </div>
            </div>
        </div>
        </div>
    </div>
</div>
<!-- Page content -->
<div class="container-fluid mt--6">
    <div class="row">
        <div class="col-xl-12">
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
                    <th scope="col">Kategori Absen</th>
                    <th scope="col">Waktu</th>
                    <th scope="col">Status</th>
                </tr>
                </thead>
                <tbody>
                    @foreach ($data as $dE)
                        <tr>
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


    </div>
</div>
@endsection
