@extends('_layouts.default')



@section('main')

<div class="container">

<div class="col-lg-6 col-md-8">

  <br/>

  @if (Session::has('message'))

    <div class="alert alert-{{ Session::get('message')['type'] }}" data-am-alert>

      <p>{{ Session::get('message')['content'] }}</p>

    </div>

  @endif

  @if ($errors->has())

    <div class="alert alert-danger" >

      <p>{{ $errors->first() }}</p>

    </div>

  @endif

  {{ Form::open(array('url' => 'register')) }}
    
    {{ Form::label('email', 'E-mail:') }}

    {{ Form::email('email', Input::old('email')) }}

    <br/>

    {{ Form::label('nickname', 'NickName:') }}

    {{ Form::text('nickname', Input::old('nickname')) }}

    <br/>

    {{ Form::label('password', 'Password:') }}

    {{ Form::password('password') }}

    <br/>

    {{ Form::label('password_confirmation', 'ConfirmPassword:') }}

    {{ Form::password('password_confirmation') }}

    <br/>

    <div class="am-cf">

      {{ Form::submit('Register', array('class' => 'am-btn am-btn-primary am-btn-sm am-fl')) }}

    </div>

  {{ Form::close() }}

  <br/>

</div>

</div>

@stop
