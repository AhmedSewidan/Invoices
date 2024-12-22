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
        Schema::table('chats', function (Blueprint $table) {
            // Remove default values if set
            $table->timestamp('created_at', 6)->nullable()->change();
            $table->timestamp('updated_at', 6)->nullable()->change();
        });
    }

    public function down()
    {
        Schema::table('chats', function (Blueprint $table) {
            $table->timestamp('created_at')->nullable(false)->change(); // Revert back to default
            $table->timestamp('updated_at')->nullable(false)->change(); // Revert back to default
        });
    }
};
