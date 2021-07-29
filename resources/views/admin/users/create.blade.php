@extends('layouts.admin')
@section('title')
    Tambah User Baru
@endsection



@section('content')


    <div class="card">
        <div class="card-body">
            <form action="{{ url('/admin/users') }}" method="POST">
                @csrf
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="name">Nama</label>
                        <input type="text" name="name" id="name" class="form-control">
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group">
                        <label for="jabatan">Jabatan</label>
                        <select name="jabatan" id="jabatan" class="form-control">
                            <option value="admin">Admin</option>
                            <option value="barista">Barista</option>
                            <option value="waiter">Waiter</option>
                            <option value="kasir">Kasir</option>
                        </select>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group">
                        <label for="email">E-mail</label>
                        <input type="email" name="email" id="email" class="form-control">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" name="password" id="password" class="form-control">
                    </div>
                </div>
                <div class="col-md-6  ">
                    <div class="d-flex justify-content-end">

                        <button type="submit" class="btn btn-primary mt-3">Submit</button>
                    </div>
                </div>
            </form>
        </div>
    </div>




@endsection
