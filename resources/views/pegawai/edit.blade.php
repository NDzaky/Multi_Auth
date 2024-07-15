<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Edit Pegawai</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body, h1, label, input, button {
            color: white;
        }
    </style>
</head>
<body style="background: rgb(59, 59, 59)">
    @auth
    @php
        $user = Auth::user();
    @endphp
    @if ($user && ($user->role == 'admin' || $user->role == 'superadmin'))
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-12">
                <div>
                    <h3 class="text-center my-4">Edit Pegawai</h3>
                    <hr>
                </div>
                <div class="card border-0 shadow-sm rounded bg-dark">
                    <div class="card-body">
                        <form action="{{ route('pegawai.update', $pegawai->id) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="form-group">
                                <label for="nama_depan">Nama Depan</label>
                                <input type="text" class="form-control @error('nama_depan') is-invalid @enderror" name="nama_depan" value="{{ old('nama_depan', $pegawai->nama_depan) }}">
                                @error('nama_depan')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group mt-3">
                                <label for="nama_belakang">Nama Depan</label>
                                <input type="text" class="form-control @error('nama_belakang') is-invalid @enderror" name="nama_belakang" value="{{ old('nama_belakang', $pegawai->nama_belakang) }}">
                                @error('nama_belakang')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group mt-3">
                                <label for="company_id">Nama Company</label>
                                <select class="form-control @error('company_id') is-invalid @enderror" name="company_id">
                                    <option value="">Pilih Company</option>
                                    @foreach($companies as $company)
                                        <option value="{{ $company->id }}" {{ old('company_id', $pegawai->company_id) == $company->id ? 'selected' : '' }}>{{ $company->nama }}</option>
                                    @endforeach
                                </select>
                                @error('company_id')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group mt-3">
                                <label for="email">Email</label>
                                <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email', $pegawai->email) }}">
                                @error('email')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group mt-3">
                                <label for="nomor">Nomor</label>
                                <input type="text" class="form-control @error('nomor') is-invalid @enderror" name="nomor" value="{{ old('nomor', $pegawai->nomor) }}">
                                @error('nomor')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <button type="submit" class="btn btn-md btn-primary mt-4">Update</button>
                            <a href="{{ route('pegawai.index') }}" class="btn btn-md btn-secondary mt-4">Back</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @else
    <center> <h1>sederhana saja</h1></center>
 @endif
@else
 <h1>Login dulu</h1>
@endauth
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
