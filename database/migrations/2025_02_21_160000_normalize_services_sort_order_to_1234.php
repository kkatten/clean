<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    public function up(): void
    {
        $ids = DB::table('services')->orderBy('sort_order')->orderBy('id')->pluck('id');
        foreach ($ids as $position => $id) {
            DB::table('services')->where('id', $id)->update(['sort_order' => $position + 1]);
        }
    }

    public function down(): void
    {
        // Не восстанавливаем старые значения
    }
};
