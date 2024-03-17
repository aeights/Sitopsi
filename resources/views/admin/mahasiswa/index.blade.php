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
            </ol>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Mahasiswa</h4>
                    <a href="{{ route('admin.mahasiswa.add') }}" class="btn btn-primary">Tambah</a>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <div id="example_wrapper" class="dataTables_wrapper">
                            <table id="example" class="display dataTable" style="min-width: 845px" role="grid" aria-describedby="example_info">
                                <thead>
                                    <tr role="row">
                                        <th class="sorting" rowspan="1" colspan="1">No</th>
                                        <th class="sorting" rowspan="1" colspan="1">Nama</th>
                                        <th class="sorting" rowspan="1" colspan="1">NIM</th>
                                        <th class="sorting" rowspan="1" colspan="1">Fakultas</th>
                                        <th class="sorting" rowspan="1" colspan="1">Prodi</th>
                                        <th class="sorting" rowspan="1" colspan="1">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($students as $index => $student)                                    
                                        <tr role="row">
                                            <td>{{ $index+1 }}</td>
                                            <td>{{ $student->name }}</td>
                                            <td>{{ $student->nim }}</td>
                                            <td>{{ $student->major }}</td>
                                            <td>{{ $student->study_program }}</td>
                                            <td>
                                                <a href="{{ route('admin.mahasiswa.edit', $student->id) }}" class="badge badge-warning">Edit</a>
                                                <a href="{{ route('admin.mahasiswa.destroy', $student->id) }}" class="badge badge-danger">Delete</a>
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