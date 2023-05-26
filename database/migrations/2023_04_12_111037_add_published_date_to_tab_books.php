<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddPublishedDateToTabBooks extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('tab_books', function (Blueprint $table) {
            //
            $table->timestamp('published_date')->nullable()->after('fb_url');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('tab_books', function (Blueprint $table) {
            //
            $table->dropColumn('published_date');
        });
    }
}
