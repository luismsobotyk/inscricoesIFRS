<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStatusDocumentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('status_documents', function (Blueprint $table) {
            $table->unsignedInteger('document_id');
            $table->boolean('sent');
            $table->boolean('pending');
            $table->boolean('approved');
            $table->boolean('rejected');
            $table->string('comment');
            $table->unsignedInteger('updatedBy');
            $table->foreign('document_id')->references('id')->on('documents');
            $table->foreign('updatedBy')->references('id')->on('users');
            $table->primary('document_id');
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
        Schema::dropIfExists('status_documents');
    }
}
