<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateResourceTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('resource', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('func_id')->length(10);
            $table->string('name');
            $table->string('description')->nullable();
            $table->string('capabilities')->nullable();
            $table->decimal('distance_from_pcc', 10, 1)->nullable();
            $table->decimal('cost', 10, 2);
            $table->unsignedInteger('unit_id')->length(10);
            $table->unsignedInteger('user_id')->length(10);
            // $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('resource');
    }
}
