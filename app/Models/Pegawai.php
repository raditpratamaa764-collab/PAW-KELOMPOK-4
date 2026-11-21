<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pegawai extends Model
{
    protected $table = 'masterpegawai';
    protected $primaryKey = 'No';
    public $timestamps = false;
    protected $fillable = ['Nama', 'Jabatan', 'Nomor'];

}
