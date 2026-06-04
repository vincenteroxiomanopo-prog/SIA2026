<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Krskhs extends Model
{
    protected $table = 'krskhs';
    protected $primaryKey = 'idKrs';
    public $timestamps = false;

    protected $fillable = ['noReg','jadwalId','nilai'];

    public function registrasi()
    {
        return $this->belongsTo(Registrasi::class, 'noReg');
    }

    public function jadwal()
    {
        return $this->belongsTo(Jadwal::class, 'jadwalId');
    }
}
