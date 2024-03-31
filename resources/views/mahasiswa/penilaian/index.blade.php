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
                <li class="breadcrumb-item active"><a href="javascript:void(0)">Penilaian</a></li>
            </ol>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <button class="btn btn-primary" data-toggle="modal" data-target="#exampleModalCenter">Pilih Topik yang kamu bingungkan!</button>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <div id="example_wrapper" class="dataTables_wrapper">
                            <table id="example" class="display dataTable" style="min-width: 845px" role="grid" aria-describedby="example_info">
                                <thead>
                                    <tr role="row">
                                        <th class="sorting" rowspan="1" colspan="1">Kode</th>
                                        <th class="sorting" rowspan="1" colspan="1">Alternatif</th>
                                        @foreach ($kriterias as $item)
                                            <th class="sorting" rowspan="1" colspan="1">{{ $item->code }}</th>
                                        @endforeach
                                    </tr>
                                </thead>
                                <tbody id="data-penilaian">
                                </tbody>
                                <tbody>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="exampleModalCenter">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Pilih topik yang kamu bingungkan</h5>
                <button type="button" class="close" data-dismiss="modal"><span>&times;</span>
                </button>
            </div>
            <form>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="">Pilih topik</label>
                        <select class="form-control" id="input-topik">
                            @foreach ($alternatifs as $item)
                                <option value="{{ $item->code }}">{{$item->alternatif}}</option>
                            @endforeach
                        </select>
                    </div>

                    @foreach ($kriterias as $item)                       
                        <div class="form-group row">
                            <label class="col-sm-5 col-form-label">{{ $item->name }}</label>
                            <div class="col-sm-7">
                                <select class="form-control" id="sub-kriteria-{{ $item->id }}">
                                    @foreach ($item->sub_kriteria as $sub)
                                        <option value="{{ $sub->id }}">{{$sub->keterangan}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    @endforeach
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" id="tambah-penilaian" data-dismiss="modal" class="btn btn-primary">Tambah</button>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
    var addBtn = document.getElementById('tambah-penilaian');
    var table = document.getElementById('data-penilaian');
    var inputTopik = document.getElementById('input-topik');

    var tableBody = '';

    const getSelectedText = (el) => {
        if (el.selectedIndex === -1) {
            return null;
        }
        return el.options[el.selectedIndex].text;
    }

    addBtn.addEventListener('click', () => {
        tableBody += '<tr>'
        tableBody += `
            <td>${inputTopik.value}</td>
            <td>${getSelectedText(inputTopik)}</td>
        `;
        var optionPenilaian  = document.querySelectorAll('[id^="sub-kriteria-"]');
        optionPenilaian.forEach(element => {
            tableBody += `<td>${getSelectedText(element)}</td>`
        });
        tableBody += `</tr>`;
        table.innerHTML = tableBody;
    });

</script>
@endsection