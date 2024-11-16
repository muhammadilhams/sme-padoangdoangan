<?php

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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('namaUmkm');
            $table->string('namaPemilik');
            $table->string('username')->unique();
            $table->string('email');
            $table->string('alamat');
            $table->string('kontak');
            $table->string('mapLink')->nullable();
            $table->string('password');
            $table->string('role')->default('user');
            $table->string('deskripsi')->nullable();
            $table->string('foto_profil')->nullable();
            $table->enum('jenis_usaha', ['kuliner', 'fashion', 'kerajinan', 'kecantikan', 'otomotif', 'agribisnis']);
            $table->rememberToken();
            $table->timestamps();
        });
        
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
