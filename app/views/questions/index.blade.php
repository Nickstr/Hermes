<ul>
@foreach($questions as $question)
    <li>
        {{ $question->score }}
        <a href="{{ $question->presenter()->getVoteUpUrl() }}">Vote up</a> -
        <a href="{{ $question->presenter()->getVoteDownUrl() }}">Vote down</a> -||-
        {{ $question->unique_id }} - <a href="{{ $question->presenter()->getUrl() }}">Linkje</a></li>
@endforeach
</ul>