{{ $question->title }}<br>
    <ul>
        @foreach($question->answers as $answer)
            <li>        {{ $answer->score }}
        <a href="{{ $answer->presenter()->getVoteUpUrl() }}">Vote up</a> -
        <a href="{{ $answer->presenter()->getVoteDownUrl() }}">Vote down</a> -||-
        {{ $answer->content }}</li>
        @endforeach
    </ul>

    @include('questions.forms.createAnswer', array('questionId' => $question->id))