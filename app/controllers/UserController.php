<?php

class UserController extends \BaseController {

	public function login()

	{

		$rules = array(

			'email'       => 'required|email',

			'password'    => 'required|min:6',

			
			);

		$validator = Validator::make(Input::all(), $rules);

		if ($validator->passes()){

			if (Auth::attempt(array(

				'email'    => Input::get('email'),

				'password' => Input::get('password'),

				) ))

			{

				return Redirect::to('/');

			} else {

				return Redirect::to('login')->withInput()->with('message', 'E-mail or password error');

			}

		} else {

			return Redirect::to('login')->withInput()->withErrors($validator);

		}

	} 

	public function logout(){
		Auth::logout();
		return Redirect::to('/');
	}

	public function register(){
		

		$rules = array(

			'email' => 'required|email|unique:users,email',

			'nickname' => 'required|min:4|unique:users,nickname',

			'password' => 'required|min:6|confirmed',

			);

		$validator = Validator::make(Input::all(), $rules);

		if ($validator->passes())

		{

			$user = User::create(Input::only('email', 'password', 'nickname'));

			$user->password = Hash::make(Input::get('password'));

			if ($user->save())

			{

				return Redirect::to('/register')->with('message', array('type' => 'success', 'content' => 'Register successfully, please login'));

			} else {

				return Redirect::to('register')->withInput()->with('message', array('type' => 'danger', 'content' => 'Register failed'));

			}

		} else {

			return Redirect::to('register')->withInput()->withErrors($validator);

		}


	}

	public function edit($id)

	{

		if (Auth::user()->is_admin or Auth::id() == $id) {

			return View::make('users.edit')->with('user', User::find($id));

		} else {

			return Redirect::to('/');

		}

	}
	public function update($id)

	{

		if (Auth::user()->is_admin or (Auth::id() == $id)) {

			$user = User::find($id);

			$rules = array(

				'password' => 'required_with:old_password|min:6|confirmed',

				'old_password' => 'min:6',

				);

			if (!(Input::get('nickname') == $user->nickname))

			{

				$rules['nickname'] = 'required|min:4||unique:users,nickname';

			}

			$validator = Validator::make(Input::all(), $rules);

			if ($validator->passes())

			{

				if (!(Input::get('old_password') == '')) {

					if (!Hash::check(Input::get('old_password'), $user->password)) {

						return Redirect::route('user.edit', $id)->with('user', $user)->with('message', array('type' => 'danger', 'content' => 'Old password error'));

					} else {

						$user->password = Hash::make(Input::get('password'));

					}

				}

				$user->nickname = Input::get('nickname');

				$user->about = Input::get('about');

				$user->save();

				return Redirect::route('user.edit', $id)->with('user', $user)->with('message', array('type' => 'success', 'content' => 'Modify successfully'));

			} else {

				return Redirect::route('user.edit', $id)->withInput()->with('user', $user)->withErrors($validator); 

			}

		} else {

			return Redirect::to('/');

		}

	}


}
