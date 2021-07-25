@extends('layouts.user')
@section('title')
    Transaksi
@endsection



@section('content')

    <div class="d-flex">

        <div class="card col-md-7 mr-5 ml-2">
            <div class="card-header">
                <h5 class="card-title">Pemesanan <b>Meja {{ $no_meja }}</b></h5>
            </div>
            <div class="card-body">
                <div class="col-lg-12">
                    <div class="row">
                        @foreach ($products as $product)
                            <div class="col-md-4">
                                <div class="d-flex">
                                    <div class="card shadow-lg">

                                        <div class="card-body">
                                            <p>{{ $product->name }}</p>
                                            <p class="text-success">Rp. {{ $product->selling_price }}</p>

                                            <div class="d-flex justify-content-center">
                                                <!-- Button trigger modal -->
                                                <button type="button" class="btn btn-primary btn-block" data-toggle="modal"
                                                    data-target="#cartModal{{ $loop->iteration }}">
                                                    Add to Cart
                                                </button>

                                                <!-- Modal -->
                                                <div class="modal fade" id="cartModal{{ $loop->iteration }}" tabindex="-1"
                                                    role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
                                                    <div class="modal-dialog" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title">Tambahkan
                                                                    <b>{{ $product->name }}</b> ke
                                                                    keranjang
                                                                </h5>
                                                                <button type="button" class="close" data-dismiss="modal"
                                                                    aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <form action="{{ url('/cart') }}" method="post">
                                                                    @csrf
                                                                    <input type="hidden" name="noMeja"
                                                                        value="{{ $no_meja }}">
                                                                    <input type="hidden" name="idProduct"
                                                                        value="{{ $product->id }}">

                                                                    <div class="form-group w-50 mx-auto text-center">
                                                                        <label for="quantity">Kuantitas: </label>
                                                                        <input min="1" type="number" name="quantity"
                                                                            id="quantity" class="form-control" value="1"
                                                                            placeholder="" aria-describedby="helpId">


                                                                    </div>
                                                                    <div class="d-flex justify-content-center">
                                                                        <input name="" id="" class="btn w-50 btn-primary"
                                                                            type="submit" value="Add">
                                                                    </div>

                                                                </form>

                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
        <div class="card col-md-4">
            <div class="card-header">
                Pesanan
            </div>
            <div class="card-body">
                <input type="hidden" value="{{ $total = 0 }}">
                @foreach ($cartItems as $cartItem)


                    <p class="text-left">{{ $cartItem->quantity }} x {{ $cartItem->name }} (@
                        {{ number_format($cartItem->selling_price) }}) =
                        <input type="hidden" value="{{ $g = $cartItem->selling_price * $cartItem->quantity }}">
                        {{ number_format($g) }}
                    </p>
                    <input type="hidden" value="{{ $total += $g }}">
                @endforeach
                <p> <b> Total:
                        Rp. {{ number_format($total) }}</b></p>
                <input type="hidden" name="total" value="{{ $total }}">
                <div class="container text-right">
                    <button type="button" class="btn btn-primary btn-block" data-toggle="modal">
                        Bayar
                    </button>
                </div>
            </div>

        </div>
    </div>

@endsection
