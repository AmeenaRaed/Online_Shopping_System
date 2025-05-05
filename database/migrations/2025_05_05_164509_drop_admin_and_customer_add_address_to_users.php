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
        // Add address column to users table
        Schema::table('users', function (Blueprint $table) {
            $table->text('address')->nullable();  // Add the address column to users table
        });

        // // Drop the admins table
        // Schema::dropIfExists('admins');

        // // Drop the customers table
        // Schema::dropIfExists('customers');
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // Add back the admins table
        Schema::create('admins', function (Blueprint $table) {
            $table->id();
            $table->foreign('id')->references('id')->on('users')->onDelete('cascade');
        });

        // Add back the customers table
        Schema::create('customers', function (Blueprint $table) {
            $table->id();
            $table->foreign('id')->references('id')->on('users')->onDelete('cascade');
            $table->text('address');
        });

        // Drop address column from users table
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('address');
        });
    }
};
