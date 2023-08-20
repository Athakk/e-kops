<?php

use App\Models\User;
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
        Schema::create('pesanans', function (Blueprint $table) {
            $table->id();
            $table->string('kd_pesanan')->unique();
            $table->enum('status', [0, 1, 2])->default(0); // Status 0 Belum bayar. 1 Sudah bayar. 2 Selesai
            $table->bigInteger('total_harga');
            $table->date('tanggal');
            $table->foreignIdFor(User::class)->onDelete('restrict');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pesanans');
    }
};
