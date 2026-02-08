<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('services', function (Blueprint $table) {
            $table->id();
            $table->string('slug')->unique();
            $table->string('title');
            $table->string('meta_description')->nullable();
            $table->text('short_description')->nullable();
            $table->text('description')->nullable();       // что делаем
            $table->text('for_who')->nullable();           // для кого
            $table->json('what_included')->nullable();     // что входит (массив пунктов)
            $table->string('icon')->nullable();            // иконка/класс для карточки
            $table->unsignedSmallInteger('sort_order')->default(0);
            $table->boolean('is_active')->default(true);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('services');
    }
};
