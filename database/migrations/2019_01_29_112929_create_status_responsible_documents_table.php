<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStatusResponsibleDocumentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('status_responsible_documents', function (Blueprint $table) {
            $table->unsignedInteger('responsibleDocument_id');
            $table->boolean('sent');
            $table->boolean('pending');
            $table->boolean('approved');
            $table->boolean('rejected');
            $table->string('comment');
            $table->unsignedInteger('updatedBy');
            $table->foreign('responsibleDocument_id')->references('id')->on('responsible_documents');
            $table->foreign('updatedBy')->references('id')->on('users');
            $table->primary('responsibleDocument_id');
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
        Schema::dropIfExists('status_responsible_documents');
    }
}
