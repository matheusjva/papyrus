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
        Schema::create('fields', function (Blueprint $table){
            $table->increments('id');
            $table->string('name');

        });

        /*
         * Insere um campo
         */
        $campoId = DB::table('fields')->insertGetId([
            'name' => 'Mobile'

        ]);

        Schema::create('works', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('creator_id')->unsigned()->nullable();
            $table->string('title');
            $table->string('description');
            $table->integer('field_id');
            $table->string('year', 25);
            $table->string('filename');
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('creator_id')->references('id')->on('users');
            $table->foreign('field_id')->references('id')->on('fields');
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

        Schema::create('juries', function (Blueprint $table){
            $table->increments('id');
            $table->string('name');
           // $table->enum('type', ["Orientador", "Coorientador", "Banca"]);
        });

        Schema::create('jury_work', function (Blueprint $table){
            $table->increments('id');
            $table->integer('jury_id')->unsigned();
            $table->integer('work_id')->unsigned();

            $table->foreign('jury_id')->references('id')->on('juries');
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
        Schema::table('author_work', function (Blueprint $table) {
            $table->dropForeign(['author_id']);
            $table->dropForeign(['work_id']);
        });

        Schema::dropIfExists('author_work');
        
        Schema::table('works', function (Blueprint $table) {
            $table->dropForeign(['creator_id']);
            $table->dropForeign(['field_id']);
        });

        Schema::dropIfExists('works');

        Schema::dropIfExists('author');

        Schema::dropIfExists('field');


        Schema::table('jury_work', function (Blueprint $table) {
            $table->dropForeign(['jury_id']);
            $table->dropForeign(['work_id']);
        });

        Schema::dropIfExists('jury_work');

        Schema::dropIfExists('juries');
    }
}
