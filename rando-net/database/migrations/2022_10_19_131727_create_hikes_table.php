<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create("hikes", function (Blueprint $table) {
            $table->id();
            $table->string("name", 50);
            $table->string("region", 30);
            $table->string("coordinates", 15);
            $table->integer("difficulty")->unsigned();
            $table->string("map");
            $table->string("description", 1000);
            $table->boolean("validated");
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
        Schema::dropIfExists("hikes");
    }
};
