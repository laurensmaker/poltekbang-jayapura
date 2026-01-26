<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Dosen extends Model
{
    protected $table = 'dosen';
    protected $guarded = ['id'];

    public function jadwal(){
        return $this->hasMany(Jadwal::class, 'id_dosen');
    }
}
