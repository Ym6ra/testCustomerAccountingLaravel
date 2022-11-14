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
        Schema::create('autos', function (Blueprint $table) {
            $table->id();
            $table->foreignId('client_id')->constrained()->onDelete('cascade');
            $table->string('mark');
            $table->string('model');
            $table->string('color');
            $table->string('number')->unique();
            $table->string('status');
            $table->timestamps();
            //$table->unsignedBigInteger('cleint_id')->nullable();
            //$table->index('client_id', 'auto_client_idx');
            //$table->foreign('client_id', 'auto_client_fk')->on('clients')->references('id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('autos');
    }
};
