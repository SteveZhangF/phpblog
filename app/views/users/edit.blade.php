@extends('_layouts.default')



@section('main')



<div class="am-u-lg-6 am-u-md-8">

	<br/>

	@if (Session::has('message'))

	<div class="alert alert-{{ Session::get('message')['type'] }}" >

		<p>{{ Session::get('message')['content'] }}</p>

	</div>

	@endif

	@if ($errors->has())

	<div class="alert alert-danger" >

		<p>{{ $errors->first() }}</p>

	</div>

	@endif


	{{ Form::model($user, array('url' => 'user/' . $user->id, 'method' => 'PUT', )) }}
	<div class="row">
		<div class="col-md-6">
			<div class="form-group">
				{{ Form::label('email', 'E-mail:') }}

				<input id="email" name="email" type="email" class="form-control" readonly="readonly" value="{{ $user->email }}"/>
			</div>
			<br/>
			<div class="form-group">
				{{ Form::label('nickname', 'NickName:') }}

				<input id="nickname" name="nickname" type="text" class="form-control" value="{{  $user->nickname }} "/>
			</div>
			<br/>

			{{ Form::label('old_password', 'OldPassword:') }}

			{{ Form::password('old_password',array('class'=>'form-control')) }}

			<br/>

			<div class="form-group">
				{{ Form::label('password', 'NewPassword:') }}

				{{ Form::password('password',array('class'=>'form-control')) }}
			</div>
			<br/>

			<div class="form-group">
				{{ Form::label('password_confirmation', 'ConfirmPassword:') }}

				{{ Form::password('password_confirmation',array('class'=>'form-control')) }}
			</div>
			<br/>
		</div>
		<div class="col-md-6">
			<div class="form-group">
				<label>About Me:</label>
				<textarea class="form-control" name="about" id="about" value="">{{$user->about}}</textarea>
			</div></div>
		</div>

		{{ Form::submit('Modify', array('class' => 'btn btn-primary ')) }}


		{{ Form::close() }}

		<br/>


	</div>

	@stop