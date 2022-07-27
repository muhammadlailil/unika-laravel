@extends('backend.layout.base')
@section('content')

    <div class="card">
        <form action="{{route('admin.author-update')}}" method="post">
            @csrf
            <input type="hidden" name="id" value="{{$data->id}}">
            <div class="card-header">
                <h3 class="card-title">
                    Edit Author Baru
                </h3>
            </div>
            <div class="card-body">
                <div class="form-group">
                    <label for="">Nama</label>
                    <input type="text" class="form-control" name="nama" value="{{$data->nama}}">
                </div>
                <div class="form-group">
                    <label for="">Tempat Lahir</label>
                    <input type="text" class="form-control" name="tempat_lahir" value="{{$data->tempat_lahir}}">
                </div>
                <div class="form-group">
                    <label for="">Nomor Telefon</label>
                    <input type="number" class="form-control" name="nomor_telfon" value="{{$data->nomor_telfon}}">
                </div>
            </div>
            <div class="card-footer">
                <a href="{{route('admin.author')}}" class="btn btn-secondary">
                    Kembali
                </a>
                <button type="submit" class="btn btn-primary">
                    Simpan
                </button>
            </div>
        </form>
    </div>

@endsection