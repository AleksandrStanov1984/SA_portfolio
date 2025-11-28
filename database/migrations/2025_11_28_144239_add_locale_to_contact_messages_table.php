<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::table('contact_messages', function (Blueprint $table) {
            // SQLite НЕ поддерживает after() — просто добавляем колонку
            $table->string('locale', 5)->default('en')->nullable();
        });
    }

    public function down()
    {
        // SQLite не умеет dropColumn, оставляем пустым
    }
};

