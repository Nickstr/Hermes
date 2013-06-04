<?php

use Illuminate\Database\Migrations\Migration;

class CreateAnswerTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
        Schema::create('answers', function($table)
        {
            $table->increments('id');
            $table->text('content');

            // Scoring
            $table->integer('accepted');
            $table->integer('score');

            // Relations
            $table->integer('user_id');
            $table->integer('question_id');
            $table->integer('answer_id');

            // Timestamps
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
		Schema::drop('answers');
	}

}