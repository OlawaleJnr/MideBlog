<?php

namespace App\Http\Controllers\Admin\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class LoginController extends Controller
{
    /**
     * Only guests for "admin" guard are allowed except for logout
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest:admin')->except('logout');
    }

    /**
     * Show Admin Login Form
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return  view('auth.admin');
    }

    /**
     * Login the admin
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function login(Request $request)
    {
        $data = $request->all();

        $rules = [
            'email' => 'required|string|email|max:255',
            'password' => 'required|string|max:255',
        ];

        $validator = Validator::make($data, $rules);

        if($validator->fails()) {
            // not acceptable response
            return response()->json(['error' => $validator->errors()], 406);
        } else {
            // attempt login
            if(Auth::guard('admin')->attempt(array('email' => $data['email'], 'password' => $data['password']), $request->filled('remeber'))) {
                // Authenticated, redirect to admin intended route
                // success response
                return response()->json(['success' => 'Authentication Successful', 'redirectTo' => route('admin.home')], 200);
            } else {
                // bad request response
                return  response()->json(['error' => 'These credentials do not match our record'], 400);
            }
        }
    }

	/**
	* Logout Admin out of the Application
	*
	* @param  \Illuminate\Http\Request  $request
	* @return \Illuminate\Http\Response
	*/
    public function logout(Request $request)
    {
        Auth::guard('admin')->logout();
        $request->session()->invalidate();
		return response()->json(['redirectTo' => route('admin.login')], 200);
    }
}
