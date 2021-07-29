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
            <div class="d-flex justify-content-end mb-5">
                <a href="{{ url('/admin/products/create') }}" class="btn btn-primary">Tambah Produk</a>
            </div>
            <table id="example" class="table table-bordered text-center">
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
    <script>
        $(function() {
            $("#example").DataTable({
                "responsive": true,
                "lengthChange": false,
                "autoWidth": false,

            }).buttons().container().appendTo('#example_wrapper .col-md-6:eq(0)');
            // $('#example2').DataTable({
            //   "paging": true,
            //   "lengthChange": false,
            //   "searching": false,
            //   "ordering": true,
            //   "info": true,
            //   "autoWidth": false,
            //   "responsive": true,
            // });
        });
    </script>
    <!-- DataTables  & Plugins -->
    <script src="/plugins/datatables/jquery.dataTables.min.js"></script>
    <script src="/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
    <script src="/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
    <script src="/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
    <script src="/plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
    <script src="/plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
    <script src="/plugins/jszip/jszip.min.js"></script>
    <script src="/plugins/pdfmake/pdfmake.min.js"></script>
    <script src="/plugins/pdfmake/vfs_fonts.js"></script>
    <script src="plugins/datatables-buttons/js/buttons.html5.min.js"></script>
    <script src="/plugins/datatables-buttons/js/buttons.print.min.js"></script>
    <script src="/plugins/datatables-buttons/js/buttons.colVis.min.js"></script>
    <script src="/plugins/jquery/jquery.min.js"></script>
@endsection
