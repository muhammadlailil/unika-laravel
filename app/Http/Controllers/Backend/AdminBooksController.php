<?php

namespace App\Http\Controllers\Backend;

use App\Models\Books;
use App\Models\Author;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class AdminBooksController extends Controller
{
    
    function index(Request $request){
        $listData = Books::with('author')->paginate(5);
        return view('backend.books.index',[
            'page_title' => 'Buku',
            'data' => $listData
        ]);
    }

    function getCreate(Request $request){
        return view('backend.books.create',[
            'page_title' => 'Tambah Buku',
            'list_author' => Author::all()
        ]);
    }

    function postSave(Request $request){
        $request->validate([
            'judul' => 'required',
            'deskripsi' => 'required',
            'gambar' => 'required|file',
            'author_id' => 'required',
        ]);

        $fileUpload = Storage::put('uploads/books', $request->file('gambar'));
        $data = $request->only([
            'judul',
            'deskripsi',
            'author_id',
        ]);
        Books::create(array_merge($data, [
            'gambar' => $fileUpload
        ]));

        return redirect()->route('admin.books')->with([
            'success' => 'Data berhasil disimpan'
        ]);
    }

    function getEdit(Request $request,$id){
        $find = Books::findOrFail($id);
        return view('backend.books.edit',[
            'page_title' => 'Edit Buku',
            'data' => $find
        ]);
    }

    function postUpdate(Request $request){
        $request->validate([
            'id' => 'required',
            'nama' => 'required',
            'tempat_lahir' => 'required',
            'nomor_telfon' => 'required',
        ]);
        Books::whereId($request->id)->update($request->only([
            'nama',
            'tempat_lahir',
            'nomor_telfon',
        ]));

        return redirect()->route('admin.books')->with([
            'success' => 'Data berhasil diperbarui'
        ]);
    }

    function getDelete(Request $request,$id){
        Books::findOrFail($id)->delete();
        return redirect()->route('admin.books')->with([
            'success' => 'Data berhasil dihapus'
        ]);
    }

}
