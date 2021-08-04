@extends('layouts.admin')
@section('title')
    Produk
@endsection

@section('content')
    <div class="card">
        <div class="card-header">
            Progress Penjualan Produk Bulan Ini
        </div>
        <div class="card-body">
            <div class="container col-md-6">
                <div class="card">
                    <div class="card-body">
                        @foreach ($sum as $product)
                            <?php $productPercent = ($product->quantity / $totalQuantity) * 100; ?>
                            <p>{{ $product->name }} </p>

                            <div class="progress mb-3">
                                <div class="progress-bar progress-bar-striped progress-bar-animated"
                                    style="width:{{ $productPercent }}%">{{ $product->quantity }}
                                    pcs
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>

        </div>

    </div>


@endsection
