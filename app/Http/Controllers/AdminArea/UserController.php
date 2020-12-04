<?php

namespace App\Http\Controllers\AdminArea;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;

class UserController extends Controller
{

  
    protected $users;

    public function __construct()
    {
        $this->users = new User();
    }
    
    public function index()
    {
        $response['users'] = $this->users->get();

        return view('AdminArea/pages/Users/all')->with($response);
    }



    public function checkEmail(Request $request)
    {
        if ($request->get('email')) {
            $email = $request->get('email');

            $data = $this->users->where('email', $email)->count();

            if ($data > 0) {
                echo 'not_unique';
            } else {
                echo 'unique';
            }
        }
    }

}