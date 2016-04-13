
@extends('_layouts.default')

@section('main')
<div class="col-sm-8 blog-main">
    @foreach ($articles as $article)
    <div class="blog-post">
    <h2 class="blog-post-title"><a href="{{ URL::to('article/'.$article->id) }}">{{$article->title}}</a></h2>
    <p class="text-muted"><a href="{{URL::to('article/'.$article->id.'/edit')}}">edit</a><a href="{{URL::to('article/'.$article->id.'/delete')}}">delete</a></p>
      <p class="blog-post-meta">{{$article->updated_at}}by <a href="#">{{$article->user->nickname}}</a></p>
        <blockquote>

          {{$article->summary}}

        </blockquote>         
       
    </div><!-- /.blog-post -->

    @endforeach

 {{$articles->links()}} 

  </div><!-- /.blog-main -->
@stop