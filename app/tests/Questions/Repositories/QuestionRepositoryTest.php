<?php

use \Hermes\Questions\Repositories\QuestionRepository;

class QuestionRepositoryTest extends TestCase {

    // INTEGRATION TEST
    public function testCreateQuestion()
    {
        $input = ['title' => 'Test title'];
        $question = $this->questionRepository->createQuestion($input);
        $this->questionRepository->saveQuestion($question);
    }

    public function testUpdateQuestion()
    {
        $input = ['title' => 'Test title'];
        $question = $this->questionRepository->createQuestion($input);
        $this->questionRepository->saveQuestion($question);

        $input = ['title' => 'Test title 2'];
        $this->questionRepository->updateQuestion($question->id, $input);
    }

    public function setUp()
    {
        $this->questionRepository = App::make('Hermes\Questions\Repositories\QuestionRepository');
    }
}