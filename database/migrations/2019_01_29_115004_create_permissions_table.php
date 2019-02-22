<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePermissionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('permissions', function (Blueprint $table) {
            $table->boolean('registerCourse')->default(0);
            $table->boolean('approveDocuments')->default(0);
            $table->boolean('viewDashboards')->default(0);
            $table->boolean('subscriptionCourse')->default(0);
            $table->boolean('editOwnInfos')->default(0);
            $table->boolean('editOtherInfos')->default(0);
            $table->boolean('deleteUser')->default(0);
            $table->boolean('editPermissions')->default(0);
            $table->unsignedInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users');
            $table->primary('user_id');
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
        Schema::dropIfExists('permissions');
    }
}
