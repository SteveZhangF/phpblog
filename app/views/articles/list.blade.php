
@extends('_layouts.default')

@section('main')
<div class="col-sm-12 col-md-12 col-lg-12 blog-main">
	@foreach ($articles as $article)
		@include('articles.list_element')
	@endforeach
	{{$articles->links()}} 
</div><!-- /.blog-main -->
@stop