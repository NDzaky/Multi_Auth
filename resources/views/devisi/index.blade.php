<!DOCTYPE html>
<html lang="en" data-bs-theme="dark">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/css/bootstrap.min.css">
    <script src="https://kit.fontawesome.com/ae360af17e.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="../../css/style.css">
</head>

<body>
    @auth
    @php
        $user = Auth::user();
    @endphp
    <div class="wrapper">
        <x-sidebar></x-sidebar>
        <div class="main">
            <x-navbar></x-navbar>
            <main class="content px-3 py-2">
                <!-- Table Element -->
            <div class="card border-0">
                <div class="card-header">
                    <h5 class="card-title">
                        Data Devisi
                    </h5>
                    @if (Auth::user()->role == 'superadmin')
                    <a href="{{ route('devisi.create') }}" class="btn btn-md btn-success mb-3">Tambah</a>
                @endif
                </div>
                <div class="card-body">
                    <table class="table">
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
                                                    <a href="{{ route('devisi.show', $devisi->id) }}" class="btn btn-sm btn-dark">Show</a>
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
                        {{ $devisis->links('pagination::bootstrap-5') }}
                    </div>
                </div>
            </div>
            </div>
            </main>
            <a href="#" class="theme-toggle">
                <i class="fa-regular fa-moon"></i>
                <i class="fa-regular fa-sun"></i>
            </a>
        </div>
    </div>
    @else
 <h1>Login dulu</h1>
@endauth
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="../../js/script.js"></script>
    
    <script>
        // Message with sweetalert
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

</html>

    