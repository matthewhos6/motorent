@extends('layout.user.master')
@section('title','Home')
@section('home','active')
@section('content')

<h1>
    Hai , {{ucfirst($user->Username)}}
</h1>

<div style="display:flex ;width: 80%;margin: auto;align-items: center;" >
    <div class="row" id="content">
        @foreach($listbarang as $value)

        <div class="card border border-5 p-3 rounded rounded04" style="width: 18rem; margin-left: 20px; margin-top: 50px;">
            <img width="300px" height="300px" src="{{ asset("photo/".$value->gambar) }}" class="card-img-top">
            <div class="card-body">
                <h4 class="card-title fw-bold">{{$value->Nama_Motor}}, {{$value->Warna_Motor}}</h4>
                <div class="card-text" style="height: 230px;">
                    <p>{{$value->Isi_Silinder}}cc</p>
                    <p>{{$value->Plat}}</p>
                    <h5 class="fw-bold">Harga : Rp <?= number_format($value->Harga_sewa,2,",",".") ?>/ hari</h5>
                </div>
                <a  class="btn btn-primary btn-lg" href="{{url()->current()."/barang/$value->ID_Barang"}}" style="margin: 10px">Detail</a>
                <a  class="btn btn-primary btn-lg" href="{{url()->current()."/barang/$value->ID_Barang/konfirmasi"}}" style="margin: 10px">Sewa</a>
            </div>
        </div>
    @endforeach

    </div>

        @endsection
