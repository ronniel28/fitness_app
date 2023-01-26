<?php

namespace App\Http\Controllers;


use App\Helpers\Helper;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use GuzzleHttp\Client;

class AuthController extends Controller
{
    public function __construct() 
    {
        $this->helper = new Helper();
    }

    public function loginApi(Request $request)
    {
       
        $authenticate = $this->helper->FitnessAppApiCall('post', 'login',[
            'email' => $request->email,
            'password' => $request->password
        ]);

        return dd($authenticate);
        // $http = new \GuzzleHttp\Client;
        // $response = $http->post('http://127.0.0.1:8000/api/login',[
        //     'headers' => [
        //         'Authorization' => 'Bearer' .session()->get('token.access_token')
        //     ],
        //     'query' =>[
        //         'email' => 'ronnielderamosadmin@gmail.com',
        //         'password' => 'Test1234!'
        //     ]

        //     ]);
      
        //     $result = json_decode((string)$response->getBody(),true);
        //     return dd($result);
       
    }

    public function loginPage()
    {
        return view('auth.login');
    }

    public function registerPage()
    {
        return view('auth.register');
    }
}
