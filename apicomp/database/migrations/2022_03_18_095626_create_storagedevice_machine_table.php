<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStoragedeviceMachineTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('storagedevice_machine', function (Blueprint $table) {
          //  $table->id();
            $table->foreignId('storagedevice_id')->constrained()->onDelete('cascade');;
            $table->foreignId('machine_id')->constrained()->onDelete('cascade');;

            $table->primary(['storagedevice_id','machine_id']);

            $table->integer('amount');
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
        Schema::dropIfExists('storagedevice_machine');
    }
}
