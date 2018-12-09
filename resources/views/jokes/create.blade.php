@extends("layouts.app")

@section("content")
<div class="container">
    <form method="POST" action="{{ url("/store/joke") }}">
        {{ csrf_field() }}
        <div>
            <label>Text</label>
            <input name="text" type="text" value="{{ old("text") }}">
        </div>
        <div>
            <button type="submit">Save</button>
        </div>
    </form>
</div>
@endsection