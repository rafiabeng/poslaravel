@extends('layouts.user')
@section('title')
Produk
@endsection



@section('content')
<section class="content">
<div class="container-fluid">
    <div class="card">
        <div class="card-header">
            <h5 class="card-title">Absensi Online</h5>
        </div>
        <div class="card-body">
            <div class="container col-md-4">
                <button type="submit" class="btn btn-block btn-primary">Check In</button>
            
             
                <button type="submit" class="btn btn-block btn-primary">Check Out</button>
            </div>
        </div>
    </div>
</div>
</section>
@endsection