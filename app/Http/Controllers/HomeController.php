<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Barang;
use App\Models\User;
use App\Models\BrgMasuk;
use App\Models\BrgKeluar;
use DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    
    public function index()
    {
        $user   = User::count();
        $barang = Barang::count();

        $date = date('Y-m-d');

        $brg_masuk_today  = BrgMasuk::where('tgl_masuk', $date)->count();
        $brg_keluar_today = BrgKeluar::where('tgl_keluar','=', $date)->count();
        return view('v_home',compact('user','barang','brg_masuk_today','brg_keluar_today'));
    }
}
