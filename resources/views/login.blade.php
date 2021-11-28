@extends('template')
@section('title')
Login
@endsection
@section('css')
<style>
.cons-form {
    border: 1px solid #d7d7d7;
    padding: 2rem;
    border-radius: 0.5rem;
}

#btnLogin {
    width: 100%;
    padding: 1rem;
}
</style>

@endsection
@section('content')

<div class="col-md-6 cons-form" >
    <form action="{{route("login.send")}}" method="POST">
        @csrf
        @if (session("error"))
            <div class="alert alert-danger text-center" role="alert">
                {{session("error")}}
            </div>
        @endif
        @if (session("success"))
            <div class="alert alert-success" role="alert">
                {{session("success")}}
            </div>
        @endif
        <div class="form-group">
          <label for="exampleInputEmail1">Email</label>
          <input required type="email" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
        </div>
        <div class="form-group">
          <label for="exampleInputPassword1">Password</label>
          <input required type="password" name="password" class="form-control" id="exampleInputPassword1">
        </div>
        <button type="submit" class="btn btn-primary" id="btnLogin">Login</button>
        <div class="form-group text-center m-2">
            <span class="">Belum punya akun silahkan <a href="{{route('register')}}">Daftar</a></span>
        </div>
    </form>
</div>
@endsection

@section('js')

@endsection
