<?php

use App\Models\Pesanan;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::table('stok_keluars', function (Blueprint $table) {
            $table->enum('status', ['Menunggu', 'Selesai'])->default('Selesai')->after('stok_keluar');
            $table->foreignIdFor(Pesanan::class)->nullable()->after('stok_keluar');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::table('stok_keluars', function (Blueprint $table) {
            $table->dropColumn('status');
            $table->dropColumn('pesanan_id');
        });
    }
};
