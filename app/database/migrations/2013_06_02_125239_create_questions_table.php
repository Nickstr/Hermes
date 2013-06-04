<?php

use Illuminate\Database\Migrations\Migration;

class CreateQuestionsTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('questions', function($table)
        {
            $table->increments('id');
            $table->string('unique_id');
            $table->text('title');
            $table->text('question');

            // Scoring
            $table->integer('answered');
            $table->integer('total_answers');
            $table->integer('score');
            $table->integer('views');

            // Relations
            $table->integer('user_id');

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
        Schema::drop('questions');
    }

}