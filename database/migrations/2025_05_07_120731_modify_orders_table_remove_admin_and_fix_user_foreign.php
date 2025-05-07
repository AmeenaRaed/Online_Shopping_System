<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ModifyOrdersTableRemoveAdminAndFixUserForeign extends Migration
{
    public function up()
    {
        Schema::table('orders', function (Blueprint $table) {
            // Drop foreign keys first
            $table->dropForeign(['admin_id']);
            $table->dropForeign(['user_id']);

            // Drop the admin_id column
            $table->dropColumn('admin_id');

            // Re-add correct foreign key for user_id
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::table('orders', function (Blueprint $table) {
            // Drop user foreign key pointing to users
            $table->dropForeign(['user_id']);

            // Add back admin_id column
            $table->unsignedBigInteger('admin_id')->nullable();

            // Re-add foreign keys
            $table->foreign('user_id')->references('id')->on('customers')->onDelete('cascade');
            $table->foreign('admin_id')->references('id')->on('admins')->onDelete('set null');
        });
    }
}
