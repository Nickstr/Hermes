<?php

class QuestionTest extends TestCase {

    public function testCreateNewQuestion()
    {
        return new \Hermes\Questions\Entities\Question;
    }

    public function testCreateUniqueId()
    {
        $question = $this->question;
        $question->unique_id = '12345';

        $this->assertNotEquals('12345', $question->unique_id);
    }

    public function testGetAnswers()
    {
        $question = $this->question->answers;
    }

    public function setUp()
    {
        $this->question = new \Hermes\Questions\Entities\Question;
    }


}