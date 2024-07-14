<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Edit Devisi</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body style="background: lightgray">
    @auth
    @php
        $user = Auth::user();
    @endphp
    @if ($user && ($user->role == 'admin' || $user->role == 'superadmin'))
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-12">
                <div>
                    <h3 class="text-center my-4">Edit Devisi</h3>
                    <hr>
                </div>
                <div class="card border-0 shadow-sm rounded">
                    <div class="card-body">
                        <form action="{{ route('devisi.update', $devisi->id) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="form-group">
                                <label for="nama_devisi">Nama Devisi</label>
                                <input type="text" class="form-control @error('nama_devisi') is-invalid @enderror" name="nama_devisi" value="{{ old('nama_devisi', $devisi->nama_devisi) }}">
                                @error('nama_devisi')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group mt-3">
                                <label for="anggota_id">Nama Anggota</label>
                                <select class="form-control @error('anggota_id') is-invalid @enderror" name="anggota_id">
                                    @foreach($pegawais as $pegawai)
                                        <option value="{{ $pegawai->id }}" {{ $pegawai->id == $devisi->anggota_id ? 'selected' : '' }}>{{ $pegawai->nama_depan }} {{ $pegawai->nama_belakang }}</option>
                                    @endforeach
                                </select>
                                @error('anggota_id')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <button type="submit" class="btn btn-md btn-primary mt-4">Update</button>
                            <a href="{{ route('devisi.index') }}" class="btn btn-md btn-secondary mt-4">Back</a>
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
