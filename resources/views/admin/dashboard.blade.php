@extends('template-admin')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h4 class="text-center">Selamat datang di Dashboard Admin</h4>
        </div>
    </div>
    <div class="row">
        <div class="col-md-4">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Total Users</h5>
                    <p class="card-text">Jumlah pengguna terdaftar: 100</p>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Total Orders</h5>
                    <p class="card-text">Total pesanan: 50</p>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Total Products</h5>
                    <p class="card-text">Jumlah produk: 200</p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection