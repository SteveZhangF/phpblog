@extends('_layouts.default')

@section('main')

<div class=" row">

	<div class="col-md-12">

		{{ Form::open(array('url' => 'article','class' => 'form-horizontal')) }}

		<div class="row">
			<h1 class="col-lg-10">Publish Article</h1>
			<button type="submit" class="col-lg-2 btn btn-success pull-right"><span class="glyphicon glyphicon-send"></span> Publish</button>
		</div>
		<hr/>

		@if ($errors->has())

		<div class="alert alert-danger" >

			<p>{{ $errors->first() }}</p>

		</div>

		@endif

		

		<div class="form-group">
			<input class="form-control"  placeholder="Title" id="title" name="title" type="text" value="{{ Input::old('title') }}"/>
		</div>

		<div class="form-group">
			<div id="content" name="content" >{{ Input::old('content') }}
			</div>
		</div>

		
		{{ Form::close() }}

	</div>


</div>
<script src="//cdn.tinymce.com/4/tinymce.min.js"></script>
<script>
	$(function(){
		tinymce.init({
			selector: '#content',
			height: 500,
			plugins: [
			'advlist autolink lists link image charmap print preview anchor',
			'searchreplace visualblocks code fullscreen',
			'insertdatetime media table contextmenu paste code'
			],
			toolbar: 'insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image',
			content_css: [
			'//fast.fonts.net/cssapi/e6dc9b99-64fe-4292-ad98-6974f93cd2a2.css',
			'//www.tinymce.com/css/codepen.min.css'
			]
		});
	});


</script>

@stop