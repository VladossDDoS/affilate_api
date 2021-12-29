<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDepositsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('deposits', function (Blueprint $table) {
            $table->id();
            $table->unsignedDouble('amount');
            $table->enum('currency', ['UAH', 'RUB', 'USD', 'EUR']);
            $table->foreignId('user_id')->constrained();
            $table->foreignId('client_id')->constrained();
            $table->enum('type', ['dep', 'ftd'])->default('dep');
            $table->double('rate')->default('1');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('deposits');
    }
}
