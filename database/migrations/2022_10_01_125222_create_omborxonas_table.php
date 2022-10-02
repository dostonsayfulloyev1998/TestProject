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
        Schema::create('omborxona', function (Blueprint $table) {
            $table->id();
            $table->integer("material_id");
            $table->integer("miqdori");
            $table->integer("price");
        });
    }

    public function down()
    {
        Schema::dropIfExists('omborxona');
    }
};
