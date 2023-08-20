<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pesanan extends Model
{
    use HasFactory;

    protected $fillable = ['id', 'kode_pesanan', 'status', 'total_harga', 'user_id'];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function pesananDetail()
    {
        return $this->hasMany(PesananDetail::class, 'pesanan_id', 'pesanan_id');
    }
}
