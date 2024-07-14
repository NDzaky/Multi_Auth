<x-app-layout>

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Data Devisi</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    </head>
    <body style="background: lightgray">
        @auth
        @php
            $user = Auth::user();
        @endphp
        <div class="container mt-5">
            <div class="row">
                <div class="col-md-12">
                    <div>
                        <hr>
                    </div>
                    <div class="card border-0 shadow-sm rounded">
                        <div class="card-body">
                            @if (Auth::user()->role == 'admin' || Auth::user()->role == 'superadmin')
                            <a href="{{ route('devisi.create') }}" class="btn btn-md btn-success mb-3">Tambah Devisi</a>
                            @endif
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th scope="col">Nama Devisi</th>
                                        <th scope="col">Nama Anggota</th>
                                        <th scope="col" style="width: 20%">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($devisis as $devisi)
                                        <tr>
                                            <td>{{ $devisi->nama_devisi }}</td>
                                            <td>{{ $devisi->anggota->nama_depan }} {{ $devisi->anggota->nama_belakang }}</td>
                                            <td class="text-center">
                                                @if (Auth::user()->role == 'admin' || Auth::user()->role == 'superadmin')
                                                <form onsubmit="return confirm('Apakah Anda Yakin ?');" action="{{ route('devisi.destroy', $devisi->id) }}" method="POST">
                                                    <a href="{{ route('devisi.show', $devisi->id) }}" class="btn btn-sm btn-dark">Tampilkan</a>
                                                    <a href="{{ route('devisi.edit', $devisi->id) }}" class="btn btn-sm btn-primary">Edit</a>
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-sm btn-danger">Hapus</button>
                                                </form>
                                                @else
                                                    <a href="{{ route('devisi.show', $devisi->id) }}" class="btn btn-sm btn-dark">Show</a>
                                                @endif
                                            </td>
                                        </tr>
                                    @empty
                                        <div class="alert alert-danger">
                                            Data Devisi belum tersedia.
                                        </div>
                                    @endforelse
                                </tbody>
                            </table>
                            <div class="d-flex justify-content-center">
                                {{ $devisis->links('pagination::bootstrap-4')}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @else
     <h1>Login dulu</h1>
    @endauth
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <script>
            @if(session('success'))
                Swal.fire({
                    icon: "success",
                    title: "BERHASIL",
                    text: "{{ session('success') }}",
                    showConfirmButton: false,
                    timer: 2000
                });
            @elseif(session('error'))
                Swal.fire({
                    icon: "error",
                    title: "GAGAL!",
                    text: "{{ session('error') }}",
                    showConfirmButton: false,
                    timer: 2000
                });
            @endif
        </script>
    </body>
    

</x-app-layout>

