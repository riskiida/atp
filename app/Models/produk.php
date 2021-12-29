<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class produk extends Model
{
    use HasFactory;
 	public function detailpesanan()
    {
        return $this->hasMany('App/Models/detailpesanan', 'produk_id', 'id',);
}
}
