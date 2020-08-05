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
        $index = 0;
        $xml = simplexml_load_string($res->getBody());
        echo $xml;
        foreach ($xml->jobs->job as $element) {
          foreach($element as $key => $val) {
           $jobs_data[$index][$key] = $val;
           echo "jobs_data{$index}/{$key}: {$val}";
          }
          $index ++;
        }
        return $jobs_data;
    }
}