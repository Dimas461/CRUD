<?php

namespace Database\Seeders;

use App\Models\SiswaModel;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class siswa extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        for($i = 2; $i <= 20; $i++){
            SiswaModel::create([
                'nama'  => 'Siswa ' . $i,
                'id_kelas' => 1,
                'alamat' => 'Pati Selatan'
            ]);
        }
    }
}
