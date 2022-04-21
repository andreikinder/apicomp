<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRammemoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rammemories', function (Blueprint $table) {
            $table->id();

            $table->string('name');
            $table->string('imageUrl');
            $table->foreignId('brand_id')->constrained();

            $table->integer('size');
            $table->foreignId('rammemorytype_id')->constrained();
            $table->float('frequency');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('rammemories');
    }
}
