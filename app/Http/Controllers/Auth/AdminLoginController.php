<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class AdminLoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Admin Login Controller
    |--------------------------------------------------------------------------    |
    */

    public function __construct()
    {
        $this->middleware('guest:web');
    }

    public function index() {
        return view("auth.admin-login");
    }

    public function login(Request $request){
        $request->validate([
            'email' => 'required|string',
            'password' => 'required|string',
        ]);
        $credentials = [
            'email' => $request->email ,
            'password' => $request->password
        ];
        $authOK = Auth::guard('admin')->attempt($credentials, $request->remember);
        
        if($authOK){
            return redirect()->intended(route('admin.dashboard'));
        } 
        return redirect()->back()->withInputs($request->only('email', 'remember'));
    }
}
