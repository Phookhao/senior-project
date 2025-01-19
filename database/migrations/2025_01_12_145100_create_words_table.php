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
        Schema::create('words', function (Blueprint $table) {
            $table->id();
            $table->string('word'); // คำศัพท์
            $table->string('pronunciation')->nullable(); // คำอ่าน
            $table->text('meaning')->nullable(); // ความหมาย
            $table->binary('audio_file')->nullable(); // เส้นทางไฟล์เสียง
            $table->string('spelling')->nullable(); // การสะกดคำ

            // Foreign Keys
            $table->unsignedBigInteger('user_id'); // FK จากตาราง users
            $table->unsignedBigInteger('word_type_id'); // FK จากตาราง word_types
            $table->unsignedBigInteger('word_category_id'); // FK จากตาราง word_categories

            $table->timestamps(); // created_at และ updated_at

            // การกำหนด Foreign Key
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade'); // Cascade ลบคำศัพท์ถ้าผู้ใช้ถูกลบ
            $table->foreign('word_type_id')->references('id')->on('word_types')->onDelete('restrict'); // Restrict ห้ามลบ type ถ้าใช้
            $table->foreign('word_category_id')->references('id')->on('word_categories')->onDelete('restrict'); // Restrict ห้ามลบ category ถ้าใช้
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('words');
    }
};
