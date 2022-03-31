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
            $table->unsignedBigInteger('manage_service_engineer_id')->nullable()->comment('Relation with manage_service_engineers table');
            $table->unsignedBigInteger('complain_id')->nullable()->comment('Relation with complains table');

            $table->text('description')->collation('utf8mb4_unicode_ci')->nullable();
            $table->tinyInteger('is_sent_mail')->default(0)->comment('0 = not , 1 = send');
            $table->tinyInteger('payment_status')->default(1)->comment('0 = pending , 1 = completed');
            $table->tinyInteger('payment_type')->default(0)->comment('0 = cash , 1 = via phonepe , 0 = other');

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
