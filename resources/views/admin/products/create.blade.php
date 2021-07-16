@extends('layouts.admin')
@section('title')
    Tambah Produk Baru
@endsection



@section('content')


    <div class="card">
        <div class="card-body">
            <form action="{{ url('/admin/products') }}" method="POST">
                @csrf
                <div class="d-flex justify-content-center">
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" name="name" id="name" class="form-control">
                    </div>
                </div>

                <div class="d-flex justify-content-center">
                    <div class="form-group">
                        <label for="selling_price">Harga Jual</label>
                        <input type="text" name="selling_price" id="selling_price" class="form-control">
                    </div>
                </div>

                <div class="d-flex justify-content-center">
                    <div class="form-group">
                        <label for="modal_price">Harga modal</label>
                        <input type="text" name="modal_price" id="modal_price" class="form-control">
                    </div>
                </div>
                <div class="d-flex justify-content-center">
                    <button type="submit" class="btn btn-primary mt-3">Submit</button>
                </div>
            </form>
        </div>
    </div>




@endsection
