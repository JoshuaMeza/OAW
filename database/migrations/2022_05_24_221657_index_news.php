<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('noticias', function (Blueprint $table) {
            $table->index('date');
            $table->index('title');
            $table->index('url');
            $table->index('description');
            $table->index('categories');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('noticias', function (Blueprint $table) {
            $table->dropIndex('date');
            $table->dropIndex('title');
            $table->dropIndex('url');
            $table->dropIndex('description');
            $table->dropIndex('categories');
        });
    }
};
