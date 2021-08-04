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
                <div class=" d-flex justify-content-center">
                    <div class="form-group">
                        <label for="modal_price">Resep</label>
                        <textarea type="text" name="resep" id="modal_price" class="form-control"
                            value="">{{ $product->resep }}</textarea>
                    </div>
                </div>


                <div class=" d-flex justify-content-center">
                    <div class="form-group">
                        <label for="espresso">Memerlukan Espresso</label>
                        <select name="espresso" id="espresso" class="form-control">
                            <option selected="selected" value="">--Silahkan dipilih--
                            </option>
                            <option value="1">Iya</option>
                            <option value="0">Tidak</option>
                        </select>
                    </div>
                </div>



        </div>
        <div class=" d-flex justify-content-center align-items-center mt-3">

            <button type="submit" class="btn btn-primary ml-3">Submit</button>
        </div>
        </form>
    </div>
    </div>




@endsection
