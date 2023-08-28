<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Keranjang extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    /**
     * Get all of the comments for the Keranjang
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    // public function barang()
    // {
    //     return $this->hasMany(Barang::class, 'barang_id', 'id');
    // }
}   
