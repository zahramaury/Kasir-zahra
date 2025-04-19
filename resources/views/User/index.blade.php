@extends('main')
@section('title', 'User - My Website')
@section('breadcrumb', 'User')
@section('page-title', 'User')

@section('content')
<div class="container">
    <div class="d-flex justify-content-end align-items-center mb-4">
        <a class="btn btn-primary" href="{{ route('users.create') }}">Tambah User</a>
    </div>

    <div class="card shadow-sm">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-hover align-middle text-center">
                    <thead class="table-light">
                        <tr>
                            <th scope="col">No</th>
                            <th scope="col">Email</th>
                            <th scope="col">Nama</th>
                            <th scope="col">Role</th>
                            <th scope="col">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php $id = 1; @endphp
                        @foreach ($users as $user)
                        <tr>
                            <th scope="row">{{ $id++ }}</th>
                            <td>{{ $user->email }}</td>
                            <td>{{ $user->name }}</td>
                            <td>
                                <span class="badge bg-{{ $user->role == 'admin' ? 'primary' : 'secondary' }}">
                                    {{ ucfirst($user->role) }}
                                </span>
                            </td>
                            <td>
                                <div class="d-flex justify-content-center gap-2">
                                    <a href="{{ route('users.edit', $user->id) }}" class="btn btn-warning btn-sm">Edit</a>
                                    <form action="{{ route('users.destroy', $user->id) }}" method="POST" onsubmit="return confirm('Yakin mau hapus user ini?')">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-danger btn-sm" type="submit">Hapus</button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                @if ($users->isEmpty())
                    <div class="text-center mt-4">
                        <p class="text-muted">Belum ada data user.</p>
                    </div>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection
