@extends('template-backend')
@section('css')

@endsection
@section('content')
<div class="col-md-12">
    @if (session("error"))
    <div class="alert alert-danger text-center" role="alert">
        {{session("error")}}
    </div>
@endif
@if (session("success"))
    <div class="alert alert-success text-white" role="alert">
        {{session("success")}}
    </div>
@endif
</div>
<div class="col-md-12">
    <table border="1" class="w-100 table table-striped table-white">
        <tr>
            <th class="text-center text-info">No</th>
            <th class="text-center text-info">Email</th>
            <th class="text-center text-info">Phonenumber</th>
            <th class="text-center text-info">Aksi</th>
        </tr>
        @php
            $no = 1;
        @endphp
            @foreach ($users as $user)
        <tr>
                @php
                    $wa = "+".$user->phonenumber;
                    $wa = str_replace("+0","+62",$wa);
                @endphp
                <td class="text-center">{{$no++}}</td>
                <td class="text-center">{{$user->email}}</td>
                <td class="text-center">{{$user->phonenumber}}</td>
                <td class="text-center">
                    <a href="{{route("delete", $user->id)}}" class="btn btn-danger">
                        <svg viewBox="0 0 24 24" width="24" height="24" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round" class="css-i6dzq1"><polyline points="3 6 5 6 21 6"></polyline><path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path><line x1="10" y1="11" x2="10" y2="17"></line><line x1="14" y1="11" x2="14" y2="17"></line></svg>
                    </a>
                    <a href="https://wa.me/{{$wa}}" target="_blank" class="btn btn-info">
                        <svg viewBox="0 0 24 24" width="24" height="24" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round" class="css-i6dzq1"><path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z"></path></svg>
                    </a>
                </td>
            </tr>
            @endforeach
    </table>
    <div class="pt-2">
        {{$users->links()}}
    </div>
</div>
@endsection
