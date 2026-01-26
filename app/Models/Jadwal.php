<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Jadwal extends Model
{
    protected $guarded = ['id'];
    protected $table = 'jadwal';

    public function dosen(){
        return $this->belongsTo(Dosen::class, 'id_dosen');
    }

    public function matakuliah(){
        return $this->belongsTo(Matakuliah::class, 'id_matakuliah');
    }
}
