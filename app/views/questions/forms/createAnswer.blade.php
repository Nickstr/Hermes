{{ Form::open(array('action' => 'Hermes\Questions\Controllers\AnswerController@create')) }}
    {{ Form::textarea('content') }}
    {{ Form::hidden('question_id', $questionId) }}
    {{ Form::submit('Answer') }}
{{ Form::close() }}