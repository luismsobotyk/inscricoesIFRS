<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDefaultPermissionsTrigger extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::unprepared('
        CREATE TRIGGER default_permissions_trigger AFTER INSERT ON `users` FOR EACH ROW
            BEGIN
                INSERT INTO permissions (`editOwnInfos`, `user_id`, `subscriptionCourse`, `created_at`, `updated_at`) 
                VALUES (1, NEW.id, 1, now(), now());
            END
        ');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('default_permissions_trigger');
    }
}
