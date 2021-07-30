@extends('layouts.user')
@section('title')
    Absensi
@endsection



@section('content')

    <div class="container-fluid">
        <div class="card">
            <div class="card-header">
                <h5 class="card-title">Absensi Online</h5>
            </div>
            <div class="card-body">


                <div class="container col-md-4">
                    <form action="{{ url('/absen') }}" method="POST">
                        @csrf

                        <button type="submit" name="submit" value="checkin" class="btn btn-block btn-primary">Check
                            In</button>
                        <button type="submit" name="submit" value="checkout" class="btn btn-block btn-primary">Check
                            Out</button>
                        <div class="container text-center mt-2">
                            <a href="{{ url('/absen/history') }}">Lihat Riwayat Absen
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection
