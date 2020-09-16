<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;
use GuzzleHttp\Client;

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
    public function getJobs()
    {
        ini_set('max_execution_time', 0);
        $options = [
            'http_errors' => true,
            'force_ip_resolve' => 'v4',
            'connect_timeout' => 500,
            'read_timeout' => 500,
            'timeout' => 500,
        ];
        $client = new Client();
        $res = $client->request('GET', 'https://genesis.softy.pro/flux',$options);
        // echo $res->getStatusCode();
        // echo $res->getHeader('content-type');
        // $xml = simplexml_load_string($res->getBody());
        $xml = simplexml_load_string($res->getBody());
        $jobs_data = [];
        $ind = 0;
        foreach ($xml->job as $job) {
          $jobs_data[]=[
            'date'=>(string)$job->date,
            'title'=>(string)$job->title,
            'id'=>(string)$job->id,
            'contract_type'=>(string)$job->contract_type,
            'description'=>(string)$job->description,
            'position'=>(string)$job->position,
            'profile'=>(string)$job->profile,
            'url'=>(string)$job->url,
            'location'=>(string)$job->location,
            'postcode'=>(string)$job->postcode,
            'country'=>(string)$job->country,
            'salary'=>(string)$job->salary,
            'rome'=>(string)$job->rome,
          ];
        }
        return json_encode($jobs_data);
    }
}
