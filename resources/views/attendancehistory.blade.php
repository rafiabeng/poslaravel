@extends('layouts.user')
@section('title')
    Riwayat Absensi
@endsection



@section('content')
    <div class="container-fluid">


        <div class="card">
            <div class="card-body">

                <p>Riwayat Absensi Anda</p>
                <table id="example" class="table table-bordered text-center">
                    <thead>
                        <th>No.</th>
                        <th>Status</th>
                        <th>Tanggal</th>
                        <th>Waktu</th>

                    </thead>
                    <tbody>
                        @foreach ($history as $data)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td> {{ $data->status }}</td>
                                <td>{{ $data->date }}</td>
                                <td>{{ $data->time }}</td>
                            </tr>


                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

@endsection
