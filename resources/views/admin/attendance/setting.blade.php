@extends('layouts.admin')


@section('content')
    <div class="container-fluid">
        <!-- Info boxes -->
        <div class="card">
            <div class="card-header">
                <!-- Judul Card -->
                <h5 class="card-title">Setting Page</h5>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                <div class="container col-md-4">
                    <div class="text-left">
                        <br>

                        @foreach ($attendanceSettings as $as)
                        @endforeach

                        <form action="{{ url('/admin/setting') }}" method="POST">
                            @csrf
                            @method('put')
                            <label for="batasAwal" class="for">Batas Awal Check In</label>
                            <input type="time" class="form-control" name="awalCheckIn"
                                value="{{ $as->awal_check_in }}"><br>

                            <label for="batasTelat" class="for">Batas Telat Check In</label>
                            <input type="time" class="form-control" name="batasTelat" value='{{ $as->batas_telat }}'><br>

                            <label for="batasAkhir" class="for">Batas Akhir Check In</label>
                            <input type="time" class="form-control" name="akhirCheckIn"
                                value='{{ $as->akhir_check_in }}'><br>

                            <label for="batasAwalCheckOut" class="for">Batas Awal Check Out </label>
                            <input type="time" class="form-control" name="awalCheckOut" value='{{ $as->awal_check_out }}'>

                            <div class="container text-right pl-0 mt-3 p-0">
                                <input type="submit" name="submit" class="btn btn-block btn-primary" value="Save">
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>


    @endsection
