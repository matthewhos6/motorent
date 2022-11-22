@extends('layout.logreg')
@section('title','Register')
@section('judul','Register')
@section('content')
<form action="{{url('/register')}}" method="post">
    @csrf
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
