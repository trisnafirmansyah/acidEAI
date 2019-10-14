<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\RequestException;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }
    
    public function prayerTime($location)
    {
        $client = new Client(['base_uri' => 'https://muslimsalat.p.rapidapi.com/']);
        $req = $client->request('GET',$location.'.json',[
            'header' => [
                "x-rapidapi-host: muslimsalat.p.rapidapi.com",
		"x-rapidapi-key: 84691f6589msh088a2993b120dafp13d550jsn8808351a4132"
            ]
        ]);

        $res = json_decode($req->body);

        dd($res);
    }
}