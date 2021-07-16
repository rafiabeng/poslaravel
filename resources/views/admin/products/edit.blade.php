@extends('layouts.admin')
@section('title')
    Edit Produk
@endsection



@section('content')


    <div class="card">
        <div class="card-body">

            <form action="{{ url('/admin/products/' . $product->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="d-flex justify-content-center">
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" name="name" id="name" class="form-control" value="{{ $product->name }}">
                    </div>
                </div>

                <div class="d-flex justify-content-center">
                    <div class="form-group">
                        <label for="selling_price">Harga Jual</label>
                        <input type="text" name="selling_price" id="selling_price" class="form-control"
                            value="{{ $product->selling_price }}">
                    </div>
                </div>

                <div class=" d-flex justify-content-center">
                    <div class="form-group">
                        <label for="modal_price">Harga modal</label>
                        <input type="text" name="modal_price" id="modal_price" class="form-control"
                            value="{{ $product->modal_price }}">
                    </div>
                </div>
                <div class=" d-flex justify-content-center align-items-center mt-3">
                    <form action="{{ url('/admin/products/' . $product->id) }}" method="post">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger"><i class="fas fa-trash mr-2"></i>Hapus</button>
                    </form>
                    <button type="submit" class="btn btn-primary ml-3">Submit</button>
                </div>
            </form>
        </div>
    </div>




@endsection
