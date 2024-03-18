@extends('layouts.dashboard')
@section('content')
    <div class="card mx-4">
        <div class="card-header">
            <h4 class="card-title">Edit Profile</h4>
            <button type="button" onclick="updateProfileMahasiswa()" class="btn btn-outline-primary">Simpan</button>
        </div>
        <div class="card-body">
            <div class="basic-form">
                <form id="form-edit-profile-mahasiswa" action="{{ route('mahasiswa.profile.update') }}" method="POST">
                    @csrf
                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label text-dark">Nama</label>
                        <div class="col-sm-9">
                            <input name="name" class="form-control" type="text" value="{{ $user->name }}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label text-dark">NIM</label>
                        <div class="col-sm-9">
                            <input name="nim" class="form-control" type="text" value="{{ $user->nim }}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label text-dark">Jurusan</label>
                        <div class="col-sm-9">
                            <input name="major" class="form-control" type="text" value="{{ $user->major }}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label text-dark">Prodi</label>
                        <div class="col-sm-9">
                            <input name="study_program" class="form-control" type="text" value="{{ $user->study_program }}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label text-dark">Kelas</label>
                        <div class="col-sm-9">
                            <input name="class" class="form-control" type="text" value="{{ $user->class }}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label text-dark">Email</label>
                        <div class="col-sm-9">
                            <input name="email" class="form-control" type="email" value="{{ $user->email }}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label text-dark">HP</label>
                        <div class="col-sm-9">
                            <input name="phone" class="form-control" type="text" value="{{ $user->phone }}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label text-dark">Jenis Kelamin</label>
                        <div class="col-sm-9">
                            <select name="gender" class="form-control">
                                <option selected hidden>{{ $user->gender }}</option>
                                <option value="Laki-laki">Laki-laki</option>
                                <option value="Perempuan">Perempuan</option>
                            </select>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
@push('script')
    <script>
        function updateProfileMahasiswa() {
            const form = document.getElementById('form-edit-profile-mahasiswa');
            form.submit();
        }
    </script>
@endpush