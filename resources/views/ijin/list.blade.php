@extends('layouts.main')

@section('content')

<!-- Header -->
<!-- Header -->
<div class="header bg-primary pb-6">
    <div class="container-fluid">
        <div class="header-body">
        <div class="row align-items-center py-4">
            <div class="col-lg-6 col-7">
            <h6 class="h2 text-white d-inline-block mb-0">List</h6>
            <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
                <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                <li class="breadcrumb-item"><a href="/dashboard"><i class="fas fa-home"></i></a></li>
                <li class="breadcrumb-item active" aria-current="page">List Pengajuan Ijin</li>
                </ol>
            </nav>
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
                <h3 class="mb-0">Daftar Pengajuan Ijin </h3>
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
                    @foreach ($data as $dE)
                        <tr>
                            <td>{{$dE->start_ijin}}</td>
                            <td>{{$dE->alasan}}</td>
                            <td>@if($dE->is_kategori === 1) Sakit @else Cuti @endif</td>
                            <td>@if($dE->is_approval === 0) Menunggu ACC @elseif($dE->is_kategori == 1) Disetujui @else Ditolak @endif</td>
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
