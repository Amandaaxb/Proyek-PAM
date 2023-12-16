<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $table='orders';
    public $timestamps=false;
    public function koperasi()
    {
        return $this->belongsTo(Koperasi::class,'kode_barang','id');
    }
    public function pulsa()
    {
        return $this->belongsTo(Pulsa::class,'kode_pulsa','id');
    }
}