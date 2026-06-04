<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Jadwal extends Model
{
    protected $table = 'jadwal';
    protected $primaryKey = 'jadwalId';
    public $timestamps = false;

    protected $fillable = [
        'hari','waktu','kodeMk','grup','nik','ruang'
    ];

    public function dosen()
    {
        return $this->belongsTo(Dosen::class, 'nik');
    }

    public function matakuliah()
    {
        return $this->belongsTo(Matakuliah::class, 'kodeMk');
    }
}
