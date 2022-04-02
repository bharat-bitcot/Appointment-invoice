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
        Schema::create('invoices', function (Blueprint $table) {
            $table->id();

            $table->string('generate_id',20)->collation('utf8mb4_unicode_ci')->nullable();
            $table->unsignedBigInteger('user_id')->nullable()->comment('Relation with user table');
            $table->unsignedBigInteger('complaint_id')->nullable()->comment('Relation with complaint table');

            $table->text('address')->collation('utf8mb4_unicode_ci')->nullable();
            $table->string('phoneno',20)->collation('utf8mb4_unicode_ci')->nullable();

            $table->string('shipping',20)->collation('utf8mb4_unicode_ci')->nullable()->default('Free Shipping');

            $table->tinyInteger('is_sent_mail')->default(0)->comment('0 = not , 1 = send');

            $table->tinyInteger('payment_status')->default(1)->comment('0 = pending , 1 = completed');
            $table->tinyInteger('payment_type')->default(0)->comment('0 = cash , 1 = via phonepe , 0 = other');

            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('complaint_id')->references('id')->on('complaints')->onDelete('cascade');

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
        Schema::dropIfExists('invoices');
    }
};
