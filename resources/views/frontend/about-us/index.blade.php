@extends('layout.base')
@section('content')

<div class="container">
    <br>
    <div class="text-center">
        <h1>MEET <small>the</small> TEAM</h1>
        <p>Our description</p>
    </div>
    <div class="row">
        @foreach($list_team as $team)
        <div class="col-sm-3 mb-4">
            <div class="team text-center">
                <img src="{{ $team->profile }}" alt=""
                  style="border-radius: 100%">
                <h4 class="mb-0">{{$team->nama}}</h4>
                <p>{{$team->bio}}</p>
                <a href="{{ route('about-us.detail',[$team->id]) }}" class="btn btn-primary btn-sm">Detail</a>
            </div>
        </div>
        @endforeach
    </div>
</div>


@endsection
