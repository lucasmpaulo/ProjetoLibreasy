<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Biblioteca;

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
    public function indexView()
    {
        $bibliotecas = Biblioteca::all();
        // $id = $bibliotecas->id;
        // $lista = Biblioteca::where('id', $id)->paginate(3);
        return view('home', compact('bibliotecas'));
    }
    public function ajuda() {
        return view('ajuda');
    }
    
}