<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Registrasi extends Model
{
    protected $table = 'registrasi';
    protected $primaryKey = 'noReg';
    public $timestamps = false;

    protected $fillable = ['tanggal', 'nim'];
    
    public function mahasiswa()
    {
        return $this->belongsTo(Mahasiswa::class, 'nim', 'nim');
    }

    public function krskhs()
    {
        return $this->hasMany(Krskhs::class, 'noReg');
    }
}
