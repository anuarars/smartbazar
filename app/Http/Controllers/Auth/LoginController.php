<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
// use App\Models\User;

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
    //protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function redirectTo(){
        if(Auth::user()->hasRole('admin')){
            $this->redirectTo = route('admin.user.index');
            return $this->redirectTo;
        }elseif(Auth::user()->hasRole('packer')){
            $this->redirectTo = route('packer.index');
            return $this->redirectTo;
        }elseif(Auth::user()->hasRole('delivery')){
            $this->redirectTo = route('delivery.index');
            return $this->redirectTo;
        }elseif(Auth::user()->hasRole('seller')){
            $this->redirectTo = route('seller.product.index');
            return $this->redirectTo;
        }else{
            $this->redirectTo = route('home');
            return $this->redirectTo;
        }
    }
}
