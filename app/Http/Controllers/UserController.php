<?php
namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\MessageBag;

class UserController extends Controller
{
	//Sign up
	public function signUp(Request $request) 
	{
		$this->validate($request, [
			'su_email' => 'required|email|unique:users,email',
			'su_first_name' => 'required|max:100',
			'su_last_name' => 'required|max:100',
			'su_password' => 'required|min:4'
		]);

		$first_name = $request['su_first_name'];
		$last_name = $request['su_last_name'];
		$email = $request['su_email'];
		$password = bcrypt($request['su_password']);

		$user = new User();
		$user->first_name = $first_name;
		$user->last_name = $last_name;
		$user->email = $email;
		$user->password = $password;

		$user->save();
		//Log user in
		Auth::login($user);

		return redirect()->route('home');
	}
	//Sign in
	public function signIn(Request $request)
	{
		$this->validate($request, [
			'si_email' => 'required|email',
			'si_password' => 'required|min:4'
		]);
		if(Auth::attempt(['email' => $request['si_email'], 'password' => $request['si_password']])) {
			return redirect()->route('home');
		}
		$errors = new MessageBag(['login' => ['Email and/or password invalid.']]);

		return redirect()->back()->withErrors($errors);
	}
	//Logout
	public function logOut() {
		Auth::logout();
		return redirect()->route('home');
	}
	//Get my account page
	public function myAccount() {

		return view('includes.accountform');
	}
	//Update account
	public function updateAccount(Request $request) {

		//validate
		
		$user = User::find(Auth::user()->id);


		$first_name = $request['first_name'];
		$last_name = $request['last_name'];
		$email = $request['email'];
		$password = null;
		if($request->has('password'))
			$password = bcrypt($request['password']);
		
		$user->first_name = $first_name;
		$user->last_name = $last_name;
		$user->email = $email;
		if($password)
			$user->password = $password;

		$user->update();
		
		$request->session()->flash('success', 'Account successfully updated!');
		return redirect()->back();
	}
	//Get doctors
	public function getDoctors() {
		
		$user = User::find(Auth::user()->id);
		return view('includes.doctors', ['doctors' => $user->doctors, 'route' => 'doctor.manage']);
	}
}