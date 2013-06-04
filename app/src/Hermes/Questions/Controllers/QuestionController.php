<?php namespace Hermes\Questions\Controllers;

use View;
use Redirect;
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
        $question = $this->questionRepository->findByUniqueId($uniqueId);
        return View::make('questions.show')->with(compact('question'));
    }

    public function voteUp($uniqueId)
    {
        $question = $this->questionRepository->findByUniqueId($uniqueId);
        $question->incrementScore();
        return Redirect::back();
    }

    public function voteDown($uniqueId)
    {
        $question = $this->questionRepository->findByUniqueId($uniqueId);
        $question->decrementScore();
        return Redirect::back();
    }
}