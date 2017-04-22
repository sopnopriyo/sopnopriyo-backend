<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePortfoliosTable extends Migration
{
   /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // portfolio table
        Schema::create('portfolio', function(Blueprint $table)
        {
            $table->increments('id');
            $table->string('name');
            $table->string('url');
            $table->string('image');
            $table->text('description');
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
        // drop portfolio table
        Schema::dropIfExists('portfolio');
    }
}
