<?php namespace Hermes\Questions\Controllers;

use Input;
use Hermes\Questions\Repositories\AnswerRepository;

class AnswerController extends \Controller {

    public function __construct(AnswerRepository $answerRepository)
    {
        $this->answerRepository = $answerRepository;
    }

    public function voteUp($uniqueId)
    {
        $answer = $this->answerRepository->getAnswer($uniqueId);
        $answer->incrementScore();
        return $answer->score;
    }

    public function voteDown($uniqueId)
    {
        $answer = $this->answerRepository->getAnswer($uniqueId);
        $answer->decrementScore();
        return $answer->score;
    }

    public function create()
    {
        $answer = $this->answerRepository->createAnswer(Input::all());
    }
}