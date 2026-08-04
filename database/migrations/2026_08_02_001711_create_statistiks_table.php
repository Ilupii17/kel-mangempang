<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('statistiks', function (Blueprint $table) {
            $table->id();
            $table->string('kategori'); // e.g. 'ringkasan', 'penduduk', 'pendidikan', 'pekerjaan', 'umkm'
            $table->string('label');
            $table->string('nilai'); // e.g. '4.812', '50%'
            $table->string('sub_label')->nullable(); // e.g. 'Jumlah Penduduk', 'jiwa'
            $table->integer('persentase')->default(0); // for visual progress bar (0 - 100)
            $table->string('icon')->nullable(); // for fontawesome icons
            $table->integer('urutan')->default(0);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('statistiks');
    }
};
