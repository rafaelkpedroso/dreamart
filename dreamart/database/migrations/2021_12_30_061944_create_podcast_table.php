<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePodcastTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('podcast', function (Blueprint $table) {
            $table->id();
            $table->string('slug')->unique();
            $table->string('title');
            $table->unsignedBigInteger('author');
            $table->foreign('author')->references('id')->on('users');
            $table->string('url');
            $table->bigInteger('views')->default(0);
            $table->decimal('rating',4,1)->nullable();
            $table->string('taxonomy')->nullable();
            $table->foreign('taxonomy')->references('slug')->on('taxonomy');
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
        Schema::dropIfExists('podcast');
    }
}
