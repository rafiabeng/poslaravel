@extends('layouts.admin')
@section('title')
    Rekap Absen
@endsection

@section('content')
    <div class="container-fluid">
        <!-- Info boxes -->
        <div class="card">
            <div class="card-header">

                <!-- Judul Card -->
                <h5 class="card-title">Absensi Online</h5>
            </div>
            <!-- /.card-header -->
            <div class="card-body">

                </form>
                <div class="container text-center">
                    <!-- Isi Form Di bawah ini -->

                    <div class="container text-center">
                        <h3>Rekap Absensi Karyawan Bulan {{ $namabulan }}</h1>

                            <form action="{{ url('/admin/attendance') }}" method="get">
                                <select name="bulan" id='gMonth2'>
                                    <option value=''>--Select Month--</option>
                                    <option value='1'>Janaury</option>
                                    <option value='2'>February</option>
                                    <option value='3'>March</option>
                                    <option value='4'>April</option>
                                    <option value='5'>May</option>
                                    <option value='6'>June</option>
                                    <option value='7'>July</option>
                                    <option value='8'>August</option>
                                    <option value='9'>September</option>
                                    <option value='10'>October</option>
                                    <option value='11'>November</option>
                                    <option value='12'>December</option>
                                </select>
                                <input type="submit" value="">

                                <table id="example2" class="table table-striped table-bordered">

                                    <thead>


                                        <tr>

                                            <th>Nama</th>
                                            <th>Jabatan</th>
                                            <th>Telat Masuk</th>
                                            <th>Tidak Hadir</th>

                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($users as $user)
                                            <tr>
                                                <td>{{ $user->name }}</td>
                                                <td>{{ $user->jabatan }}</td>
                                                <td>{{ $user->jumlahTelat($bulan) }}</td>
                                                <td>{{ $user->jumlahTidakHadir($bulan) }}</td>
                                            </tr>
                                        @endforeach

                                    </tbody>
                                </table>



                                <!-- Akhir Form -->

                                <!-- end line php -->



                    </div>
                </div>
            </div>
        </div>

    @endsection
