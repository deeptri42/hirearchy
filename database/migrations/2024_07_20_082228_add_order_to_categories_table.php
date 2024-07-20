<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddOrderToCategoriesTable extends Migration
{
    public function up()
    {
        // Check if the column does not exist before adding
        if (!Schema::hasColumn('categories', 'order')) {
            Schema::table('categories', function (Blueprint $table) {
                $table->integer('order')->nullable()->after('parent_id');
            });
        }
    }

    public function down()
    {
        // Check if the column exists before dropping
        if (Schema::hasColumn('categories', 'order')) {
            Schema::table('categories', function (Blueprint $table) {
                $table->dropColumn('order');
            });
        }
    }
}
