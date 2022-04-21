<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProcessorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('processors', function (Blueprint $table) {
            $table->id();

            $table->string('name');
            $table->string('imageUrl');
            $table->foreignId('brand_id')->constrained();
            $table->foreignId('sockettype_id')->constrained();
            $table->integer('cores');

            $table->float('baseFrequency');
            $table->float('maxFrequency');
            $table->float('cacheMemory');

            $table->integer('tdp');

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
        Schema::dropIfExists('processors');
    }
}
