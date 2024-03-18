@extends('layouts.dashboard')

@section('content')
<div class="container-fluid">
    <div class="row page-titles mx-0">
        <div class="col-sm-6 p-md-0">
            <div class="welcome-text">
                <h4>kriteria</h4>
            </div>
        </div>
        <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0)">Dashboard</a></li>
                <li class="breadcrumb-item active"><a href="javascript:void(0)">Kriteria</a></li>
            </ol>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">kriteria</h4>
                    <a href="{{ route('admin.kriteria.add') }}" class="btn btn-primary">Tambah</a>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <div id="example_wrapper" class="dataTables_wrapper">
                            <table id="example" class="display dataTable" style="min-width: 845px" role="grid" aria-describedby="example_info">
                                <thead>
                                    <tr role="row">
                                        <th class="sorting" rowspan="1" colspan="1">No</th>
                                        <th class="sorting" rowspan="1" colspan="1">Kode</th>
                                        <th class="sorting" rowspan="1" colspan="1">Kriteria</th>
                                        <th class="sorting" rowspan="1" colspan="1">Jenis</th>
                                        <th class="sorting" rowspan="1" colspan="1">Type</th>
                                        <th class="sorting" rowspan="1" colspan="1">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($kriterias as $index => $kriteria)                                    
                                        <tr role="row">
                                            <td>{{ $index+1 }}</td>
                                            <td>{{ $kriteria->code }}</td>
                                            <td>{{ $kriteria->name }}</td>
                                            <td>{{ $kriteria->type }}</td>
                                            <td>{{ $kriteria->value }}</td>
                                            <td>
                                                <a href="{{ route('admin.kriteria.edit', $kriteria->id) }}" class="badge badge-warning">Edit</a>
                                                <a href="{{ route('admin.kriteria.destroy', $kriteria->id) }}" class="badge badge-danger">Delete</a>
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
    </div>
</div>
@endsection