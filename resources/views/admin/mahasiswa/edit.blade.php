@extends('layouts.dashboard')

@section('content')
<div class="container-fluid">
    <div class="row page-titles mx-0">
        <div class="col-sm-6 p-md-0">
            <div class="welcome-text">
                <h4>Mahasiswa</h4>
            </div>
        </div>
        <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0)">Dashboard</a></li>
                <li class="breadcrumb-item active"><a href="javascript:void(0)">Mahasiswa</a></li>
                <li class="breadcrumb-item active"><a href="javascript:void(0)">Edit</a></li>
            </ol>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Edit Mahasiswa</h4>
                    @session('success')
                        <span class="alert alert-success">Data mahasiswa berhasil ditambah</span>
                    @endsession

                    @session('error')
                        <span class="alert alert-danger">Oops, Something was wrong!</span>
                    @endsession
                </div>
                <div class="card-body">
                    <div class="basic-form">
                        <form action="{{ route('admin.mahasiswa.update') }}" method="post">
                            @csrf
                            <div class="form-row">
                                <input type="hidden" name="id" value="{{ $student->id }}">
                                <div class="form-group col-md-6">
                                    <label>Nama</label>
                                    <input name="nama" type="text" value="{{ $student->nama }}" class="form-control" placeholder="Siti Khasanah">
                                </div>
                                <div class="form-group col-md-6">
                                    <label>Nim</label>
                                    <input name="nim" type="text" value="{{ $student->nim }}" class="form-control" placeholder="2023445888">
                                </div>
                                <div class="form-group col-md-6">
                                    <label>Prodi</label>
                                    <input name="prodi" type="text" value="{{ $student->prodi }}" class="form-control" placeholder="Informatika">
                                </div>
                                <div class="form-group col-md-6">
                                    <label>Fakultas</label>
                                    <input name="fakultas" type="text" value="{{ $student->fakultas }}" class="form-control" placeholder="Fakultas Teknik">
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary">Edit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection