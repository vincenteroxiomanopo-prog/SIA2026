<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Dosen extends Model
{
    protected $table = 'dosen';
    protected $primaryKey = 'nik';
    public $incrementing = false;
    protected $keyType = 'string';
    public $timestamps = false;

    protected $fillable = ['nik', 'namaDosen'];

    public function jadwal()
    {
        return $this->hasMany(Jadwal::class, 'nik');
    }
}
