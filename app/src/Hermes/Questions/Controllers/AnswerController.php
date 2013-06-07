<?php namespace Hermes\Questions\Controllers;

use Input;
use Redirect;
use Hermes\Questions\Repositories\AnswerRepository;

class AnswerController extends \Controller {

    public function __construct(AnswerRepository $answerRepository)
    {
        $this->answerRepository = $answerRepository;
    }

    public function voteUp($answerId)
    {
        $answer = $this->answerRepository->findById($answerId);
        $answer->incrementScore();
        return Redirect::back();
    }

    public function voteDown($answerId)
    {
        $answer = $this->answerRepository->findById($answerId);
        $answer->decrementScore();
        return Redirect::back();
    }

    public function create()
    {
        $answer = $this->answerRepository->createAnswer(Input::all());
        if(!$answer->isValid()) {
            return Redirect::back()->withErrors($answer->messages);
        }

        $this->answerRepository->saveAnswer($answer);
        return Redirect::back();
    }
}