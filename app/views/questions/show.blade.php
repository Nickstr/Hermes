{{ $question->title }}<br>
    <ul>
        @foreach($question->answers as $answer)
            <li>        {{ $answer->score }}
        <a href="{{ $answer->presenter()->getVoteUpUrl() }}">Vote up</a> -
        <a href="{{ $answer->presenter()->getVoteDownUrl() }}">Vote down</a> -||-
        {{ $answer->content }}
        <ul>
        @foreach($answer->replies as $reply)
            <li>REPLY: {{ $reply->content }}</li>
        @endforeach
        </ul>
        <br>
        ----- Form to reply to answers -----
        {{ $answer->presenter()->replyForm() }}

    </li>
        @endforeach
    </ul>

@include('questions.forms.createAnswer', array('questionId' => $question->id))