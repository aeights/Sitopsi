@extends('layouts.dashboard')

@section('content')
<div class="container-fluid">
    <div class="row page-titles mx-0">
        <div class="col-sm-6 p-md-0">
            <div class="welcome-text">
                <h4>Sistem Rekomendasi Topik Skripsi</h4>
                <p class="mb-0">Selamat Datang, Admin</p>
            </div>
        </div>
        <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0)">Dashboard</a></li>
                <li class="breadcrumb-item active"><a href="javascript:void(0)">Index</a></li>
            </ol>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-4 col-sm-6">
            <div class="card">
                <div class="stat-widget-two card-body bg-danger">
                    <div class="stat-content">
                        <div class="stat-text text-white">Alternatif</div>
                        <div class="stat-digit text-white">{{ $alternatif }}</div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-4 col-sm-6">
            <div class="card">
                <div class="stat-widget-two card-body bg-primary">
                    <div class="stat-content">
                        <div class="stat-text text-white">Kriteria</div>
                        <div class="stat-digit text-white">{{ $kriteria }}</div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-4 col-sm-6">
            <div class="card">
                <div class="stat-widget-two card-body bg-warning">
                    <div class="stat-content">
                        <div class="stat-text text-white">Mahasiswa</div>
                        <div class="stat-digit text-white">{{ $mahasiswa }}</div>
                    </div>
                </div>
            </div>
        </div>
        <!-- /# column -->
    </div>
</div>
@endsection