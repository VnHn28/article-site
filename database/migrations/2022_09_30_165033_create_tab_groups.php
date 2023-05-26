<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTabGroups extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tab_groups', function (Blueprint $table) {
            $table->increments('id');
		    $table->string('title', 255);
		    $table->integer('category_id');
		    $table->integer('group_article_categories_id')->default(NULL)->nullable();
		    $table->string('cover_image', 255)->default(NULL)->nullable();
		    $table->text('subtitle');
		    $table->text('content');
		    $table->integer('author_id');
		    $table->tinyInteger('display_gallery')->default('0')->nullable();
		    $table->string('gallery_img1', 255)->default(NULL)->nullable();
            $table->integer('priority_img1')->default('0')->nullable();
            $table->string('gallery_img2', 255)->default(NULL)->nullable();
            $table->integer('priority_img2')->default('0')->nullable();
            $table->string('gallery_img3', 255)->default(NULL)->nullable();
            $table->integer('priority_img3')->default('0')->nullable();
            $table->string('gallery_img4', 255)->default(NULL)->nullable();
            $table->integer('priority_img4')->default('0')->nullable();
            $table->string('gallery_img5', 255)->default(NULL)->nullable();
            $table->integer('priority_img5')->default('0')->nullable();
            $table->string('gallery_img6', 255)->default(NULL)->nullable();
            $table->integer('priority_img6')->default('0')->nullable();
            $table->string('gallery_img7', 255)->default(NULL)->nullable();
            $table->integer('priority_img7')->default('0')->nullable();
            $table->string('gallery_img8', 255)->default(NULL)->nullable();
            $table->integer('priority_img8')->default('0')->nullable();
            $table->string('gallery_img9', 255)->default(NULL)->nullable();
            $table->integer('priority_img9')->default('0')->nullable();
            $table->string('gallery_img10', 255)->default(NULL)->nullable();
            $table->integer('priority_img10')->default('0')->nullable();
            $table->string('gallery_img11', 255)->default(NULL)->nullable();
            $table->integer('priority_img11')->default('0')->nullable();
            $table->string('gallery_img12', 255)->default(NULL)->nullable();
            $table->integer('priority_img12')->default('0')->nullable();
		    $table->timestamp('ad_schedule_begin')->nullable();
		    $table->timestamp('ad_schedule_end')->nullable();
		    $table->integer('ad_position_id')->default('0')->nullable();
		    $table->integer('priority')->default('50');
		    $table->tinyInteger('reviewed')->default('0');
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
        Schema::drop('tab_groups');
    }
}
