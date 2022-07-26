@extends('layout.base')
@section('content')

<div class="container">
    <br>
    <div class="text-center">
        <h1>DETAIL <small>the</small> TEAM</h1>
        <p>Our description</p>
    </div>
    <div class="d-flex justify-content-center">
        
            <div class="team text-center">
                <img src="{{ $data->profile }}" alt=""
                  style="border-radius: 100%">
                <h4 class="mb-0">{{$data->nama}}</h4>
                <p>{{$data->bio}}</p>
                <a href="{{ route('about-us',[
                    'nama'=> $data->nama,
                    'hobi' => $data->bio,
                ]) }}"
                    class="btn btn-primary btn-sm">Back</a>
                    <br><br>
            </div>
        
    </div>
</div>

@endsection