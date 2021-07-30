@extends('layouts.admin')
@section('title')
    Dashboard
@endsection
@section('content')

    <div class="container-fluid">
        <!-- Info boxes -->
        <div class="row">
            <div class="col-12 col-sm-6 col-md-3">
                <div class="info-box">
                    <span class="info-box-icon bg-info elevation-1"><i class="fas fa-chart-line"></i></span>

                    <div class="info-box-content">
                        <span class="info-box-text">Omzet Hari Ini</span>
                        <span class="info-box-number">
                            Rp {{ number_format($omzetHariIni) }}


                        </span>
                    </div>
                    <!-- /.info-box-content -->
                </div>
                <!-- /.info-box -->
            </div>
            <!-- /.col -->
            <div class="col-12 col-sm-6 col-md-3">
                <div class="info-box mb-3">
                    <span class="info-box-icon bg-success elevation-1"><i class="fas fa-chart-line"></i></span>

                    <div class="info-box-content">
                        <span class="info-box-text">Omzet Bulan Ini</span>
                        <span class="info-box-number">
                            Rp {{ number_format($omzetBulanIni) }}

                        </span>
                    </div>
                    <!-- /.info-box-content -->
                </div>
                <!-- /.info-box -->
            </div>
            <!-- /.col -->

            <!-- fix for small devices only -->
            <div class="clearfix hidden-md-up"></div>

            <div class="col-12 col-sm-6 col-md-3">
                <div class="info-box mb-3">
                    <span class="info-box-icon bg-info elevation-1"><i class="fas fa-shopping-cart"></i></span>

                    <div class="info-box-content">
                        <span class="info-box-text">Keuntungan Hari Ini</span>
                        <span class="info-box-number">
                            Rp {{ number_format($keuntunganHariIni) }}
                        </span>
                    </div>
                    <!-- /.info-box-content -->
                </div>
                <!-- /.info-box -->
            </div>
            <!-- /.col -->
            <div class="col-12 col-sm-6 col-md-3">
                <div class="info-box mb-3">
                    <span class="info-box-icon bg-success elevation-1"><i class="fas fa-shopping-cart"></i></span>

                    <div class="info-box-content">
                        <span class="info-box-text">Keuntungan Bulan Ini</span>
                        <span class="info-box-number">
                            Rp {{ number_format($keuntunganBulanIni) }}
                        </span>
                    </div>
                    <!-- /.info-box-content -->
                </div>
                <!-- /.info-box -->
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
        <div class="card">
            <div class="card-body">
                <table id="tes" class="table table-bordered text-center">
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th>Resi Transaksi</th>
                            <th>Nomor Meja</th>
                            <th>Total Transaksi</th>
                            <th>Nama Kasir</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($trans as $transaction)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td><a href="{{ url('/admin/dashboard/' . $transaction->no_resi) }}">{{ $transaction->no_resi }}
                                </td>
                                <td>{{ $transaction->no_meja }}</td>
                                <td>Rp {{ $transaction->total_harga }}</td>
                                <td>{{ $transaction->kasir->name }}</td>
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
