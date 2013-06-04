<?php namespace Hermes\Questions\Repositories;

use Hermes\Questions\Entities\Answer;
use Hermes\Questions\Entities\Question;

class AnswerRepository
{
    public function __construct(Answer $answer)
    {
        $this->answer = $answer;
    }

    public function getAnswer($answerId)
    {
        return $this->answer->find($answerId);
    }

    public function createAnswer($input = array())
    {
        return $this->answer->newInstance()->fill($input);
    }

    public function updateAnswer($id, $input = array())
    {
        return $this->answer->find($id)->update($input);
    }

    public function saveAnswer(Question $question, Answer $answer)
    {
        $answer = $question->answers()->save($answer);
        return $answer;
    }
}