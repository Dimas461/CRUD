<?php

namespace App\Http\Controllers;

use App\Models\SiswaModel;
use Illuminate\Http\Request;

class SiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        return "saya menampilkan data";
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return "saya membuat data";
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        return "saya melakukan insert data";
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
        return "saya menampilkan detail data";
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
        return "saya menampilkan form edit data";
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        return "saya melakukan simpan data";
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        return "menghapus data";
    }


    public function api(request $request) {
        
        $siswa = SiswaModel::all();
        
        return response()->json([
            'massage' => 'succes',
            'data' => $siswa
        ]);
    }
}
