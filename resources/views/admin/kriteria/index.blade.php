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
                    <a href="{{ route('kriteria.add') }}" class="btn btn-primary">Tambah</a>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <div id="example_wrapper" class="dataTables_wrapper">
                            <table id="example" class="display dataTable" style="min-width: 845px" role="grid" aria-describedby="example_info">
                                <thead>
                                    <tr role="row">
                                        <th class="sorting" tabindex="0" aria-controls="example" rowspan="1" colspan="1" aria-label="Name: activate to sort column ascending" style="width: 170.7px;">Name</th>
                                        <th class="sorting" tabindex="0" aria-controls="example" rowspan="1" colspan="1" aria-label="Position: activate to sort column ascending" style="width: 263.475px;">Position</th>
                                        <th class="sorting_asc" tabindex="0" aria-controls="example" rowspan="1" colspan="1" aria-label="Office: activate to sort column descending" style="width: 130.113px;" aria-sort="ascending">Office</th>
                                        <th class="sorting" tabindex="0" aria-controls="example" rowspan="1" colspan="1" aria-label="Age: activate to sort column ascending" style="width: 45.875px;">Age</th>
                                        <th class="sorting" tabindex="0" aria-controls="example" rowspan="1" colspan="1" aria-label="Start date: activate to sort column ascending" style="width: 112.262px;">Start date</th>
                                        <th class="sorting" tabindex="0" aria-controls="example" rowspan="1" colspan="1" aria-label="Salary: activate to sort column ascending" style="width: 104.175px;">Salary</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr class="odd" role="row">
                                        <td class="">Cedric Kelly</td>
                                        <td>Senior Javascript Developer</td>
                                        <td class="sorting_1">Edinburgh</td>
                                        <td>22</td>
                                        <td>2012/03/29</td>
                                        <td>$433,060</td>
                                    </tr>
                                    <tr class="even" role="row">
                                        <td class="">Dai Rios</td>
                                        <td>Personnel Lead</td>
                                        <td class="sorting_1">Edinburgh</td>
                                        <td>35</td>
                                        <td>2012/09/26</td>
                                        <td>$217,500</td>
                                    </tr>
                                    <tr class="odd" role="row">
                                        <td class="">Gavin Joyce</td>
                                        <td>Developer</td>
                                        <td class="sorting_1">Edinburgh</td>
                                        <td>42</td>
                                        <td>2010/12/22</td>
                                        <td>$92,575</td>
                                    </tr>
                                    <tr class="even" role="row">
                                        <td class="">Jennifer Acosta</td>
                                        <td>Junior Javascript Developer</td>
                                        <td class="sorting_1">Edinburgh</td>
                                        <td>43</td>
                                        <td>2013/02/01</td>
                                        <td>$75,650</td>
                                    </tr>
                                    <tr class="odd" role="row">
                                        <td class="">Martena Mccray</td>
                                        <td>Post-Sales support</td>
                                        <td class="sorting_1">Edinburgh</td>
                                        <td>46</td>
                                        <td>2011/03/09</td>
                                        <td>$324,050</td>
                                    </tr>
                                    <tr class="even" role="row">
                                        <td class="">Quinn Flynn</td>
                                        <td>Support Lead</td>
                                        <td class="sorting_1">Edinburgh</td>
                                        <td>22</td>
                                        <td>2013/03/03</td>
                                        <td>$342,000</td>
                                    </tr>
                                    <tr class="odd" role="row">
                                        <td class="">Shad Decker</td>
                                        <td>Regional Director</td>
                                        <td class="sorting_1">Edinburgh</td>
                                        <td>51</td>
                                        <td>2008/11/13</td>
                                        <td>$183,000</td>
                                    </tr>
                                    <tr class="even" role="row">
                                        <td class="">Sonya Frost</td>
                                        <td>Software Engineer</td>
                                        <td class="sorting_1">Edinburgh</td>
                                        <td>23</td>
                                        <td>2008/12/13</td>
                                        <td>$103,600</td>
                                    </tr>
                                    <tr class="odd" role="row">
                                        <td class="">Tiger Nixon</td>
                                        <td>System Architect</td>
                                        <td class="sorting_1">Edinburgh</td>
                                        <td>61</td>
                                        <td>2011/04/25</td>
                                        <td>$320,800</td>
                                    </tr>
                                    <tr class="even" role="row">
                                        <td class="">Angelica Ramos</td>
                                        <td>Chief Executive Officer (CEO)</td>
                                        <td class="sorting_1">London</td>
                                        <td>47</td>
                                        <td>2009/10/09</td>
                                        <td>$1,200,000</td>
                                    </tr>
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th rowspan="1" colspan="1">Name</th>
                                        <th rowspan="1" colspan="1">Position</th>
                                        <th rowspan="1" colspan="1">Office</th>
                                        <th rowspan="1" colspan="1">Age</th>
                                        <th rowspan="1" colspan="1">Start date</th>
                                        <th rowspan="1" colspan="1">Salary</th>
                                    </tr>
                                </tfoot>
                            </table>
                          
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection