<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Barang;
use App\Models\Kategori;

date_default_timezone_set('Asia/Jakarta');

class BarangController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $barang   = Barang::all();
        return view('admin.master.v_barang', compact('barang'));
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        Barang::create([
            'nama_barang'      => $request->nama_barang,
            'deskripsi'        => $request->deskripsi,
            'stok'             => $request->stok,
            'satuan'           => $request->satuan,
            'created_at'       => date('Y-m-d H:i:s'),
            'updated_at'       => date('Y-m-d H:i:s'),
        ]);
        // Alert::success('Ditambah','Data Berhasil Ditambah');
        return redirect('/barang')->with('success', 'Data Berhasil Disimpan');
    }

    public function update(Request $request, $id)
    {
        $barang = Barang::find($id);

        $barang->nama_barang    = $request->nama_barang;
        $barang->deskripsi      = $request->deskripsi;
        $barang->stok           = $request->stok;
        $barang->satuan         = $request->satuan;
        $barang->updated_at     = date('Y-m-d H:i:s');

        $barang->save();
        // Alert::success('Diedit','Data Berhasil Diedit');
        return redirect('/barang')->with('success', 'Data Berhasil Diedit');
    }

    public function destroy($id)
    {
        $barang = Barang::find($id);

        $barang->delete();
        //    Alert::success('Dihapus','Data Berhasil Dihapus');
        return redirect('/barang')->with('success', 'Data Berhasil Dihapus');
    }
}
