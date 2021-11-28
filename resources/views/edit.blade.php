@extends('template-backend')

@section('content')
<div class="col-md-12 cons-form" >
    <form action="{{route("edit.send",$findUser->id)}}" method="POST">
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
          <input type="email" name="email" value="{{$findUser->email}}" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
        </div>
        <div class="form-group">
          <label for="exampleInputPassword1">No. Hp</label>
          <input type="number" name="no_hp" value="{{$findUser->phonenumber}}" class="form-control" id="exampleInputPassword1">
        </div>
        <button type="submit" class="btn btn-primary" id="btnLogin">Daftar</button>
    </form>
</div>
@endsection
