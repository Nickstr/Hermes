<?php namespace Hermes\Questions\Controllers;

use View;
use Hermes\Questions\Repositories\QuestionRepository;

class QuestionController extends \Controller {

    public function __construct(QuestionRepository $questionRepository)
    {
        $this->questionRepository = $questionRepository;
    }

    public function index()
    {
        $questions = $this->questionRepository->getQuestions();
        return View::make('questions.index')->with(compact('questions'));
    }

    public function show($uniqueId, $slug)
    {
        $question = $this->questionRepository->getQuestion($uniqueId);
        return View::make('questions.show')->with(compact('question'));
    }

    public function voteUp($uniqueId)
    {
        $question = $this->questionRepository->getQuestion($uniqueId);
        $question->incrementScore();
        return $question->score;
    }

    public function voteDown($uniqueId)
    {
        $question = $this->questionRepository->getQuestion($uniqueId);
        $question->decrementScore();
        return $question->score;
    }
}