<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('staffs', function (Blueprint $table) {
            $table->id();
            $table->char('code', 50);
            $table->char('username', 100);
            $table->string('fullname');
            $table->char('email', 100);
            $table->char('phone', 20);
            $table->date('birthday');
            $table->tinyInteger('gender');
            $table->text('avatar')->nullable();
            $table->string('password');
            $table->tinyInteger('roles'); // 1: staff, 2: manager
            $table->string('token_get_password')->nullable();
            $table->timestamp('email_querified_at')->nullable();
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
        Schema::dropIfExists('staffs');
    }
};
