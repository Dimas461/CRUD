<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GuruModel extends Model
{
    use HasFactory;
    protected $table = "guru";
    protected $fillable = ['nama','alamat','id_kelas'];

    public function kelas () {
        return $this->hasOne(KelasModel::class, "id", "id_kelas");
    }
}
