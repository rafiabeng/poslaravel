@extends('layouts.admin')
@section('title')
Rekap Absen
@endsection

@section('content')
<section class="content">
    <div class="container-fluid">
      <!-- Info boxes -->
          <div class="card">
            <div class="card-header">

            <!-- Judul Card -->
              <h5 class="card-title">Absensi Online</h5>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                    <div class="container text-center">
                    <!-- Isi Form Di bawah ini -->
                    <form action="controller/checkin.php" method="POST">
                    <div class="container text-center">
                    <table id="example2" class="table table-striped table-bordered">

                                  <thead>
                                  <div class="text-left ml-0">
                                  
                    <!-- <a class="btn btn-primary" href="tambahmenu" role="button">Add</a> -->
                    </div> 
                                  <tr>
                                      
                                      <th>Nama</th>
                                      <th>Jabatan</th>
                                      <th>Telat Masuk</th>
                                      <th>Tidak Hadir</th>
                                      <th>Lembur</th>

                                      

                                  </tr>
                                  </thead>
                                  <tbody>
                                  
                                    <tr>
                                    
                                    <td>".$row['nama']."</td>  
                                    <td>".$row['jabatan']."</td>                        
                                    <td>".$row2['hasil2']."</td>
                                    <td>".$tidakhadir."</td>
                                    <td>".$row4['hasil4']."</td>
                                    </tr>
                                    
                                 
                                 </tbody>
                              </table>

                    

                    <!-- Akhir Form -->
          </form>
                  <!-- end line php -->


          
                    </div>
            </div>
          </div>
    </div>
</section>
@endsection