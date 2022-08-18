<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Barang;
use App\Models\User;
use App\Models\Kategori;
use App\Models\BrgKeluar;
use DB;

date_default_timezone_set('Asia/Jakarta');

class BrgKeluarController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $brg_keluar     = BrgKeluar::join('barang', 'barang.id', '=', 'brg_keluar.id_barang')->join('users', 'users.id', '=', 'brg_keluar.id_user')
            ->select('brg_keluar.*', 'barang.satuan', 'barang.deskripsi', 'barang.nama_barang', 'barang.satuan', 'users.name')
            ->get();
        $barang   = Barang::all();
        return view('user.brg_keluar.v_brgkeluar', compact('brg_keluar', 'barang'));
    }
    public function create()
    {
        $barang   = Barang::all();

        $q = DB::table('brg_keluar')->select(DB::raw('MAX(RIGHT(no_brg_keluar,4)) as kode'));
        $kd = "";
        if ($q->count() > 0) {
            foreach ($q->get() as $k) {
                $tmp = ((int)$k->kode) + 1;
                $kd  = sprintf("%04s", $tmp);
            }
        } else {
            $kd = "0001";
        }
        return view('user.brg_keluar.add', compact('barang', 'kd'));
    }

    public function ajax(Request $request)
    {
        $id_barang['id_barang'] = $request->id_barang;
        $ajax_barang            = Barang::where('id', $id_barang)->get();

        return view('user.brg_keluar.ajax', compact('ajax_barang'));
    }

    public function store(Request $request)
    {
        $barang = Barang::find($request->id_barang);

        if ($barang->stok < $request->jml_barang_keluar) {
            return redirect('/brg_keluar')->with('error', 'Jumlah Barang Melebihi Stok');
        } else {
            BrgKeluar::create([
                'no_brg_keluar'      => $request->no_brg_keluar,
                'id_barang'         => $request->id_barang,
                'id_user'            => auth()->id(),
                'tgl_keluar'         => $request->tgl_keluar,
                'jml_barang_keluar'  => $request->jml_barang_keluar,
                'created_at'        => date('Y-m-d H:i:s'),
                'updated_at'        => date('Y-m-d H:i:s'),
            ]);
            $barang->stok    -= $request->jml_barang_keluar;
            $barang->save();

            // Alert::success('Ditambah','Data Berhasil Ditambah');
            return redirect('/brg_keluar')->with('success', 'Data Berhasil Disimpan');
        }
    }
}
