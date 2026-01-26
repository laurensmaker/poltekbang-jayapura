<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Matakuliah extends Model
{
    protected $table = 'matakuliah';
    protected $guarded = ['id'];

    public function jadwal(){
        return $this->hasMany(Jadwal::class, 'id_matakuliah');
    }
}
