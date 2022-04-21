<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMotherboardsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('motherboards', function (Blueprint $table) {
            $table->id();


            $table->string('name');
            $table->string('imageUrl');
            $table->foreignId('brand_id')->constrained();
            $table->foreignId('sockettype_id')->constrained();
            $table->foreignId('rammemorytype_id')->constrained();

            $table->integer('ramMemorySlots');
            $table->integer('maxTdp');
            $table->integer('sataSlots');
            $table->integer('m2Slots');
            $table->integer('pciSlots');

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
        Schema::dropIfExists('motherboards');
    }
}
