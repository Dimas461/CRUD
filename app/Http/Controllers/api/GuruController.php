<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Http\Resources\GuruResource;
use App\Models\GuruModel;
use Illuminate\Http\Request;

class GuruController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        
      $guru = GuruModel::all();
      $data = GuruResource::collection($guru);
      return response()->json([
        'data' => GuruResource::collection($guru)
      ]);
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama'      => 'required|min:3|max:15|unique:guru,nama',
            'id_kelas'  => 'required',
            'alamat'    => 'required'
            ]);

            $guru =Gurumodel::insert([
                'nama'      => $request->nama,
                'id_kelas'  => $request->id_kelas,
                'alamat'    => $request->alamat,
            ]);
            return response()->json([
                'massage'   => 'Guru created succesfully'
                ],201 );
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $guru = GuruModel::find($id);
        return response()->json([
            'data' => [
                'nama'      => $guru->nama,
                'id_kelas'  => $guru->id_kelas,
                'alamat'    => $guru->alamat,
                'kelas'     => $guru->nama_kelas
            ]
            ]);
        
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'nama'      => 'required|min:3|max:15',
            'id_kelas'  => 'required',
            'alamat'    => 'required'
            ]);


        $guru = GuruModel::find($id);
        $guru ->nama = $request->nama;
        $guru ->id_kelas = $request->id_kelas;
        $guru ->alamat = $request->alamat;
        $guru -> save();

        return response()->json([
            'massage' =>'Guru Updated Succesfuly',
            'data'=> ($guru)
            ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $guru = GuruModel::find($id);
        if ($guru) {
        $guru-> delete();
        return response()->json([
            'massage'=> 'Guru deleted Succesfuly'
            ]);
        } else {
            return response()->json([
                'massage' => 'Guru Not Found'
                ], 404);
    }
}
}
