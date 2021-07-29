@extends('layouts.admin')
@section('title')
    Manajemen Users
@endsection

@section('content')
    <div class="card">
        <div class="card-body">
            <div class="d-flex justify-content-end mb-5">
                <a href="{{ url('/admin/users/create') }}" class="btn btn-primary">Tambah User</a>
            </div>
            <table class="table table-bordered text-center">
                <thead>
                    <th>No.</th>
                    <th>Nama</th>
                    <th>Jabatan</th>
                    <th>E-mail</th>
                    <th>Aksi</th>
                </thead>
                <tbody>
                    @foreach ($users as $user)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $user->name }}</td>
                            <td>
                                <p>{{ $user->jabatan }}</p>
                            </td>
                            <td>{{ $user->email }}</td>

                            <td>
                                <form action="{{ url('/admin/users/' . $user->id) }}" method="post">
                                    @csrf
                                    @method('delete')
                                    <button class="btn btn-sm btn-danger">Hapus</button>
                                </form>
                            </td>
                        </tr>


                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
