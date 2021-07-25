@extends('layouts.user')
@section('title')
    Meja
@endsection

@section('content')
    <div class="container-fluid">
        <div class="card">
            <div class="card-header">
                <h5 class="card-title">Pilih Meja</h5>
            </div>
            <div class="card-body">

                <div class="container col-md-6">

                    @csrf
                    @foreach ($tables as $table)
                        <a href='cart/{{ $table->nomor_meja }}'
                            class='btn btn-app bg-success'>{{ $table->nomor_meja }}</a>
                    @endforeach
                </div>

            </div>
        </div>
    </div>



    </div>

@endsection
