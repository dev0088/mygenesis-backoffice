<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;


class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('home');
    }
    public function candidates()
    {
        return view('candidates');
    }
    public function permit()
    {
        return view('permit');
    }
    public function jobs()
    {
        return view('jobs');
    }
    public function settings()
    {	
    	$allusers=DB::table('users')->get();
        return view('settings')->with(compact('allusers'));
    }     
    public function addregister(Request $request){
        $this->validate($request, [
		    'name' => 'required|string|max:255',
		    'email' => 'required|string|email|max:255|unique:users',
		    'password' => 'required|string|min:6|confirmed',
		]);    	  	    	
    	$user = new User();    	
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password =Hash::make($request->password);
        $user->save();
        return Redirect::route('settings');
    }
    public function destroy($id)
    {
    	$setting=DB::table('users')->where('id',$id)->delete();    	
    	return Redirect::route('settings');
    }   
}
