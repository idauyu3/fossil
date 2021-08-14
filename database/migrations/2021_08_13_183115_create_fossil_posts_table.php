<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFossilPostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('fossil_posts', function (Blueprint $table) {
            $table->Increments('id');
            $table->string('JapaneseName');
            $table->string('ScientificName');
            $table->LongText('comment');
            $table->string('image');
            //$table->integer('user_id')->unsigned(); //外部キー
            //$table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('fossil_posts', function (Blueprint $table) {
            $table->dropForeign('fossil_posts_user_id_foreign');
        });
    }
}
