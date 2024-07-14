<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Show Devisi</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body style="background: lightgray">
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-12">
                <div>
                    <h3 class="text-center my-4">Show Devisi</h3>
                    <hr>
                </div>
                <div class="card border-0 shadow-sm rounded">
                    <div class="card-body">
                        <div class="form-group">
                            <label for="nama_devisi">Nama Devisi</label>
                            <input type="text" class="form-control" name="nama_devisi" value="{{ $devisi->nama_devisi }}" disabled>
                        </div>
                        <div class="form-group mt-3">
                            <label for="nama_anggota">Nama Anggota</label>
                            <input type="text" class="form-control" name="nama_anggota" value="{{ $devisi->anggota->nama_depan }} {{ $devisi->anggota->nama_belakang }}" disabled>
                        </div>
                        <a href="{{ route('devisi.index') }}" class="btn btn-md btn-secondary mt-4">Back</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
