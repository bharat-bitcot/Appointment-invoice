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
        Schema::create('users', function (Blueprint $table) {
            $table->id();


            $table->unsignedBigInteger('role_id')->nullable()->comment('Relation with roles table');
            $table->string('email',80)->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');

            $table->string('first_name',50)->nullable();
            $table->string('middle_name',50)->nullable();
            $table->string('last_name',50)->nullable();
            $table->date('dob')->nullable();
            $table->enum('gender', ['male', 'female','other'])->default('male');;

            $table->string('phone',40)->nullable();
            $table->string('city',100)->nullable();
            $table->string('state',100)->nullable();
            $table->string('country',50)->nullable();



            $table->tinyInteger('status')->default(0)->comment('0 for disable, 1 for enable');

            $table->foreign('role_id')->references('id')->on('roles')->onDelete('cascade');
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
};
