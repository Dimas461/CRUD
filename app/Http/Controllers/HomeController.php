<?php

namespace App\Http\Controllers;

use App\Models\GuruModel;
use App\Models\KelasModel;
use App\Models\SiswaModel;
use Illuminate\Contracts\Session\Session;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    //
    public function home() {

        $data = array(
            'siswas' => SiswaModel::all(),
            'gurus'  => GuruModel::all()
        );

        return view('home', $data);
    }

    // untuk menambah data
    public function insert(Request $request) {

        $data = array(
            'kelass' =>KelasModel::all(),
            'sukses' => ''
        );
        if($request->submit != "") {

            $validated = $request->validate([
                'nama' => 'required',
                'alamat' => 'required'
            ]);
            if($validated){
                SiswaModel::insert([
                    'nama' => $request->nama,
                    'alamat' => $request->alamat,
                    'id_kelas' => $request->id_kelas
                ]);
                $data['sukses'] = "Data berhasil ditambah";
            }
        }
        return view('form', $data);
    }


    public function update(Request $request) {

        $siswa = SiswaModel::find($request->id);

        $data = array(
            'kelass' =>KelasModel::all(),
            'siswa'  => $siswa,
            'sukses' => ''
        );
        if($request->submit != "") {

            $validated = $request->validate([
                'nama' => 'required',
                'alamat' => 'required'
            ]);
            if($validated){
                $siswa->nama = $request->nama;
                $siswa->alamat = $request->alamat;
                $siswa->save();

                $data['sukses'] = "Data berhasil disimpan";
            }
        }
        return view('form', $data);
    }

    public function delete(Request $request){

        $siswa = SiswaModel::find($request->id);
        $siswa->delete();
        return redirect('/');
    }

    public function dashboard() {
        return "Halo, saya halaman dashboard <a href='/'>Home</a>";
    }
}
