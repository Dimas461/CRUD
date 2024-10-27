<?php

namespace Database\Seeders;

use App\Models\GuruModel;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class guru extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        GuruModel::create([
            'nama'  => 'Guru 1',
            'id_kelas' => 1,
            'alamat' => 'Pati'
        ]);
    }
}
