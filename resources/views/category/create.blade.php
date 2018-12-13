@extends("layouts.app")

@section("content")
<div class="container">
    <form method="POST" action="{{ url("/store/category") }}">
        {{ csrf_field() }}
        <div>
            <label>Name</label>
            <input name="name" type="name" value="{{ old("name") }}">
        </div>
        <div>
            <button type="submit">Save</button>
        </div>
    </form>
</div>
@endsection