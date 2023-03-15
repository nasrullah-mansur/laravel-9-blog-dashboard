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
        Schema::create('chambers', function (Blueprint $table) {
            $table->id();
            $table->string('chamber_name');
            $table->string('slug');
            $table->string('image');
            $table->longText('address');
            $table->longText('time');
            $table->longText('google_location')->nullable();
            $table->string('serial_number')->nullable();
            $table->string('appoint_limit');
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
        Schema::dropIfExists('chambers');
    }
};
