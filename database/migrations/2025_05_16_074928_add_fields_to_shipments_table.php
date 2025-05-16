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
            $table->string('recipient_name')->after('id');
            $table->string('contact_number', 8)->after('recipient_name');
            $table->string('street')->after('contact_number');
            $table->string('road')->after('street');
            $table->string('house_number', 10)->after('road');
            $table->string('country')->after('house_number');
            $table->string('receipt_ref_number')->nullable()->after('country');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('shipments', function (Blueprint $table) {
            $table->dropColumn([
                'recipient_name',
                'contact_number',
                'street',
                'road',
                'house_number',
                'country',
                'receipt_ref_number',
            ]);
        });
    }
};
