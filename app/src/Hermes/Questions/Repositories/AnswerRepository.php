<?php namespace Hermes\Questions\Repositories;

use Hermes\Questions\Entities\Answer;
use Hermes\Questions\Entities\Question;
use Hermes\Questions\Repositories\QuestionRepository;

class AnswerRepository
{
    public function __construct(Answer $answer, QuestionRepository $question)
    {
        $this->answer = $answer;
        $this->question = $question;
    }

    public function findById($answerId)
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

    public function saveAnswer(Answer $answer)
    {
        $question = $this->question->findById($answer->question_id);
        $answer = $question->answers()->save($answer);
        return $answer;
    }
}