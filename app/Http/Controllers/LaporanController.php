<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Barang;
use App\Models\BrgKeluar;
use App\Models\BrgMasuk;
use App\Models\User;

class LaporanController extends Controller
{
    public function lap_barang()
    {
        $barang   = Barang::all();
        return view('admin.laporan.lap_barang', compact('barang'));
    }

    public function cetak_barang()
    {
        $barang   = Barang::all();
        return view('admin.laporan.cetak_barang', compact('barang'));
    }

    public function lap_barang_masuk()
    {
        $brg_masuk     = BrgMasuk::join('barang', 'barang.id', '=', 'brg_masuk.id_barang')
            ->select('brg_masuk.*', 'barang.satuan', 'barang.deskripsi', 'barang.nama_barang')
            ->get();
        return view('admin.laporan.lap_barang_masuk', compact('brg_masuk'));
    }

    public function cetak_barang_masuk(Request $request)
    {
        $tgl_mulai = $request->tgl_mulai;
        $tgl_selesai = $request->tgl_selesai;

        if ($tgl_mulai and $tgl_selesai) {
            $brg_masuk = BrgMasuk::join('barang', 'barang.id', '=', 'brg_masuk.id_barang')
                ->select('brg_masuk.*', 'barang.satuan', 'barang.deskripsi', 'barang.nama_barang')
                ->whereBetween('brg_masuk.tgl_masuk', [$tgl_mulai, $tgl_selesai])
                ->get();

            // $sum_total = BrgMasuk::whereBetween('tgl_masuk',[$tgl_mulai,$tgl_selesai])
            //             ->sum('total');

        } else {
            $brg_masuk = BrgMasuk::join('barang', 'barang.id', '=', 'brg_masuk.id_barang')
                ->select('brg_masuk.*', 'barang.satuan', 'barang.deskripsi', 'barang.nama_barang')
                ->get();
        }
        return view('admin.laporan.cetak_barang_masuk', compact('brg_masuk', 'tgl_mulai', 'tgl_selesai'));
    }

    public function lap_barang_keluar()
    {
        $brg_keluar     = BrgKeluar::join('barang', 'barang.id', '=', 'brg_keluar.id_barang')->join('users', 'users.id', '=', 'brg_keluar.id_user')
            ->select('brg_keluar.*', 'barang.satuan', 'barang.deskripsi', 'barang.nama_barang', 'barang.satuan', 'users.name')
            ->get();
        return view('admin.laporan.lap_barang_keluar', compact('brg_keluar'));
    }

    public function cetak_barang_keluar(Request $request)
    {
        $tgl_mulai = $request->tgl_mulai;
        $tgl_selesai = $request->tgl_selesai;

        if ($tgl_mulai and $tgl_selesai) {
            $brg_keluar = BrgKeluar::join('barang', 'barang.id', '=', 'brg_keluar.id_barang')->join('users', 'users.id', '=', 'brg_keluar.id_user')
                ->select('brg_keluar.*', 'barang.satuan', 'barang.deskripsi', 'barang.nama_barang', 'barang.satuan', 'users.name')
                ->whereBetween('brg_keluar.tgl_keluar', [$tgl_mulai, $tgl_selesai])
                ->get();

            // $sum_total = BrgMasuk::whereBetween('tgl_masuk',[$tgl_mulai,$tgl_selesai])
            //             ->sum('total');

        } else {
            $brg_keluar     = BrgKeluar::join('barang', 'barang.id', '=', 'brg_keluar.id_barang')->join('users', 'users.id', '=', 'brg_keluar.id_user')
                ->select('brg_keluar.*', 'barang.satuan', 'barang.deskripsi', 'barang.nama_barang', 'users.name')
                ->get();
        }
        return view('admin.laporan.cetak_barang_keluar', compact('brg_keluar', 'tgl_mulai', 'tgl_selesai'));
    }
}
