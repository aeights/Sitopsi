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

        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Sub kriteria</h4>
                    <button class="btn btn-primary" data-toggle="modal" data-target="#exampleModalCenter">Tambah Sub Kriteria</button>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <div id="example_wrapper" class="dataTables_wrapper">
                            <table id="example" class="display dataTable" style="min-width: 845px" role="grid" aria-describedby="example_info">
                                <thead>
                                    <tr role="row">
                                        <th class="sorting" rowspan="1" colspan="1">Kriteria</th>
                                        <th class="sorting" rowspan="1" colspan="1">Sub Kriteria</th>
                                        <th class="sorting" rowspan="1" colspan="1">Bobot</th>
                                        <th class="sorting" rowspan="1" colspan="1">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($kriterias as $index => $item)                                    
                                        <tr role="row">
                                            <td rowspan="{{ count($item->sub_kriteria) + 1 }}">{{ $item->name }}</td>
                                        </tr>
                                        @foreach ($item->sub_kriteria as $sub)
                                            <tr>
                                                <td>{{ $sub->keterangan }}</td>
                                                <td>{{ $sub->value }}</td>
                                                <td>
                                                    <button class="badge badge-warning border-0" data-toggle="modal" data-target="#modalEditSub" data-kriteria="{{ $item->name }}" data-id="{{ $sub->id }}" data-keterangan="{{ $sub->keterangan }}" data-value="{{ $sub->value }}" onclick="fillModalEdit(this)">Edit</button>
                                                    <a href="{{ route('admin.sub-kriteria.destroy', $sub->id) }}" class="badge badge-danger">Delete</a>
                                                </td>
                                            </tr>
                                        @endforeach
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


<!-- Modal Add -->
<div class="modal fade" id="exampleModalCenter">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Tambah Sub Kriteria</h5>
                <button type="button" class="close" data-dismiss="modal"><span>&times;</span>
                </button>
            </div>
            <form method="POST" action="{{ route('admin.kriteria.store_sub') }}">
                @csrf
                <div class="modal-body">
                    <div class="form-group">
                        <label for="">Pilih Kriteria</label>
                        <select class="form-control" id="input-topik" name="kriterias_id">
                            @foreach ($kriterias as $item)
                                <option value="{{ $item->id }}" attrBobot="{{ $item->id }}">{{$item->name}}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="">Sub Kriteria Baru</label>
                        <input type="text" class="form-control" name="keterangan">
                    </div>

                    <div class="form-group">
                        <label for="">Bobot Sub Kriteria</label>
                        <input id="bobotSubKriteria" type="number" class="form-control" name="value" step="0.01">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Tambah</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Modal Edit -->
<div class="modal fade" id="modalEditSub">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Edit Sub Kriteria</h5>
                <button type="button" class="close" data-dismiss="modal"><span>&times;</span>
                </button>
            </div>
            <form method="POST" action="{{ route('admin.sub-kriteria.update') }}">
                @csrf
                <div class="modal-body">
                    <input id="subId" type="hidden" name="sub_id">
                    <div class="form-group">
                        <label for="">Pilih Kriteria</label>
                        <select class="form-control" id="input-topik-edit" name="kriterias_id">
                            @foreach ($kriterias as $item)
                                <option value="{{ $item->id }}" attrBobot="{{ $item->id }}">{{$item->name}}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="">Sub Kriteria</label>
                        <input id="inputKeteranganEdit" type="text" class="form-control" name="keterangan">
                    </div>

                    <div class="form-group">
                        <label for="">Bobot Sub Kriteria</label>
                        <input id="inputBobotEdit" id="bobotSubKriteria" type="number" class="form-control" name="value" step="0.01">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
@push('script')
    {{-- <script>
        document.addEventListener('DOMContentLoaded', function() {
            var input = document.getElementById('bobotSubKriteria');
            input.addEventListener('input', function() {
                var value = this.value;
                // Hapus semua titik dari nilai
                this.value = value.replace('.', '');
            });
        });
    </script> --}}
    <script>
        // document.addEventListener('DOMContentLoaded', function () {
        //     var selectElement = document.getElementById('input-topik');
        //     var selectedText = "Nama Kriteria";

        //     for (var i = 0; i < selectElement.options.length; i++) {
        //         if (selectElement.options[i].text === selectedText) {
        //             selectElement.selectedIndex = i;
        //             break;
        //         }
        //     }
        // });
        function fillModalEdit(params) {
            var kriteria = $(params).data('kriteria');
            var id = $(params).data('id');
            var keterangan = $(params).data('keterangan');
            var value = $(params).data('value');
            $('#subId').val(id);
            $('#inputKeteranganEdit').val(keterangan);
            $('#inputBobotEdit').val(value);
        }
    </script>
@endpush