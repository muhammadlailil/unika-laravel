<?php

namespace App\Http\Controllers\Backend;

use App\Models\Author;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AdminAuthorController extends Controller
{
    function index(Request $request){
        $listData = Author::paginate(5);
        return view('backend.author.index',[
            'page_title' => 'Author',
            'data' => $listData
        ]);
    }

    function getCreate(Request $request){
        return view('backend.author.create',[
            'page_title' => 'Tambah Author'
        ]);
    }

    function postSave(Request $request){
        $request->validate([
            'nama' => 'required',
            'tempat_lahir' => 'required',
            'nomor_telfon' => 'required',
        ]);
        Author::create($request->only([
            'nama',
            'tempat_lahir',
            'nomor_telfon',
        ]));

        return redirect()->route('admin.author')->with([
            'success' => 'Data berhasil disimpan'
        ]);
    }

    function getEdit(Request $request,$id){
        $find = Author::findOrFail($id);
        return view('backend.author.edit',[
            'page_title' => 'Edit Author',
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
        Author::whereId($request->id)->update($request->only([
            'nama',
            'tempat_lahir',
            'nomor_telfon',
        ]));

        return redirect()->route('admin.author')->with([
            'success' => 'Data berhasil diperbarui'
        ]);
    }

    function getDelete(Request $request,$id){
        Author::findOrFail($id)->delete();
        return redirect()->route('admin.author')->with([
            'success' => 'Data berhasil dihapus'
        ]);
    }
}
