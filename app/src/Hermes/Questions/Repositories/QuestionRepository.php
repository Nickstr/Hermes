<?php namespace Hermes\Questions\Repositories;

use Hermes\Questions\Entities\Question;

class QuestionRepository
{
    public function __construct(Question $question)
    {
        $this->question = $question;
    }

    public function getQuestions()
    {
        return $this->question->get();
    }

    public function getQuestion($uniqueId)
    {
        return $this->question->with(array('answers'))->where('unique_id', $uniqueId)->first();
    }

    public function createQuestion($input = array())
    {
        return $this->question->newInstance()->fill($input);
    }

    public function updateQuestion($id, $input = array())
    {
        return $this->question->find($id)->update($input);
    }

    public function saveQuestion(Question $question)
    {
        $question->save();
        return $question;
    }
}