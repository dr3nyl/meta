<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Events\WebSocketDemoEvent;

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

        broadcast(new WebSocketDemoEvent('Some data'));
        
        if (Auth::user()->role == 0)
        {
            return view('home', ['role' => 'Admin']);
        }
        else
        {
            return view('admin.index3', ['role' => 'Client']);
        }
    }

    public function admin3()
    {

        return view('admin.index3');
    }

}
