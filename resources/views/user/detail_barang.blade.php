@extends('layout.user.master')
@section('title','Detail')
@section('content')

<div class="cont" style="width:50%;margin:auto;">
    {{-- <div class="row">
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
        <div class="col-8 p-3">
            <div class="detail">
                <h1 class="fw-bold">Details</h1>
                <p class="fs-2 fw-light">Tipe : {{$barang->Nama_Motor}}</p>
                <p class="fs-3 fw-light">Harga Sewa : {{number_format($barang->Harga_sewa,2,",",".")}}</p>
                <p class="fs-3 fw-light">Rangka : {{$barang->No_Rangka}}</p>
                <p class="fs-3 fw-light">Plat Nomor :{{$barang->Plat}}</p>
                <p class="fs-3 fw-light">Warna :{{$barang->Warna_Motor}}</p>
            </div>
            <form action="{{url()->current()."/konfirmasi/"}}" method="post">
                <p class="fs-5 fw-light">Mau sewa berapa hari?</p>
                <input type="number" name="" id="hari" style="width: min-content;" min="1"> X {{$barang->Harga_sewa}}
                <p class="fs-1 fw-bold">Total : <span> <p id="total" class="fs-2 fw-bold"></p></span> </p>
                <button type="submit" class="btn btn-primary">Sewa</button>
            </form>
        </div>
    </div> --}}
    <div class="row rounded rounded-5 border border-5 p-3" style="background-color: #DBE2EF;">
        <div class="text-center" style="margin-bottom: 50px;">
            <h1 class="fw-light">Details</h1>
        </div>

        <div class="col">
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
        <div class="col">
            <div class="detail text-center">
                <p class="fs-2 fw-light">Tipe : {{$barang->Nama_Motor}}</p>
                <p class="fs-3 fw-light">Harga Sewa : {{number_format($barang->Harga_sewa,2,",",".")}}</p>
                <p class="fs-3 fw-light">Rangka : {{$barang->No_Rangka}}</p>
                <p class="fs-3 fw-light">Plat Nomor :{{$barang->Plat}}</p>
                <p class="fs-3 fw-light">Warna :{{$barang->Warna_Motor}}</p>
            </div>
        </div>
    </div>
    <br><br>
    <div class="row rounded rounded-5 border border-5 p-3" style="background-color: #DBE2EF;">
        <form action="{{url()->current()}}/konfirmasi" method="">
            <p class="fs-5 fw-light">Mau sewa berapa hari?</p>
            <input type="number" name="" id="hari"  min="1">  X {{$barang->Harga_sewa}}
            <br>
            Total : <p id="total" class="fs-2 fw-bold"></p>
            <input type="hidden" name="harga" id="harga">
            <button type="submit" class="btn btn-primary">Konfirmasi</button>
        </form>
    </div>
</div>
<script src="https://code.jquery.com/jquery-3.6.1.slim.js" integrity="sha256-tXm+sa1uzsbFnbXt8GJqsgi2Tw+m4BLGDof6eUPjbtk=" crossorigin="anonymous"></script>
<script>
    $(document).ready(function(){
        var total = {{$barang->Harga_sewa}};
        $("#hari").on('change',function(){
            total = $("#hari").val() * {{$barang->Harga_sewa}};
            $("#total").text(total);
            $("#harga").val(total);
        });
        $("#total").text(total);
        $("#harga").val(total);
    });
</script>
@endsection
