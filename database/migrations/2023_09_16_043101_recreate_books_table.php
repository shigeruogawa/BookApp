<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class RecreateBooksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::dropIfExists('books');

        Schema::create('books', function (Blueprint $table) {
            $table->increments('id')->nullable(false);
            $table->string('title')->nullable(false);
            $table->string('synopsis')->nullable(true);
            $table->string('impressions')->nullable(true);
            $table->string('image_file')->nullable(true);
            $table->string('author')->nullable(false);
            $table->timestamps();
            $table->string('created_by')->nullable(true);
            $table->string('updated_by')->nullable(true);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
