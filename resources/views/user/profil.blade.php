@extends('layout.user.master')
@section('title','Home')
@section('content')
<div style="display:flex;justify-content: center;align-items: center;">
    <div class="container ps-5 pe-5 pt-3 pb-2" style="border-radius:15px;background-color: rgb(200, 223, 255); width:580px;height:580px;box-shadow: 1px 2px 8px rgba(0, 0, 0, 0.65);margin: 2rem auto 2rem auto;">
        <center class="mt-3"><h3>Your Profile</h3></center>
        <div class="row mt-5">
            <div class="col-5">
                <label class="mt-4" style="font-size: 20px; font-family:'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;">Full Name</label>
            </div>
            <div class="col-1" style="text-align: right">
                <label class="mt-4" style="font-size: 20px; font-family:'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;">:</label>
            </div>
            <div class="col-5">
                <label class="mt-4" style="font-size: 20px; font-family:'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;">{{$user->fullname}}</label>
            </div>
        </div>
        <div class="row">
            <div class="col-5">
                <label class="mt-4" style="font-size: 20px; font-family:'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;">Username</label>
            </div>
            <div class="col-1" style="text-align: right">
                <label class="mt-4" style="font-size: 20px; font-family:'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;">:</label>
            </div>
            <div class="col-5">
                <label class="mt-4" style="font-size: 20px; font-family:'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;">{{$user->Username}}</label>
            </div>
        </div>
        <div class="row">
            <div class="col-5">
                <label class="mt-4" style="font-size: 20px; font-family:'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;">Email</label>
            </div>
            <div class="col-1" style="text-align: right">
                <label class="mt-4" style="font-size: 20px; font-family:'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;">:</label>
            </div>
            <div class="col-5">
                <label class="mt-4" style="font-size: 20px; font-family:'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;">{{$user->Email}}</label>
            </div>
        </div>
        <div class="row">
            <div class="col-5">
                <label class="mt-4" style="font-size: 20px; font-family:'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;">NIK</label>
            </div>
            <div class="col-1" style="text-align: right">
                <label class="mt-4" style="font-size: 20px; font-family:'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;">:</label>
            </div>
            <div class="col-5">
                <label class="mt-4" style="font-size: 20px; font-family:'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;">{{$user->NIK}}</label>
            </div>
        </div>
        <div class="row">
            <div class="col-5">
                <label class="mt-4" style="font-size: 20px; font-family:'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;">Phone Number</label>
            </div>
            <div class="col-1" style="text-align: right">
                <label class="mt-4" style="font-size: 20px; font-family:'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;">:</label>
            </div>
            <div class="col-5">
                <label class="mt-4" style="font-size: 20px; font-family:'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;">{{$user->Telepon}}</label>
            </div>
        </div>
        <div class="row">
            <div class="col-5">
                <label class="mt-4" style="font-size: 20px; font-family:'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;">Gender</label>
            </div>
            <div class="col-1" style="text-align: right">
                <label class="mt-4" style="font-size: 20px; font-family:'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;">:</label>
            </div>
            <div class="col-5">
                @if ($user->gender == "P")
                    <label class="mt-4" style="font-size: 20px; font-family:'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;">Female</label>
                @else
                    <label class="mt-4" style="font-size: 20px; font-family:'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;">Male</label>
                @endif
            </div>
        </div>
    </div>
@endsection