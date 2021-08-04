@extends('layouts.admin')
@section('title')
    Edit Data User
@endsection



@section('content')


    <div class="card">
        <div class="card-body">

            <form action="{{ url('/admin/users/' . $user->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="d-flex justify-content-center">
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" name="name" id="name" class="form-control" value="{{ $user->name }}">
                    </div>
                </div>

                <div class="d-flex justify-content-center">
                    <div class="form-group">
                        <label for="selling_price">E-mail</label>
                        <input type="email" name="email" id="selling_price" class="form-control"
                            value="{{ $user->email }}">
                    </div>
                </div>

                <div class="d-flex justify-content-center">
                    <div class="form-group">
                        <label for="jabatan">Jabatan</label>
                        <select name="jabatan" id="jabatan" class="form-control">
                            <option selected="selected" value="{{ $user->jabatan }}">{{ $user->jabatan }}</option>
                            <option value="admin">Admin</option>
                            <option value="barista">Barista</option>
                            <option value="waiter">Waiter</option>
                            <option value="kasir">Kasir</option>
                        </select>
                    </div>
                </div>



                <div class=" d-flex justify-content-center align-items-center mt-3">
                    {{-- <form action="{{ url('/admin/users/' . $user->id) }}" method="post">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger"><i class="fas fa-trash mr-2"></i>Hapus</button>
                    </form> --}}
                    <button type="submit" class="btn btn-primary ml-3">Update</button>
                </div>
            </form>
        </div>
    </div>




@endsection
