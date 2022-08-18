<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
// Use Alert;

date_default_timezone_set('Asia/Jakarta');

class UserController extends Controller
{
    
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $user = User::all();
        return view('admin.master.v_user', compact('user'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        User::create([
            'name'      => $request->name,
            'email'     => $request->email,
            'password'  => Hash::make($request->password),
            'level'     => $request->level,
            'created_at'=> date('Y-m-d H:i:s'),
            'updated_at'=> date('Y-m-d H:i:s'),
        ]);
        // Alert::success('Ditambah','Data Berhasil Ditambah');
        return redirect('/user')->with('success','Data Berhasil Disimpan');
    }

    public function update(Request $request, $id)
    {
        $user = User::find($id);

        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->level = $request->level;
        $user->updated_at = date('Y-m-d H:i:s');

        $user->save();
        // Alert::success('Diedit','Data Berhasil Diedit');
        return redirect('/user')->with('success','Data Berhasil Diedit');
    }

    public function destroy($id)
    {
       $user = User::find($id);

       $user->delete();
    //    Alert::success('Dihapus','Data Berhasil Dihapus');
       return redirect('/user')->with('success','Data Berhasil Dihapus');
    }
}
