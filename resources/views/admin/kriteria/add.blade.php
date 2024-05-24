@extends('layouts.dashboard')

@section('content')
<div class="container-fluid">
    <div class="row page-titles mx-0">
        <div class="col-sm-6 p-md-0">
            <div class="welcome-text">
                <h4>Kriteria</h4>
            </div>
        </div>
        <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
            <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="javascript:void(0)">Dashboard</a></li>
                <li class="breadcrumb-item active"><a href="javascript:void(0)">Kriteria</a></li>
                <li class="breadcrumb-item active"><a href="javascript:void(0)">Tambah</a></li>
            </ol>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Tambah Kriteria</h4>
                </div>
                <div class="card-body">
                    <div class="basic-form">
                        <form action="{{ route('admin.kriteria.store') }}" method="post">
                            @csrf
                            <div class="form-row">
                                <div class="form-group col">
                                    <label>Code</label>
                                    <input name="code" type="text" class="form-control"
                                        placeholder="code">
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col">
                                    <label>Kriteria</label>
                                    <input name="name" type="text" class="form-control"
                                        placeholder="kriteria">
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col">
                                    <label>Type</label>
                                    <input name="type" type="text" class="form-control"
                                        placeholder="cost">
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col">
                                    <label>Bobot</label>
                                    <select name="value" class="form-control">
                                        <option value="1">1</option>
                                        <option value="2">2</option>
                                        <option value="3">3</option>
                                        <option value="4">4</option>
                                        <option value="5">5</option>
                                        <option value="6">6</option>
                                        <option value="7">7</option>
                                        <option value="8">8</option>
                                        <option value="9">9</option>
                                        <option value="10">10</option>
                                    </select>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary">Tambah</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection