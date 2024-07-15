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
                        Data Company
                    </h5>
                    @if (Auth::user()->role == 'superadmin')
                    <a href="{{ route('companies.create') }}" class="btn btn-md btn-success mb-3">Tambah</a>
                @endif
                </div>
                <div class="card-body">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">Logo</th>
                                <th scope="col">Nama</th>
                                <th scope="col">Email</th>
                                <th scope="col">Website</th>
                                <th scope="col">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($companies as $company)
                            <tr>
                                <td>
                                    <img src="{{ asset('storage/img/' . $company->logo) }}" alt="Logo" width="50" height="50">
                                </td>                                
                                <td>{{ $company->nama }}</td>
                                <td>{{ $company->email }}</td>
                                <td>
                                    <a href="{{ $company->website }}">{{ $company->website }}</a>
                                </td>
                                <td>
                                    @if (Auth::user()->role == 'admin' || Auth::user()->role == 'superadmin')
                                    <form onsubmit="return confirm('Apakah Anda Yakin ?');" action="{{ route('companies.destroy', $company->id) }}" method="POST">
                                        <a href="{{ route('companies.show', $company->id) }}" class="btn btn-sm btn-dark">SHOW</a>
                                        <a href="{{ route('companies.edit', $company->id) }}" class="btn btn-sm btn-primary">EDIT</a>
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-danger">HAPUS</button>
                                    </form>
                                    @else
                                        <a href="{{ route('companies.show', $company->id) }}" class="btn btn-sm btn-dark">SHOW</a>
                                    @endif
                                </td>
                            </tr>
                            @empty
                                    <tr>
                                        <td colspan="5" class="text-center">Data Company belum tersedia.</td>
                                    </tr>
                            @endforelse
                        </tbody>
                    </table>
                    <div class="d-flex justify-content-center">
                        {{ $companies->links('pagination::bootstrap-5') }}
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

    