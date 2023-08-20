<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Barang extends Model
{
    use HasFactory;

    protected $fillable = ['id', 'nm_barang', 'harga', 'satuan_id', 'kategori_id', 'stok', 'foto'];

    public function satuan()
    {
        return $this->belongsTo(Satuan::class, 'satuan_id', 'id');
    }

    public function kategori()
    {
        return $this->belongsTo(Kategori::class, 'kategori_id', 'id');
    }

    public function pesananDetail()
    {
        return $this->hasMany(PesananDetail::class, 'barang_id', 'id');
    }

    public function users()
    {
        return $this->belongsToMany(User::class, 'keranjangs', 'barang_id', 'user_id');
    }
}
