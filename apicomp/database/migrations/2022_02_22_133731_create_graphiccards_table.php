<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGraphiccardsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('graphiccards', function (Blueprint $table) {
            $table->id();

            $table->string('name');
            $table->string('imageUrl');
            $table->foreignId('brand_id')->constrained();
            $table->integer('memorySize');
            $table->enum('memoryType', ['gddr5', 'gddr6']);

            $table->integer('minimumPowerSupply');
            $table->tinyInteger('supportMultiGpu');

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
        Schema::dropIfExists('graphiccards');
    }
}
