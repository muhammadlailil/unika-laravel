@extends('backend.layout.base')
@section('content')

    <div class="card">
        <div class="card-header">
            <h3 class="card-title">
                List Data Author
            </h3>
            <div class="card-tools">
                <a href="{{route('admin.author-create')}}" class="btn-primary btn">
                    Tambah Data
                </a>
            </div>
        </div>
        <div class="card-body" style="padding: 0px">
            <table class="table table-striped">
                <tr>
                    <th>Nama</th>
                    <th>Tempat Lahir</th>
                    <th>Nomor Telfon</th>
                    <th>Aksi</th>
                </tr>
                @foreach($data as $row)
                <tr>
                    <td>{{$row->nama}}</td>
                    <td>{{$row->tempat_lahir}}</td>
                    <td>{{$row->nomor_telfon}}</td>
                    <td>
                        <a href="{{route('admin.author-edit',[$row->id])}}" class="btn btn-primary btn-sm">
                            Edit
                        </a>
                        <a href="javascript:;"
                        onclick="if(confirm('Yakin?')){
                            return window.location.href= '{{route('admin.author-delete',[$row->id])}}'
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