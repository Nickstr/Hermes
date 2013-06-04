<?php namespace Hermes\Questions\Presenters;

use URL;
use View;
use Hermes\Questions\Entities\Answer;

class AnswerPresenter
{
    public function __construct(Answer $answer)
    {
        $this->answer = $answer;
    }

    public function getVoteUpUrl()
    {
        return URL::action('Hermes\Questions\Controllers\AnswerController@voteUp', array($this->answer->id));
    }

    public function getVoteDownUrl()
    {
        return URL::action('Hermes\Questions\Controllers\AnswerController@voteDown', array($this->answer->id));
    }

    public function replyForm()
    {
        $questionId = $this->answer->question_id;
        $answerId = $this->answer->id;

        if($this->answer->score < 3) {
            return null;
        }

        return View::make('questions.forms.createAnswer')->with('questionId', $questionId)->with('answerId', $answerId);
    }
}