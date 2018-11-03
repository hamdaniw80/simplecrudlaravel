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

    public function edit($id) {
        // Form Edit Siswa
        $data = Siswa::where('id', $id)->get();
        return view('siswa.edit', compact('data'));
    }

    public function update(Request $request, $id) {
        // Simpan Edit Siswa
        $data = Siswa::where('id', $id)->first();
        $data->nama = $request->nama;
        $data->alamat = $request->alamat;
        $data->email = $request->email;
        $data->save();
        return redirect()->route('siswa.index')->with('alert-success', 'Data berhasil diubah!');
    }

    public function show($id) {
        // Detail Siswa
        $data = Siswa::find($id);
        return view('siswa.lihat', ['data' => $data]);
    }

    public function destroy($id) {
        // delete
        $data = Siswa::where('id', $id)->first();
        $data->delete();
        return redirect()->route('siswa.index');
    }
}
