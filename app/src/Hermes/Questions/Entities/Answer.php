<?php namespace Hermes\Questions\Entities;

use Validator;
use Hermes\Questions\Entities\Base;

class Answer extends Base
{
    protected $guarded = array('id');
    protected $softDelete = true;
    protected $table = 'answers';

    // Validation rules
    protected $rules = array(
            'content' => 'required'
        );

    public $messages;

    // Relations
    public function question()
    {
        return $this->belongsTo('Hermes\Questions\Entities\Question');
    }

    public function replies()
    {
        return $this->hasMany('Hermes\Questions\Entities\Answer');
    }

    public function setAccepted()
    {
        $this->accepted = 1;
    }

    public function isAccepted()
    {
        if($this->accepted) {
            return true;
        }
    }

    public function scopeMain($query)
    {
        $query->where('answer_id', 0);
    }

    public function incrementScore()
    {
        $this->increment('score');
    }

    public function decrementScore()
    {
        $this->decrement('score');
    }

    public function presenter()
    {
        return new \Hermes\Questions\Presenters\AnswerPresenter($this);
    }
}