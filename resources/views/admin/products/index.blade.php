@extends('layouts.admin')
@section('title')
    Produk
@endsection



@section('content')
    <!-- DataTables -->
    <link rel="stylesheet" href="/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
    <link rel="stylesheet" href="/plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
    <div class="card">
        <div class="card-body">
            <div class="d-flex justify-content-end mb-3">
                <a href="{{ url('/admin/products/create') }}" class="btn btn-primary">+Tambah Produk</a>
            </div>
            <table id="tes" class="table table-bordered text-center">
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
                            <td>Rp {{ number_format($product->selling_price) }}</td>
                            <td>Rp {{ number_format($product->modal_price) }}</td>
                            <td><a href="{{ url('/admin/products/' . $product->id . '/edit') }}"
                                    class="btn btn-sm btn-primary">Edit</a>
                            </td>
                        </tr>


                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    @push('scripts')
        <script>
            $(document).ready(function() {
                $('#tes').DataTable();
            });
        </script>

    @endpush
@endsection
