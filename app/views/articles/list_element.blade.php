
<div class="">
	<div class="blog-card ">

		<div class="blog-card-header ">
			<div class="row">
				<div class="col-lg-6 col-xs-6 blog-card-title">
					<h2><a href="{{ URL::to('article/'.$article->id) }}">{{$article->title}}</a>
					</h2>
				</div>
				@if(Auth::check() && Auth::id() == $article->user_id)
				<div class="col-lg-6 col-xs-6 ">
					<div class="col-lg-4 col-lg-push-8 col-md-6 col-md-push-6 col-sm-8 col-sm-push-4 col-xs-8 col-xs-push-4 blog-card-buttons">
						<div class="pull-right"><a href="{{URL::to('/article/'.$article->id.'/edit')}}"><span class="blog-card-button glyphicon glyphicon-edit"></span></a><a href="{{URL::to('/article/'.$article->id.'/delete')}}"><span class="blog-card-button glyphicon glyphicon-remove"></span></a></div>
					</div>
				</div>
				@endif
			</div>
		</div>
		<div class="blog-card-content">
			<blockquote>
				{{$article->summary}}
			</blockquote>         
		</div>
		
		<div class="row">
			<div class="blog-card-foot pull-right ">
				<p>Updated at {{$article->updated_at}} by <a href="#">{{$article->user->nickname}}</a></p>
			</div>
		</div>
		
	</div>
</div><!-- /.blog-card -->