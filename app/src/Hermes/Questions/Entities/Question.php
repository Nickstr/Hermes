<?php namespace Hermes\Questions\Entities;

class Question extends \Eloquent
{
    protected $guarded = array('id');
    protected $softDelete = true;
    protected $table = 'questions';

    // Relations
    public function answers()
    {
        return $this->hasMany('Hermes\Questions\Entities\Answer')->orderBy('score', 'DESC')->orderBy('created_at', 'DESC')->where('answer_id', 0);
    }

    public function setUniqueIdAttribute()
    {
        $this->attributes['unique_id'] = uniqid();
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
        return new \Hermes\Questions\Presenters\QuestionPresenter($this);
    }
}