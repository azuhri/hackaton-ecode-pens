@extends('template-backend')

@section('content')
<div class="col-md-12 cons-form" >
    <form action="{{route("add.send")}}" method="POST">
        @csrf
        @if (session("error"))
            <div class="alert alert-danger text-center" role="alert">
                {{session("error")}}
            </div>
        @endif
        @if (session("success"))
        <div class="alert alert-success text-center" role="alert">
            {{session("success")}}
        </div>
        @endif
        <div class="form-group">
          <label for="exampleInputEmail1">Email</label>
          <input type="email" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
        </div>
        <div class="form-group">
          <label for="exampleInputPassword1">No. Hp</label>
          <input type="number" name="no_hp" class="form-control" id="exampleInputPassword1">
        </div>
        <div class="form-group">
            <label for="exampleInputPassword1">Password</label>
            <input type="password" name="password" name="password2" class="form-control" id="exampleInputPassword1">
        </div>
        <div class="form-group">
            <label for="exampleInputPassword1">Password Konfirmasi</label>
            <input type="password" name="password_confirm" class="form-control" id="exampleInputPassword1">
        </div>
        <button type="submit" class="btn btn-primary" id="btnLogin">Daftar</button>
        <div class="form-group text-center m-2">
            <span class="">Sudah punya akun silahkan <a href="{{route('login')}}">Masuk</a></span>
        </div>
    </form>
</div>
@endsection
