@extends("layouts.app")

@section("content")
<div class="container">
    <div class="form-group">
        <label for="Joke" class="col-sm-2 control-label">Joke</label>
        <div class="col-sm-10">
        <textarea class="form-control" rows="4" name="text" type="text" form="jokeform" value="{{ old("text") }}"></textarea>
        </div>
    </div>
    <form method="POST" action="{{ url("/store/joke") }}" id="jokeform">
        {{ csrf_field() }}
        <div>
            <button type="submit">Save</button>
        </div>
    </form>
</div>
@endsection