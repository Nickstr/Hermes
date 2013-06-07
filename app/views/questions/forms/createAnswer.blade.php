{{ Form::open(array('action' => 'Hermes\Questions\Controllers\AnswerController@create')) }}
    {{ Form::textarea('content') }}
    {{ $errors->first('content') }}
    {{ Form::hidden('question_id', $questionId) }}
    {{ Form::hidden('answer_id', isset($answerId) ? $answerId : null)}}
    {{ Form::submit('Answer') }}
{{ Form::close() }}