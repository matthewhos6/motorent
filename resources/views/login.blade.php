@extends('layout.logreg')
@section('title','Login')
@section('judul','Login')
@section('content')
<form action="{{url('/login')}}" method="post">
    @csrf
    <div class="input-group mb-3">
        <span class="input-group-text" id="basic-addon1">Username</span>
        <input type="text" class="form-control" placeholder="Username" name="username" value="{{old('username')}}">
    </div>
    <p style="color: red">{{$errors->first('username')}}</p>
    <div class="input-group mb-3">
        <span class="input-group-text" id="basic-addon1">Password</span>
        <input type="password" class="form-control" placeholder="" name="pass">
    </div>
    <p style="color: red">{{$errors->first('pass')}}</p>
    <br>
    @include('msg')
    <button type="submit" class="btn btn-primary btn-lg">Login</button>
</form>
<br>
<p>Doesn't have an account ? <span><a href="{{url('/register')}}">Register</a></span></p>
@endsection
