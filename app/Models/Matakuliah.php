<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Matakuliah extends Model
{
    protected $table = 'matakuliah';
    protected $primaryKey = 'kodeMk';
    public $incrementing = false;
    protected $keyType = 'string';
    public $timestamps = false;

    protected $fillable = ['kodeMk', 'namaMk', 'sks'];

    public function jadwal()
    {
        return $this->hasMany(Jadwal::class, 'kodeMk');
    }
}
