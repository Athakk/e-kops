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
        CREATE TRIGGER stok_masuk_update
            AFTER UPDATE ON `stok_masuks`
            FOR EACH ROW
            BEGIN
                UPDATE `barangs` SET `stok` = `stok` - OLD.stok_masuk + NEW.stok_masuk,
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
        DB::unprepared('DROP TRIGGER `stok_masuk_update`');
    }
};
