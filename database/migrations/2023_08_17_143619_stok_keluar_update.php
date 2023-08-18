<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        DB::unprepared('
        CREATE TRIGGER stok_keluar_update
            AFTER UPDATE ON `stok_keluars`
            FOR EACH ROW
            BEGIN
                UPDATE `barangs` SET `stok` = `stok` + OLD.stok_keluar - NEW.stok_keluar,
                `updated_at` = NOW()
                WHERE `id` = NEW.barang_id;
            END
    ');
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        DB::unprepared('DROP TRIGGER `stok_keluar_update`');
    }
};
