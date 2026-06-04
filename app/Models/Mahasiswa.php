<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Mahasiswa extends Model
{
    protected $table = 'mahasiswa';
    protected $primaryKey = 'nim';
    public $incrementing = false;
    protected $keyType = 'string';
    public $timestamps = false;

    protected $fillable = ['nim', 'nama', 'kota'];

    public function registrasi()
    {
        return $this->hasMany(Registrasi::class, 'nim');
    }
}
