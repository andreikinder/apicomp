<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePowersuppliesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('powersupplies', function (Blueprint $table) {
            $table->id();

            $table->string('name');
            $table->string('imageUrl');
            $table->foreignId('brand_id')->constrained();

            $table->integer('potency');
            $table->enum('badge80Plus', ['none', 'white', 'bronze', 'silver', 'gold', 'platinum', 'titanium']);




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
        Schema::dropIfExists('powersupplies');
    }
}
