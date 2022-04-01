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
        Schema::create('invoices_items', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('invoice_id')->nullable()->comment('Relation with invoices table');
            $table->string('item',100)->collation('utf8mb4_unicode_ci');
            $table->mediumInteger('qty')->collation('utf8mb4_unicode_ci');
            $table->float('amount', 8, 2)->collation('utf8mb4_unicode_ci');
            $table->float('sub_total', 8, 2)->collation('utf8mb4_unicode_ci');
            $table->float('tax_total', 8, 2)->collation('utf8mb4_unicode_ci')->comment('Tax - 18%');;
            $table->float('grand_total', 8, 2)->collation('utf8mb4_unicode_ci');

            $table->foreign('invoice_id')->references('id')->on('invoices')->onDelete('cascade');
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
        Schema::dropIfExists('invoices_items');
    }
};
