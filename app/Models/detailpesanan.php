<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class detailpesanan extends Model
{
    use HasFactory;
    public function produk()
	{
		 return $this->belongsTo('App/Models/produk', 'produk_id', 'id');
	}
 public function pesanan()
	{
		 return $this->belongsTo('App/Models/pesanan', 'pesanan_id', 'id');
}
}

