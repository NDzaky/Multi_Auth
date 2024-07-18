<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Detail Pegawai</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        h3{
            color: white;
        }
    </style>
</head>
<body style="background: rgb(17, 17, 17)">
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-12">
                <div>
                    <h3 class="text-center my-4">Detail Pegawai</h3>
                    <hr>
                </div>
                <div class="card border-0 shadow-sm rounded">
                    <div class="card-body">
                        <table class="table table-bordered">
                            <tr>
                                <th>Nama Awal</th>
                                <td>{{ $pegawai->nama_depan }}</td>
                            </tr>
                            <tr>
                                <th>Nama Akhir</th>
                                <td>{{ $pegawai->nama_belakang }}</td>
                            </tr>
                            <tr>
                                <th>Nama Company</th>
                                <td>{{ $pegawai->company->nama }}</td>
                            </tr>
                            <tr>
                                <th>Email</th>
                                <td>{{ $pegawai->email }}</td>
                            </tr>
                            <tr>
                                <th>Nomor</th>
                                <td>{{ $pegawai->nomor }}</td>
                            </tr>
                        </table>
                        <a href="{{ route('pegawai.index') }}" class="btn btn-md btn-secondary mt-4">Back</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
