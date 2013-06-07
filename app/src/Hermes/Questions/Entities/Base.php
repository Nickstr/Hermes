<?php namespace Hermes\Questions\Entities;

use Validator;

class Base extends \Eloquent
{
    public function isValid()
    {
        $validator = Validator::make($this->toArray(), $this->rules);
        if($validator->fails()) {
            $this->messages = $validator->messages();
            return false;
        }
        return true;
    }
}