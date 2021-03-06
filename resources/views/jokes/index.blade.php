@extends("layouts.app")

@section("content")
<div class="container">

    <div class="row row-offcanvas row-offcanvas-right">

        <div class="col-12 col-md-9">
            <h1>Jokes</h1>
            @if($jokes)
            <hr>
                @foreach($jokes as $joke)
                <div class="d-flex justify-content-between align-items-center">
                    <p style="max-width: 600px; overflow-wrap: break-word; word-wrap: break-word;">{{$joke->text}}</p>
                    <div class="d-flex justify-content-between align-items-center">
                        <a href="{{ url("/edit/joke/" . $joke->id) }}" class="close" style="padding-right:20px">edit</a>
                        <a href="{{ url("/delete/joke/" . $joke->id) }}" class="close">X</a>
                    </div>
                </div>
                <hr>
                @endforeach
            @else
            <p>There are no jokes here</p>
            @endif
        </div><!--/span-->

        <div class="col-6 col-md-3 sidebar-offcanvas" id="sidebar">
            @if($categories)
            <ul class="list-group">
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                        <a href="{{ url("/category/all") }}">All</a>
                    </li>
                    @foreach($categories as $category)
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                        <a style="max-width: 200px; overflow-wrap: break-word; word-wrap: break-word;" href="{{ url("/category/" . $category->id) }}">{{$category->name}}</a>
                        <a href="{{ url("/delete/category/" . $category->id) }}" class="close">X</a>
                    </li>
                    @endforeach
                  </ul>
            @endif
        </div>
    </div>

  </div>
@endsection