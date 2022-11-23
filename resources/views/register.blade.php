@extends('layout.logreg')
@section('title','Register')
@section('judul','Register')
@section('content')
<br>
<form action="{{url('/register')}}" method="post">
    @csrf
    <p class="fs-2">Gender</p>
    <div class="form-check form-check-inline">
        <input class="form-check-input" type="radio" name="gender" value="L">
        <label class="form-check-label" for="inlineRadio1">Laki-Laki</label>
    </div>
    <div class="form-check form-check-inline">
        <input class="form-check-input" type="radio" name="gender" value="P">
        <label class="form-check-label" for="inlineRadio2">Perempuan</label>
    </div>
    <br><br>
    <div class="input-group mb-3">
        <span class="input-group-text" id="basic-addon1">Username</span>
        <input type="text" class="form-control" placeholder="" name="username" value="{{ old('username') }}">
    </div>
    <p style="color: red">{{$errors->first('username')}}</p>
    <div class="input-group mb-3">
        <span class="input-group-text" id="basic-addon1">Fullname</span>
        <input type="text" class="form-control" placeholder="" name="fullname" value="{{ old('fullname') }}">
    </div>
    <p style="color: red">{{$errors->first('fullname')}}</p>
    <div class="input-group mb-3">
        <span class="input-group-text" id="basic-addon1">NIK</span>
        <input type="text" class="form-control" placeholder="optional" name="NIK" value="{{ old('NIK') }}">
    </div>
    <p style="color: red">{{$errors->first('NIK')}}</p>
    <div class="input-group mb-3">
        <span class="input-group-text" id="basic-addon1">Nomor telepon</span>
        <input type="text" class="form-control" placeholder="" name="telepon" value="{{ old('telepon') }}">
    </div>
    <p style="color: red">{{$errors->first('telepon')}}</p>
    <div class="input-group mb-3">
        <span class="input-group-text" id="basic-addon1">Email</span>
        <input type="text" class="form-control" placeholder="" name="email" value="{{ old('email') }}">
    </div>
    <p style="color: red">{{$errors->first('email')}}</p>
    <div class="input-group mb-3">
        <span class="input-group-text" id="basic-addon1">Password</span>
        <input type="text" class="form-control" placeholder="" name="pass">
    </div>
    <p style="color: red">{{$errors->first('pass')}}</p>
    <div class="input-group mb-3">
        <span class="input-group-text" id="basic-addon1">Confirm Password</span>
        <input type="text" class="form-control" placeholder="" name="conf">
    </div>
    <p style="color: red">{{$errors->first('conf')}}</p>
    <br>
    @include('msg')
    <button type="submit" class="btn btn-primary btn-lg">Register</button>
</form>
<br>
<p>Already have an account ? <span><a href="{{url('/login')}}">Login</a></span></p>
@endsection
