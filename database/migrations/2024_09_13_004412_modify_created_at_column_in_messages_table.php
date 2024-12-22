<?php

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
        Schema::table('messages', function (Blueprint $table) {
            $table->timestamp('read_at')->nullable()->change(); 
            $table->timestamp('created_at', 6)->nullable()->change(); // 6 for microsecond precision
            $table->timestamp('updated_at', 6)->nullable()->change(); // 6 for microsecond precision
        });
    }

    public function down()
    {
        Schema::table('messages', function (Blueprint $table) {
            $table->timestamp('read_at')->nullable()->change(); 
            $table->timestamp('created_at')->nullable()->change(); // Revert back to default precision
            $table->timestamp('updated_at')->nullable()->change(); // Revert back to default precision
        });
    }
};
