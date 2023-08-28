<?php

use App\Models\Kategori;
use App\Models\Satuan;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('barangs', function (Blueprint $table) {
            $table->id();
            $table->string('nm_barang');
            $table->integer('harga');
            
            $table->foreignIdFor(Satuan::class)->onDelete('restrict');;
            $table->foreignIdFor(Kategori::class)->onDelete('restrict');;
            
            $table->integer('stok');
            $table->string('foto');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('barangs');
    }
};
