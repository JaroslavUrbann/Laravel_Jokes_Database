@extends("layouts.app")

@section("content")
<div class="container">
    <form method="POST" action="{{ url("/update/joke") }}" id="editform">
        {{ csrf_field() }}
        <div>
            <label>Text</label>
        <textarea class="form-control" rows="4" name="text" type="text" form="editform">{{$joke->text}}</textarea>
        <input type="hidden" name="id" value="{{$joke->id}}">
        </div>
        <div>
            <button type="submit">Update</button>
        </div>
    </form>
</div>
@endsection