<x-app-layout>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Edit User</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    </head>
    <body style="background: rgb(177, 175, 175)">
        @auth
        @php
            $user = Auth::user();
        @endphp
        @if ($user && ($user->role == 'admin' || $user->role == 'superadmin'))
        <div class="container">
            <div class="row">
                <div class="col-md-8 offset-md-2">
                    <div class="card mt-5">
                        <div class="card-header">
                            <h3>Edit User</h3>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('user.update', $user->id) }}" method="POST">
                                @csrf
                                @method('PUT')
                                <div class="mb-3">
                                    <label for="first_name" class="form-label">Name</label>
                                    <input type="text" class="form-control" id="first_name" name="first_name" value="{{ $user->first_name }}" required>
                                </div>
                                <div class="mb-3">
                                    <label for="last_name" class="form-label">Name</label>
                                    <input type="text" class="form-control" id="last_name" name="last_name" value="{{ $user->last_name }}" required>
                                </div>
                                <div class="mb-3">
                                    <label for="email" class="form-label">Email</label>
                                    <input type="email" class="form-control" id="email" name="email" value="{{ $user->email }}" required>
                                </div>
                                <div class="mb-3">
                                    <label for="password" class="form-label">Password (leave blank to keep current password)</label>
                                    <input type="password" class="form-control" id="password" name="password">
                                </div>
                                <div class="mb-3">
                                    <label for="password_confirmation" class="form-label">Confirm Password</label>
                                    <input type="password" class="form-control" id="password_confirmation" name="password_confirmation">
                                </div>
                                <div class="mb-3">
                                    <label for="role" class="form-label">Role</label>
                                    <select class="form-control" id="role" name="role" required>
                                        <option value="user" {{ $user->role == 'user' ? 'selected' : '' }}>User</option>
                                        <option value="admin" {{ $user->role == 'admin' ? 'selected' : '' }}>Admin</option>
                                        @if (Auth::user()->role == 'superadmin')
                                        <option value="superadmin" {{ $user->role == 'superadmin' ? 'selected' : '' }}>Superadmin</option>
                                        @endif
                                    </select>
                                </div>
                                <button type="submit" class="btn btn-primary">Update</button>
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
    </x-app-layout>
    