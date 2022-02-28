@extends('layout.main_dashboard')

@section('content')

<!-- Topbar -->

<!-- Container Fluid-->
<div class="container-fluid" id="container-wrapper">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">List File Karya</h1>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/dashboard">Dashboard</a></li>
            <li class="breadcrumb-item active" aria-current="page">List File Karya </li>
        </ol>
    </div>

    <div class="row mb-3">
        <!-- Earnings (Monthly) Card Example -->
        @foreach($karya as $kar)
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card h-100">
                <div class="card-body">
                    <div class="row align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-uppercase mb-1">Kode Unik : {{$kar->code}}</div>
                            <div class="text-xs font-weight-bold text-uppercase mb-1">Nama Karya : {{$kar->Barang->nama_barang}}</div>
                            <div class="text-xs font-weight-bold text-uppercase mb-1"><a href="{{asset('FileKarya/'.$kar->file)}}">Donwload File</a></div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800"></div>
                            <div class="mt-2 mb-0 text-muted text-xs">

                            </div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-file fa-2x text-primary"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>
    <!-- Footer -->

    <!-- Footer -->
</div>
@endsection