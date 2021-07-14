@extends('layouts.user')
@section('title')
Absensi
@endsection



@section('content')\
<?php 
$date = date("Y/m/d");
$time = date("H:i:s");
?>
<form action="controller/checkin.php" method="POST">
            <input type="hidden" name="iduser" value="{{Auth::user()->id}}">
            <input type="hidden" name="tanggal" value="<?php echo $date; ?>">
            <input type="hidden" name="jam" value="<?php echo $time; ?>">
            <input type="hidden" name="ket" value="Masuk">
                        <?php
                        //start line code untuk menampilkan tombol check in
                     $bAwIn = $koneksi->query("SELECT bAwalCheckIn FROM batasabsen");
                     while ($bAwalCheckIn = $bAwIn->fetch_assoc()){
                        $x1 = $bAwalCheckIn['bAwalCheckIn'];
                     }

                     $bAkIn = $koneksi->query("SELECT bAkhirCheckIn FROM batasabsen");
                     while ($bAkhirCheckIn = $bAkIn->fetch_assoc()){
                        $x2 = $bAkhirCheckIn['bAkhirCheckIn'];
                     }

                    $sudahCheckIn = false;
                    //mengambil tanggal absen terakhir dr user 
                    $data = $koneksi->query("SELECT * FROM absensi WHERE iduser = '$_SESSION[id]' AND ket = 'Masuk' ORDER BY id DESC LIMIT 1");
                    while($dataUser = $data->fetch_assoc()){
                        
                        $tanggalHariIni = date("Y-m-d");
                        $tanggalCheckIn = $dataUser['tanggal'];
                        
                        if ($tanggalHariIni == $tanggalCheckIn) {
                            $sudahCheckIn = true;
                            break;
                        }else {
                            $sudahCheckIn = false;
                        }
                    }
                    
                    if($sudahCheckIn){?>
                          
                          <p class ="text-center" > Anda Sudah Check In </p>
                    

                    <?php

                    } else {

                    if(date("H") < $x2 && date("H") > $x1){

                    ?>
                      <!-- end line php -->
                      <!-- ##### BUTTON CHECK IN ##### -->
                      <button type="submit" name="submit" class="btn btn-block btn-primary">Check In</button>
                      
                      <!-- start line php -->
                      <?php
                } else if (date("H") < $x1){ ?>                   
                            <p class ="text-center" > Jam Check In Belum Dimulai </p>
                <?php
                } else{ ?>                        
                            <p class ="text-center" > Jam Check In Telah Berakhir </p>                    
            <?php
                }
                   } ?>
                   </form>
                    <!-- end line php -->
                    <form action="controller/checkout.php" method="POST">
            <input type="hidden" name="iduser" value="<?php echo $_SESSION['id']; ?>">
            <input type="hidden" name="tanggal" value="<?php echo $date; ?>">
            <input type="hidden" name="jam" value="<?php echo $time; ?>">
            <input type="hidden" name="ket" value="Pulang">
                    <!-- Start line php untuk check out -->
                    <?php 
                        $bAwOut = $koneksi->query("SELECT bAwalCheckOut FROM batasabsen");
                     while ($bAwalCheckOut = $bAwOut->fetch_assoc()){
                        $y1 = $bAwalCheckOut['bAwalCheckOut'];
                     }

                        $sudahCheckOut = false;

                            $data = $koneksi->query("SELECT * FROM absensi WHERE iduser = '$_SESSION[id]' AND ket = 'Pulang' ORDER BY id DESC LIMIT 1");
                    while($dataUser = $data->fetch_assoc()){
                        // echo $dataUser['chekin']."\n";
                        $tanggalHariIni = date("Y-m-d");
                        $tanggalCheckOut = $dataUser['tanggal'];
                        
                        

                   
                        if ($tanggalHariIni == $tanggalCheckOut) {
                            $sudahCheckout = true;
                            break;
                        }else {
                            $sudahCheckout = false;
                        }
                    }
                    
                    if($sudahCheckout){?>
                          
                          <p class ="text-center" > Anda Sudah Check Out </p>
               
                    <?php
                         }  else { if(date("H") >= $y1 ){
                          

                        ?>
                        <!-- ##### BUTTON CHECK OUT ##### -->
                      <input type="submit" name="submit" class="btn btn-block btn-primary" value="Check Out">
                      <?php } 
                             else{?>
                               <div class="col-sm-12">
                               <p class ="text-center" > Jam Check Out Belum Dimulai </p>
                              </div>
                    
            <?php
                }}
                            ?>
                    
                
                     </form>

                     @endsection