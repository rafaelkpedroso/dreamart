<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTaxonomyTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('taxonomy', function (Blueprint $table) {
            $table->string('slug')->primary();
            $table->string('father')->nullable();
            $table->string('name');
            $table->timestamps();
        });

        Schema::table('taxonomy', function (Blueprint $table)
        {
            $table->foreign('father')->references('slug')->on('taxonomy');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('taxonomy');
    }
}
