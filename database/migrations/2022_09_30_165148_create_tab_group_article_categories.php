<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTabGroupArticleCategories extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tab_group_article_categories', function (Blueprint $table) {
            $table->increments('id');
		    $table->string('name', 255);
            $table->string('list_color', 255)->default('#000000');
		    $table->tinyInteger('enable')->default('1');
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
        Schema::drop('tab_group_article_categories');
    }
}
