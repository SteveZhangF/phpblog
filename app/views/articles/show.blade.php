@extends('_layouts.default')

@section('main')

<div class="row">
	
	<div class="col-md-12">

		<br/>
		<div class="blog-post">
			<h2 class="blog-post-title">{{  $article->title  }}</h2>
			<p class="blog-post-meta">{{ $article->updated_at }} by <a href="#">{{  $article->user->nickname  }}</a></p>

			<blockquote>

				{{$article->summary}}

			</blockquote>          

		</p>

		{{ $article->content }}
	</div>
</div>
</div>

@stop