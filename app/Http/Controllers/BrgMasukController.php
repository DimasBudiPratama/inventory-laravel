<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Barang;
use App\Models\Kategori;
use App\Models\BrgMasuk;
use DB;

date_default_timezone_set('Asia/Jakarta');

class BrgMasukController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $brg_masuk     = BrgMasuk::join('barang', 'barang.id', '=', 'brg_masuk.id_barang')
            ->select('brg_masuk.*', 'barang.satuan', 'barang.deskripsi', 'barang.nama_barang', 'barang.satuan')
            ->get();
        $barang   = Barang::all();
        return view('user.brg_masuk.v_brgmasuk', compact('brg_masuk', 'barang'));
    }
    public function create()
    {
        $barang   = Barang::all();

        $q = DB::table('brg_masuk')->select(DB::raw('MAX(RIGHT(no_brg_masuk,4)) as kode'));
        $kd = "";
        if ($q->count() > 0) {
            foreach ($q->get() as $k) {
                $tmp = ((int)$k->kode) + 1;
                $kd  = sprintf("%04s", $tmp);
            }
        } else {
            $kd = "0001";
        }

        return view('user.brg_masuk.add', compact('barang', 'kd'));
    }

    public function ajax(Request $request)
    {
        $id_barang['id_barang'] = $request->id_barang;
        // $masuk     = BrgMasuk::join('barang','barang.id', '=' ,'brg_masuk.id_barang')
        //                 ->join('kategori','kategori.id','=','barang.id_kategori')
        //                 ->select('brg_masuk.*','kategori.nama_kategori','barang.deskripsi','barang.nama_barang')
        //                 ->get();
        $ajax_barang            = Barang::where('id', $id_barang)->get();

        return view('user.brg_masuk.ajax', compact('ajax_barang'));
    }

    public function store(Request $request)
    {
        BrgMasuk::create([
            'no_brg_masuk'      => $request->no_brg_masuk,
            'id_barang'         => $request->id_barang,
            'tgl_masuk'         => $request->tgl_masuk,
            'jml_barang_masuk'  => $request->jml_barang_masuk,
            'created_at'        => date('Y-m-d H:i:s'),
            'updated_at'        => date('Y-m-d H:i:s'),
        ]);

        $barang = Barang::find($request->id_barang);

        $barang->stok    += $request->jml_barang_masuk;
        $barang->save();

        // Alert::success('Ditambah','Data Berhasil Ditambah');
        return redirect('/brg_masuk')->with('success', 'Data Berhasil Disimpan');
    }
}
