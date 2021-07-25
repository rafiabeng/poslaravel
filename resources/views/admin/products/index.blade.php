@extends('layouts.admin')
@section('title')
    Produk
@endsection



@section('content')
    <div class="card">
        <div class="card-body">
            <div class="d-flex justify-content-end mb-5">
                <a href="{{ url('/admin/products/create') }}" class="btn btn-primary">Tambah Produk</a>
            </div>
            <table class="table table-bordered text-center">
                <thead>
                    <th>No.</th>
                    <th>Nama Produk</th>
                    <th>Harga Jual</th>
                    <th>Harga Modal</th>
                    <th>Aksi</th>
                </thead>
                <tbody>
                    @foreach ($products as $product)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $product->name }}</td>
                            <td>
                                <p>Rp {{ $product->selling_price }}</p>
                            </td>
                            <td>{{ $product->modal_price }}</td>
                            <td><a href="{{ url('/admin/products/' . $product->id . '/edit') }}"
                                    class="btn btn-sm btn-primary">Edit</a>
                            </td>
                        </tr>


                    @endforeach
                </tbody>
            </table>
        </div>
    </div>


@endsection
