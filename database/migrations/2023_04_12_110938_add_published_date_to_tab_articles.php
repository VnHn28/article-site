<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddPublishedDateToTabArticles extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('tab_articles', function (Blueprint $table) {
            //
            $table->timestamp('published_date')->nullable()->after('click_count');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('tab_articles', function (Blueprint $table) {
            //
            $table->dropColumn('published_date');
        });
    }
}
