@extends('layout.user.master')
@section('title','Home')
{{-- @section('profile','active') --}}
@section('content')
@php
    // dd($user); 
@endphp
<div class="container-fluid page-header">
    <h3 class="text-uppercase text-white m-0">Hai , {{$user[0]->Username}}!</h3>
    <h1 class="display-3 text-uppercase text-white mb-3">Find Your Motorcycle</h1>
</div>

<div style="display:flex ;width: 80%;margin: auto;align-items: center;" >
    <div class="row" id="content">
        @foreach($listbarang as $value)

        <div class="card border border-5 p-3 rounded rounded04" style="width: 25rem; margin-left: 20px; margin-top: 50px;">
            @php
            $str = (explode("-",$value->gambar));
            @endphp
            <img width="300px" height="300px" src="{{ asset("photo/".$str[0]."-0.jpg") }}" class="card-img-top">
            <div class="card-body">
                <h4 class="card-title fw-bold">{{$value->Nama_Motor}}, {{$value->Warna_Motor}}</h4>
                <div class="card-text" style="height: 120px;">
                    <p>Isi Silinder : {{$value->Isi_Silinder}}cc</p>
                    <p>Plat Nomor : {{strtoupper($value->Plat)}}</p>
                    <h5 class="fw-bold">Harga : Rp <?= number_format($value->Harga_sewa,2,",",".") ?>/ hari</h5>
                </div>
                <a  class="btn btn-primary btn-lg" href="{{url()->current()."/barang/$value->ID_Barang"}}" style="margin: 10px">Detail</a>
            </div>
        </div>
        @endforeach
    </div>
</div>

        @endsection
