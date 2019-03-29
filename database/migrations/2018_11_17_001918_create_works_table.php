<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateWorksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('works', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('creator_id')->unsigned()->nullable();
            $table->string('title', 255);
            $table->string('description');
            $table->string('field');
            $table->string('authors', 255);
            $table->string('year', 25);
            $table->string('jury', 255);
            $table->string('filename');
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('creator_id')->references('id')->on('users');
        });

        Schema::create('authors', function (Blueprint $table){
            $table->increments('id');
            $table->string('name');

        });

        Schema::create('author_work', function (Blueprint $table) {
           $table->increments('id');
           $table->integer('author_id')->unsigned();
           $table->integer('work_id')->unsigned();

           $table->foreign('author_id')->references('id')->on('authors');
           $table->foreign('work_id')->references('id')->on('works');
        });

        Schema::create('jury', function (Blueprint $table){
            $table->increments('id');
            $table->string('name');
            $table->enum('type', ["Orientador", "Coorientador", "Banca"]);
        });

        Schema::create('jury_work', function (Blueprint $table){
            $table->increments('id');
            $table->integer('jury_id')->unsigned();
            $table->integer('work_id')->unsigned();

            $table->foreign('jury_id')->references('id')->on('jury');
            $table->foreign('work_id')->references('id')->on('works');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('works', function (Blueprint $table) {
            $table->dropForeign(['creator_id']);
        });

        Schema::dropIfExists('works');

        Schema::dropIfExists('author');

        Schema::table('author_work', function (Blueprint $table) {
            $table->dropForeign(['author_id']);
            $table->dropForeign(['work_id']);
        });

        Schema::dropIfExists('author_work');

        Schema::table('jury_work', function (Blueprint $table) {
            $table->dropForeign(['jury_id']);
            $table->dropForeign(['work_id']);
        });

        Schema::dropIfExists('jury_work');
    }
}
