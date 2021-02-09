<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
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
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }
    public function admin(){
        $usersall=User::All();
        $users = [];
        foreach($usersall as $user){
            if($user->is_admin!=1){
                array_push($users, $user);
            }
        }
        return view('admin')->with('users', $users);
    }
}
