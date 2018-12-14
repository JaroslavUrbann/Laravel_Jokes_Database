@extends("layouts.app")

@section("content")
<div class="container">
    <form method="POST" action="{{ url("/update/" . $joke->id) }}">
        {{ csrf_field() }}
        <div>
            <label>Text</label>
        <input name="text" type="text" value="{{ old("text") }}" placeholder="{{$joke->text}}">
        </div>
        <div>
            <button type="submit">Update</button>
        </div>
    </form>
</div>
@endsection