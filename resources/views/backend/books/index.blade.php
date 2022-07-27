@extends('backend.layout.base')
@section('content')

    <div class="card">
        <div class="card-header">
            <h3 class="card-title">
                List Data Buku
            </h3>
            <div class="card-tools">
                <a href="{{route('admin.books-create')}}" class="btn-primary btn">
                    Tambah Data
                </a>
            </div>
        </div>
        <div class="card-body" style="padding: 0px">
            <table class="table table-striped">
                <tr>
                    <th>Gambar</th>
                    <th>Judul</th>
                    <th>Author</th>
                    <th>Deskripsi</th>
                    <th>Aksi</th>
                </tr>
                @foreach($data as $row)
                <tr>
                    <td>
                        <img src="{{asset($row->gambar)}}" height="45" alt="">
                    </td>
                    <td>{{$row->judul}}</td>
                    <td>{{$row->author->nama}}</td>
                    <td>{{$row->deskripsi}}</td>
                    <td>
                        <a href="{{route('admin.books-edit',[$row->id])}}" class="btn btn-primary btn-sm">
                            Edit
                        </a>
                        <a href="javascript:;"
                        onclick="if(confirm('Yakin?')){
                            return window.location.href= '{{route('admin.books-delete',[$row->id])}}'
                        }"
                        class="btn btn-danger btn-sm">Hapus</a>
                    </td>
                </tr>
                @endforeach
            </table>
        </div>
        <div class="card-footer">
            {!! $data->links() !!}
        </div>
    </div>

@endsection