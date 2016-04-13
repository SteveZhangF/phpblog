@extends('_layouts.default')

@section('main')

<div class="row">

  <div class="col-sm-8 blog-main">
    @foreach ($articles as $article)
    <div class="blog-post">
    <h2 class="blog-post-title"><a href="{{ URL::to('article/'.$article->id) }}">{{$article->title}}</a></h2>
      <p class="blog-post-meta">{{$article->updated_at}}by <a href="#">{{$article->user->nickname}}</a></p>
        <blockquote>

          {{$article->summary}}

        </blockquote>         
       
    </div><!-- /.blog-post -->

    @endforeach

 {{$articles->links()}} 

  </div><!-- /.blog-main -->

  <div class="col-sm-3 col-sm-offset-1 blog-sidebar">
    <div class="sidebar-module sidebar-module-inset">
      <h4>About</h4>
       @if (Auth::check())
      <p>{{ Auth::user()->about }}</p>
      @else
      Ok, let's go!
      @endif
    </div>
    <div class="sidebar-module">
      <h4>Archives</h4>
      <ol class="list-unstyled">
        @foreach ($articles as $article)
        <li><a href="{{ URL::to('article/'.$article->id) }}">{{$article->title}}</a></li>
        @endforeach
      </ol>
    </div>
   
  </div><!-- /.blog-sidebar -->

</div><!-- /.row -->

@stop