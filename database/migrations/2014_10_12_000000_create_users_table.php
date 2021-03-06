<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('full_name');
            $table->string('email')->nullable();
            $table->string('dob');
            $table->timestamp('email_verified_at')->nullable();
            $table->string('phone');
            $table->string('position');
            $table->string('depart');
            $table->string('password');
            $table->date('start_woriking')->nullable();
            $table->tinyInteger('is_admin')->default(0);
            $table->bigInteger('role_id')->default(0);
            $table->bigInteger('user_status_id')->default(1);

            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
