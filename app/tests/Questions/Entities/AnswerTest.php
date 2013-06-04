<?php

class AnswerTest extends TestCase {

    public function testCreateNewAnswer()
    {
        return new \Hermes\Questions\Entities\Answer;
    }

    public function testSetAccepted()
    {
        $this->answer->setAccepted();
        $this->assertTrue($this->answer->isAccepted());
    }

    public function testVotes()
    {
        $answer = $this->answer;
        $answer->incrementScore();
    }

    public function setUp()
    {
        $this->answer = App::make('Hermes\Questions\Entities\Answer');
    }
}