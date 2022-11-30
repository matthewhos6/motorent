@extends('layout.user.master')
@section('title','Detail')
@section('content')

<div class="cont" style="width:70%; background-color: #DBE2EF;margin:auto;">
    <div class="row">
        <div class="col-4 p3" style="background-color: yellow;">
            <div class="text-center">
                <h1 class="fw-light">Foto Produk</h1>
            </div>
            <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel" >
                <div class="carousel-inner">
                  <div class="carousel-item active">
                    <img src="..." class="d-block w-100" alt="...">
                  </div>
                  <div class="carousel-item">
                    <img src="..." class="d-block w-100" alt="...">
                  </div>
                  <div class="carousel-item">
                    <img src="..." class="d-block w-100" alt="...">
                  </div>
                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev">
                  <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                  <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next">
                  <span class="carousel-control-next-icon" aria-hidden="true"></span>
                  <span class="visually-hidden">Next</span>
                </button>
            </div>
        </div>
        <div class="col-8">
            <div class="detail p-3">
                <h1 class="fw-bold">Details</h1>
                <p class="fs-2 fw-light">Tipe : {{$barang->Nama_Motor}}</p>
                <p class="fs-3 fw-light">Harga Sewa : {{number_format($barang->Harga_sewa,2,",",".")}}</p>
                <p class="fs-3 fw-light">Rangka : {{$barang->No_Rangka}}</p>
                <p class="fs-3 fw-light">Plat Nomor :{{$barang->Plat}}</p>
                <p class="fs-3 fw-light">Warna :{{$barang->Warna_Motor}}</p>
            </div>
            <form action="" method="post">

            </form>
            <a href="{{url()->current()."/barang/$barang->ID_Barang/konfirmasi"}}">Sewa</a>
        </div>
    </div>
</div>

@endsection
