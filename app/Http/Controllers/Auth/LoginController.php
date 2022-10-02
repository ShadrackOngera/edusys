<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use http\Client\Request;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Validation\Validator;
use Symfony\Component\Console\Input\Input;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function login_post( Request $request )
    {
        $data = Input::except( array( '_token' ) );

        // var_dump($data);

        $rule = array(
            'email'    => 'required|email',
            'password' => 'required',
        );

        $validator = Validator::make( $data, $rule );

        if ($validator->fails()) {
            // should do something
        } else {
            // no need to populate $data again with the same values
            // $data = Input::except( array( '_token' ) );

            if (Auth::attempt( $data )) {
                // here i want to check logged in user role
                $user = Auth::user();

                if ($user->roles->pluck( 'name' )->contains( 'admin' )) {
                    return Redirect::to( '/admin-dashboard' );
                }

                return Redirect::to( '/dashboard' );
            }
        }
    }
}
