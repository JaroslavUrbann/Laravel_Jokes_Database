@extends("layouts.app")

@section("content")
<div class="container">
    <h1>Jokes</h1>
    @if($jokes)
        @foreach($jokes as $joke)
            <div class="well">
                <h3>{{$joke->text}}</h3>
            </div>
        @endforeach
    @else
        <p>There are no jokes here</p>
    @endif
</div>
@endsection