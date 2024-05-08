<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\LoginRequest;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    /**
     * Display login page.
     *
     * @return Renderable
     */
    public function show()
    {
        return view('auth.login');
    }
    public function perform()
    {
        return view('admin/landingpage');
    }

    /**
     * Handle account login request
     *
     * @param LoginRequest $request
     *
     * @return \Illuminate\Http\Response
     */
    public function login(LoginRequest $request)
    {
        $credentials = $request->getCredentials();

        if(!Auth::validate($credentials)):
            return redirect()->to('login')
                ->withErrors(trans('auth.failed'));
        endif;

        $user = Auth::getProvider()->retrieveByCredentials($credentials);

        Auth::login($user);

        return $this->authenticated($request, $user);
    }

    /**
     * Handle response after user authenticated
     *
     * @param Request $request
     * @param Auth $user
     *
     * @return \Illuminate\Http\Response
     */
    protected function authenticated(Request $request, $user)
    {
        return redirect('dashboard');
    }

//     protected function validator(array $data)
// {
// return Validator::make($data, [

// 'email' => 'required|string|email|max:255|unique:users',
// 'password' => 'required|string|min:6|confirmed',
// 'g-recaptcha-response' => 'required|captcha',
// ]);

// // Write here your database logic

// \Session::put('success', 'Youe Request Submited Successfully..!!');
// return redirect()->back();
// }
}
