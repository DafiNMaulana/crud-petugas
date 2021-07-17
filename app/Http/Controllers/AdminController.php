<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Petugas;

class AdminController extends Controller
{
    public function index () {
        //$data = Petugas::orderBy('created_at', 'DESC')->get();
        $data = Petugas::paginate(10);
    	return view("index")->with(compact('data'));
    }

    
    public function create() {
    	return view("input-data");
    }


    public function store(Request $request) {

        $messages = [
            'required' => ':attribute nya tolong diisi ya kak..',
            'min' => 'tolong masukan :attribute dengan benar minimal :min karakter',
            'max' => 'masukin :attribute nya jangan kebanyakan, maksimal :max nomor',
            'unique' => 'seprtinya :attribute sudah terdaftar, tolong masukan :attribute yang baru'
        ];

        $this->validate($request, [
            'nama_petugas' => 'required|min:2',
            'no_hp' => 'required|max:12|min:12',
            'alamat_petugas' => 'required|min:5'
        ], $messages);

        $data = new Petugas();

        $data::create([
            'nama_petugas' => $request->nama_petugas,
            'no_hp' => $request->no_hp,
            'alamat_petugas' => $request->alamat_petugas,
        ]);

        return redirect("lte")->withSuccess('Selamat!, Data berhasil di tambahkan'); 

    }

    // rute masuk halaman edit
    public function edit($id) {
        $pet = Petugas::findorfail($id);
        return view('ubah-data', compact('pet'));
    }

    // program edit data / update data
    public function update(Request $request, $id) {

        // validasi
        $messages = [
            'required' => ':attribute nya tolong diisi ya kak..',
            'min' => 'tolong masukan :attribute dengan benar minimal :min karakter',
            'max' => 'masukin :attribute nya jangan kebanyakan, maksimal :max nomor',
            'unique' => 'seprtinya :attribute sudah terdaftar, tolong masukan :attribute yang baru'
        ];

        $this->validate($request, [
            'nama_petugas' => 'required|min:2',
            'no_hp' => 'required|max:12|min:12',
            'alamat_petugas' => 'required|min:5'
        ], $messages);
        // akhir validasi

        $pet = Petugas::findorfail($id);
        $pet->update($request->all()); // update semua data

        return redirect("lte")->withSuccess('Selamat! Data berhasil di ubah'); // notifikasi dan kembali ke lte
    }

    // program hapus data
    public function destroy(Request $request, $id) {
        $pet = Petugas::findorfail($id);
        $pet->delete(); 
        return back()->withWarning('Selamat! Data berhasil di hapus');
    }

}
