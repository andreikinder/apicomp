<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMachinesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('machines', function (Blueprint $table) {
            $table->id();

            $table->string('name');
            $table->string('description');
            $table->string('imageUrl');
            $table->foreignId('motherboard_id')->constrained();
            $table->foreignId('processor_id')->constrained();
            $table->foreignId('rammemory_id')->constrained();
            $table->integer('ramMemoryAmount');
            $table->foreignId('graphiccard_id')->constrained();
            $table->integer('graphicCardAmount');
            $table->foreignId('powersupply_id')->constrained();

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
        Schema::dropIfExists('machines');
    }
}
