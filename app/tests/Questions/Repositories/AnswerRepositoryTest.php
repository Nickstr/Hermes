<?php

class AnswerRepositoryTest extends TestCase {

    // INTEGRATION TEST
    public function testCreateAnswer()
    {
        $input = ['title' => 'test title'];
        $question = $this->questionRepository->createQuestion($input);
        $question = $this->questionRepository->saveQuestion($question);

        $input = ['content' => 'Test content'];
        $answer = $this->answerRepository->createAnswer($input);
        $answer = $this->answerRepository->saveAnswer($question, $answer);

        $this->assertEquals($question->id, $answer->question_id);
    }
    public function setUp()
    {
        $this->answerRepository = App::make('Hermes\Questions\Repositories\AnswerRepository');
        $this->questionRepository = App::make('Hermes\Questions\Repositories\QuestionRepository');
    }
}