@extends("layouts.app")

@section("content")
<div class="container">

    <div class="row row-offcanvas row-offcanvas-right">

      <div class="col-12 col-md-9">
        <h1>Jokes</h1>
        @if($jokes)
            @foreach($jokes as $joke)
                <div class="well">
                    <h3>{{$joke->text}}</h3>
                </div>
                <hr>
            @endforeach
        @else
            <p>There are no jokes here</p>
        @endif
      </div><!--/span-->

      <div class="col-6 col-md-3 sidebar-offcanvas" id="sidebar">
        @if($categories)
        <div class="list-group">
                <a href="{{ url("/jokes/all") }}" class="list-group-item">All</a>
            @foreach($categories as $category)
                <a href="{{ url("/jokes/" . $category->id) }}" class="list-group-item">{{$category->name}}</a>
            @endforeach
        </div>
        @endif
      </div>
    </div>

  </div>
@endsection