<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;

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
        $user = User::find(Auth::id());
        if($user->hasRole('admin')){
            $this->redirectTo = route('admin.user.index');
            return $this->redirectTo;
        }elseif($user->hasRole('packer')){
            $this->redirectTo = route('packer.index');
            return $this->redirectTo;
        }elseif($user->hasRole('delivery')){
            $this->redirectTo = route('delivery.index');
            return $this->redirectTo;
        }elseif($user->hasRole('seller')){
            $this->redirectTo = route('seller.company.dashboard');
            return $this->redirectTo;
        }else{
            $this->redirectTo = route('home');
            return $this->redirectTo;
        }
    }
}