<?php namespace Hermes\Questions\Presenters;

use Hermes\Questions\Entities\Question;

class QuestionPresenter
{
    public function __construct(Question $question)
    {
        $this->question = $question;
    }

    public function getUrl()
    {
        return \URL::action('Hermes\Questions\Controllers\QuestionController@show', array($this->question->unique_id, \Str::slug($this->question->title)));
    }

    public function getVoteUpUrl()
    {
        return \URL::action('Hermes\Questions\Controllers\QuestionController@voteUp', array($this->question->unique_id));
    }

    public function getVoteDownUrl()
    {
        return \URL::action('Hermes\Questions\Controllers\QuestionController@voteDown', array($this->question->unique_id));
    }
}