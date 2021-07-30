@extends('layouts.admin')
@section('title')
    Transaction Details
@endsection
@section('content')

    <div class="container-fluid">


        <div class="card">
            <div class="card-body">


                <table id="tes" class="table table-bordered text-center">
                    <thead>
                        <th>No.</th>

                        <th>Pesanan</th>
                        <th>Banyaknya</th>
                        <th>Subtotal</th>
                        <th>Nama Kasir</th>

                    </thead>
                    <tbody>
                        @foreach ($details as $detail)
                            <tr>
                                <td>{{ $loop->iteration }}</td>

                                <td>{{ $detail->product->name }}</td>
                                <td>{{ $detail->quantity }}</td>
                                <td>Rp {{ number_format($detail->product->selling_price * $detail->quantity) }}</td>
                                <td>{{ $detail->kasir->name }}</td>


                            </tr>


                        @endforeach
                    </tbody>
                </table>
            </div>
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
