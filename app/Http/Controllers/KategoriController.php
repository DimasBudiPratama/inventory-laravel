<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kategori;

date_default_timezone_set('Asia/Jakarta');

class KategoriController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $kategori = Kategori::all();
        return view('admin.master.v_kategori', compact('kategori'));
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        Kategori::create([
            'nama_kategori'      => $request->nama_kategori,
            'created_at'=> date('Y-m-d H:i:s'),
            'updated_at'=> date('Y-m-d H:i:s'),
        ]);
        // Alert::success('Ditambah','Data Berhasil Ditambah');
        return redirect('/kategori')->with('success','Data Berhasil Disimpan');
    }

    public function update(Request $request, $id)
    {
        $kategori = Kategori::find($id);

        $kategori->nama_kategori = $request->nama_kategori;
        $kategori->updated_at = date('Y-m-d H:i:s');

        $kategori->save();
        // Alert::success('Diedit','Data Berhasil Diedit');
        return redirect('/kategori')->with('success','Data Berhasil Diedit');
    }

    public function destroy($id)
    {
        $kategori = Kategori::find($id);

        $kategori->delete();
     //    Alert::success('Dihapus','Data Berhasil Dihapus');
        return redirect('/kategori')->with('success','Data Berhasil Dihapus');
    }
}
