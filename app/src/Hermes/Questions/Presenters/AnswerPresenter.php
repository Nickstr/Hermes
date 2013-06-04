<?php namespace Hermes\Questions\Presenters;

use Hermes\Questions\Entities\Answer;

class AnswerPresenter
{
    public function __construct(Answer $answer)
    {
        $this->answer = $answer;
    }

    public function getVoteUpUrl()
    {
        return \URL::action('Hermes\Questions\Controllers\AnswerController@voteUp', array($this->answer->id));
    }

    public function getVoteDownUrl()
    {
        return \URL::action('Hermes\Questions\Controllers\AnswerController@voteDown', array($this->answer->id));
    }
}