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
                                <div class="d-flex justify-content-between align-items-center">
                                    <div class="content">
                                        <h4 class="">Meja {{ $table->nomor_meja }}</h4>
                                    </div>
                                    <div class="content">
                                        <div class="d-flex">
                                            <div class="mr-2">
                                                <a class="btn btn-sm btn-info" target="_blank"
                                                    href="{{ url('/orderinglist/print/' . $table->nomor_meja) }}">Print
                                                    Struk
                                                </a>
                                            </div>
                                            <form action="{{ url('/orderinglist/finish/' . $table->nomor_meja) }}"
                                                method="post">
                                                @csrf
                                                <div class="mr-2">
                                                    <button class="btn btn-sm btn-success">Selesai</button>
                                                </div>
                                        </div>
                                    </div>
                                </div>
                                <hr>

                                <?php $esp = 0; ?>

                                @foreach ($table->carts() as $cart)
                                    <div class="d-flex">

                                        <a class="far fa-check-square fa-lg mr-2 pt-1"
                                            href="{{ url('/orderinglist/' . $table->nomor_meja . '/end/' . $cart->product->id) }}">
                                        </a>
                                        <p class=""><span class="font-weight-bold">({{ $cart->quantity }})
                                                {{ $cart->product->name }}</span>
                                            <span class="font-weight-bold text-info">{{ $cart->varian }}</span>


                                            @if ($cart->product->resep != null)
                                                <span class="text-muted"> <br> {{ $cart->product->resep }}</span>
                                            @endif
                                            @if ($cart->catatan != null)
                                                <span class="font-italic"><br> Note: {{ $cart->catatan }}</span>
                                        </p>
                                @endif
                            </div>

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
