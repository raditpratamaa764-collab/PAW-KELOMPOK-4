<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Meja extends Model
{
    protected $table = 'data_meja';
    
    public $timestamps = false;
    
    protected $primaryKey = 'Nomor_Meja';
    
    protected $keyType = 'string';
    public $incrementing = false;
    
    protected $fillable = ['Nomor_Meja', 'Kapasitas', 'Area', 'Status']; 
}