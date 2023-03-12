<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('shipments', function (Blueprint $table) {
            $table->string('weight')->after('courier_shipping_option_id')->default('0.00');
            $table->string('size')->after('weight')->default('0.00');
            $table->string('tracking')->after('size')->default('xxx-000-xxx-000');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('shipments', function (Blueprint $table) {
            $table->dropColumn('weight');
            $table->dropColumn('size');
            $table->dropColumn('tracking');
        });
    }
};
