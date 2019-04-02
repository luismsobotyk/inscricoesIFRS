<?php

namespace App\Http\Controllers;


use App\Login_log;
use App\Permission;
use Illuminate\Http\Request;

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

    public function updateLoginLogTable(){
        $loginLog= new Login_log();
        $loginLog->user_id= auth()->user()->id;
        $loginLog->ipAdress= request()->ip();
        $loginLog->save();
        return redirect()->action('HomeController@index');
        //$teste= Permission::find(auth()->user()->id);
        //return dd();
    }
}
