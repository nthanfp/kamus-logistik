<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDictionaryTable extends Migration
{
    public function up()
    {
        Schema::create('dictionary', function (Blueprint $table) {
            $table->id();
            $table->string('indonesian');
            $table->text('indonesian_definition');
            $table->string('english');
            $table->text('english_definition');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('dictionary');
    }
}