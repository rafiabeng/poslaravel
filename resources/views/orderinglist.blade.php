@extends('layouts.user')
@section('title')
    Ordering List
@endsection

@section('content')
    <div class="container-fluid">
        <div class="card">
            <div class="card-header">
                <h5 class="card-title">Ordering List</h5>
            </div>
            <div class="card-body">

                @foreach ($tables as $table)
                    @if ($table->carts()->count() != 0)
                        <div class="card w-100">

                            <div class="card-body">
                                <div class=" d-flex justify-content-between align-items-center">
                                    <h4 class="">Meja {{ $table->nomor_meja }}

                                    </h4>
                                    <form action="{{ url('/orderinglist/finish/' . $table->nomor_meja) }}" method="post">
                                        @csrf
                                        <button class="btn btn-sm btn-success">Selesai</button>
                                    </form>
                                </div>
                                <hr>

                                <?php $esp = 0; ?>

                                @foreach ($table->carts() as $cart)
                                    <p>{{ $cart->product->name }} - {{ $cart->quantity }}</p>
                                    @if ($cart->product->espresso == 1)
                                        <?php $esp += 1; ?>
                                        @if ($cart->quantity >= 1)
                                            <?php $esp *= $cart->quantity; ?>
                                        @endif
                                    @endif
                                @endforeach
                                @if ($esp != 0)
                                    Espresso yang harus disiapkan: <b>{{ $esp }} shot</b>
                                @endif
                            </div>
                        </div>
                    @endif
                @endforeach


                {{-- @foreach ($tables as $table)
                    <div class="card">
                        <div class="card-header">
                            <p>Meja {{ $table }}</p>
                        </div>
                        <div class="card-body">
                            @foreach ($orderitems as $orderitem)
                                <p>{{ $orderitem->name }}</p>
                            @endforeach
                        </div>
                    </div>
                @endforeach --}}

            </div>
        </div>
    </div>

@endsection
