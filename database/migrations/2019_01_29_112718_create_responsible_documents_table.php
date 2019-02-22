<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateResponsibleDocumentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('responsible_documents', function (Blueprint $table) {
            $table->increments('id');
            $table->string('pathArchive');
            $table->string('type');
            $table->unsignedInteger('responsible_id');
            $table->foreign('responsible_id')->references('id')->on('responsible');
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
        Schema::dropIfExists('responsible_documents');
    }
}
