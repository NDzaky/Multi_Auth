<x-app-layout>

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Data Perusahaan</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    </head>
    
    <body style="background: rgb(177, 175, 175)">
        @auth
        @php
            $user = Auth::user();
        @endphp
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div>
                        <h3 class="text-center my-4">Data Perusahaan</h3>
                        <hr>
                    </div>
                    <div class="card border-0 shadow-sm rounded">
                        <div class="card-body">
                            @if (Auth::user()->role == 'superadmin')
                                <a href="{{ route('companies.create') }}" class="btn btn-md btn-success mb-3">Tambah</a>
                            @endif
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th scope="col">Logo</th>
                                        <th scope="col">Nama</th>
                                        <th scope="col">Email</th>
                                        <th scope="col">Website</th>
                                        <th scope="col" style="width: 20%">ACTIONS</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($companies as $company)
                                        <tr>
                                            <td class="text-center">
                                                <img src="{{ asset('storage/img/'.$company->logo) }}" class="rounded" style="width: 150px">
                                            </td>
                                            <td>{{ $company->nama }}</td>
                                            <td>{{ $company->email }}</td>
                                            <td><a href="{{ $company->website }}" target="_blank">Link</a></td>
                                            <td class="text-center">
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
                                {{ $companies->links('pagination::bootstrap-4') }}
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
    </x-app-layout>
    