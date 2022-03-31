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
        Schema::create('complaints', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('user_id')->nullable()->comment('Relation with users table');
            $table->string('title',255)->collation('utf8mb4_unicode_ci')->nullable();
            $table->text('description')->collation('utf8mb4_unicode_ci')->nullable();
            $table->tinyInteger('condition_type')->default(0)->comment('0 => old, 1 => new');
            $table->tinyInteger('status')->default(1)->comment('0 = pending , 1 = in_progress , 2 = completed');

            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');

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
        Schema::dropIfExists('complains');
    }
};
