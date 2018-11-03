<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Siswa;

class SiswaController extends Controller
{
    //
    public function index() {
        // Tampil data
        $data = Siswa::all();
        return view('siswa.index', compact('data'));
    }
    
    public function create() {
		//
		return view('siswa.create');
    }
    
    public function store(Request $request) {
		//
		$data = new Siswa();
		$data->nama = $request->nama;
		$data->alamat = $request->alamat;
		$data->email = $request->email;
		$data->save();
		return redirect()->route('siswa.index');
    }
}
