<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Auth;
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
        $view = '';
        switch (Auth::user()->rol) {
            case 3:
                $view = 'administrador.home';
                break;
            
            case 2:
                $view = 'bibliotecario.home';
                break;
            
            default:
                $view = 'estudiante.home';
                break;
        }
        return view($view);
    }
}
