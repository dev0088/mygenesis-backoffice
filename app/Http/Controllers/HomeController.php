<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;

class HomeController extends Controller
{
    public function users()
    {
        return view('users');
    }

    public function convenience(){
    	return view('convenience');
    }

	public function qa(){
    	return view('qa');
    }

    public function payers(){
        return view('payers');
    }

    public function advertisers(){
        return view('advertisers');
    }

    public function ads(){
        return view('ads');
    }

    public function tinalab(){
        return view('tinalab');
    }

    public function imageUpload(Request $request)
    {
        if ($request->images) {
            $image = $request->images;
            $imagesName = $image->getClientOriginalName();
            $path = base_path() . '/public/img';
            $image->move($path, $imagesName);
            return response()->json($imagesName);
        }
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
        echo $res->getStatusCode();
        // echo $res->getHeader('content-type');
        // $xml = simplexml_load_string($res->getBody());
        $xml = simplexml_load_string($res->getBody());
        if ($xml->job){
            echo "jobs are exist";
        }
        $jobs_data = [];
        $ind = 0;
        foreach ($xml->job as $job) {
            // $jobs_data[$ind]['date'] = (string)$job->date;
            // $jobs_data[$ind]['title'] = (string)$job->title;
            // $jobs_data[$ind]['id'] = (string)$job->id;
            // $jobs_data[$ind]['contract_type'] = (string)$job->contract_type;
            // $jobs_data[$ind]['description'] = (string)$job->description;
            // $jobs_data[$ind]['position'] = (string)$job->position;
            // $jobs_data[$ind]['profile'] = (string)$job->profile;
            // $jobs_data[$ind]['url'] = (string)$job->url;
            // $jobs_data[$ind]['location'] = (string)$job->location;
            // $jobs_data[$ind]['postcode'] = (string)$job->postcode;
            // $jobs_data[$ind]['country'] = (string)$job->country;
            // $jobs_data[$ind]['salary'] = (string)$job->salary;
            // $jobs_data[$ind]['rome'] = (string)$job->rome;
            // $ind++;
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
        var_dump(json_encode($jobs_data));
        return json_encode($jobs_data);
    }
}