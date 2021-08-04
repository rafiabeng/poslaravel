@extends('layouts.user')
@section('title')
    Transaksi
@endsection



@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <div class="card  ">
                    <div class="card-header">
                        <h5 class="card-title">Pemesanan <b>Meja {{ $no_meja }}</b></h5>
                    </div>
                    <div class="card-body">
                        <div class="col-lg-12">
                            <div class="row">

                                @foreach ($products as $product)
                                    <div class="col-md-4">
                                        <div class="d-flex">
                                            <div class="card shadow-lg" style="min-width:100%">

                                                <div class="card-body">
                                                    <p>{{ $product->name }}</p>
                                                    <p class="text-success">Rp. {{ $product->selling_price }}</p>

                                                    <div class="d-flex justify-content-center">
                                                        <!-- Button trigger modal -->
                                                        <button type="button" class="btn btn-primary btn-block"
                                                            data-toggle="modal"
                                                            data-target="#cartModal{{ $loop->iteration }}">
                                                            Add to Cart
                                                        </button>

                                                        <!-- Modal -->
                                                        <div class="modal fade" id="cartModal{{ $loop->iteration }}"
                                                            tabindex="-1" role="dialog" aria-labelledby="modelTitleId"
                                                            aria-hidden="true">
                                                            <div class="modal-dialog" role="document">
                                                                <div class="modal-content">
                                                                    <div class="modal-header">
                                                                        <h5 class="modal-title">Tambahkan
                                                                            <b>{{ $product->name }}</b> ke
                                                                            keranjang
                                                                        </h5>
                                                                        <button type="button" class="close"
                                                                            data-dismiss="modal" aria-label="Close">
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

                                                                            <div
                                                                                class="form-group w-50 mx-auto text-center">
                                                                                <label for="quantity">Kuantitas: </label>
                                                                                <input min="1" type="number" name="quantity"
                                                                                    id="quantity" class="form-control"
                                                                                    value="1" placeholder=""
                                                                                    aria-describedby="helpId">


                                                                            </div>
                                                                            <div class="d-flex justify-content-center">
                                                                                <input name="" id=""
                                                                                    class="btn w-50 btn-primary"
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

                {{ $products->links() }}

            </div>
            <div class="col-md-4">
                <div class="card">
                    <div class="card-header">
                        Pesanan
                    </div>
                    <div class="card-body">
                        <?php $total = 0; ?>
                        @foreach ($cartItems as $cartItem)
                            <div class="row">
                                <div class="col-md-10">
                                    <p class="text-left"> {{ $cartItem->product->name }} x {{ $cartItem->quantity }}

                                </div>

                                <form action="{{ url('cart/hapus') }}" method="post">

                                    <div class="col-md-2 text-center">
                                        <a class="fas fa-trash-alt"
                                            href="{{ url('/cart/' . $cartItem->no_meja . '/hapus/' . $cartItem->id_produk) }}">

                                        </a>
                                    </div>
                            </div>
                            </form>

                            <?php $total += $cartItem->product->selling_price * $cartItem->quantity; ?>
                        @endforeach


                        <div class="container text-right">

                            <!-- Button trigger modal -->
                            <button type="button" class="btn btn-primary w-100" data-toggle="modal" data-target="#paymodal">
                                Proses Pembayaran
                            </button>

                            <!-- Modal -->
                            <div class="modal fade" id="paymodal" tabindex="-1" role="dialog" aria-labelledby="modelTitleId"
                                aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title">Pembayaran</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">

                                            <?php $total = 0; ?>
                                            @foreach ($cartItems as $cartItem)
                                                <p class="text-left">{{ $cartItem->quantity }} x
                                                    {{ $cartItem->product->name }} (@
                                                    {{ number_format($cartItem->product->selling_price) }}) =
                                                    {{ number_format($cartItem->product->selling_price * $cartItem->quantity) }}
                                                </p>
                                                <?php $total += $cartItem->product->selling_price * $cartItem->quantity; ?>
                                            @endforeach
                                            <h5 class="font-weight-bold"> Total:
                                                Rp {{ number_format($total, 0, ',', '.') }}
                                            </h5>

                                            <form action="{{ url('/cart/bayar') }}" method="post">
                                                @csrf
                                                <input type="hidden" name="no_meja" value="{{ $no_meja }}">
                                                <input type="hidden" id="totalHarga" name="totalharga"
                                                    value="{{ $total }}">

                                                <p>Uang yang diterima</p>
                                                <div class="d-flex justify-content-end">
                                                    <div class="col-md-4 text-right">
                                                        <input class="form-control text-right" type="number"
                                                            name="uangditerima" id="uangDiterima"
                                                            value="{{ $total }}">
                                                    </div>

                                                </div>
                                                <div class="container mt-3">
                                                    <p class="font-weight-bold">Kembalian: Rp. <span id="kembalian">0</span>
                                                    </p>
                                                </div>
                                                <div class="container">
                                                    <div class="d-flex">
                                                        <div class="col-md-6">
                                                            <a target="_blank" href="/struk/{{ $no_meja }}"><button
                                                                    type="button"
                                                                    class="btn btn-block btn-primary mt-3 mr-1">Cetak</button></a>
                                                        </div>

                                                        <input name="" id="" class="btn w-50 btn-primary mt-3 ml-1"
                                                            type="submit" value="Bayar">

                                                    </div>
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
    </div>

    <script>
        let uangDiterima = document.getElementById('uangDiterima');
        let totalHarga = document.getElementById('totalHarga');
        let kembalian = document.getElementById('kembalian');
        uangDiterima.addEventListener('keyup', () => {
            if (uangDiterima.value < totalHarga.value) {
                kembalian.innerText = 'Uang tidak cukup!';
            } else {
                kembalian.innerText = uangDiterima.value - totalHarga.value;
            }

        });
    </script>
@endsection
