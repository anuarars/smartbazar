<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use App\Models\Role;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use GuzzleHttp;
use GuzzleHttp\Client;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::VERIFY;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'firstname' => ['required', 'string', 'max:255'],
            'lastname' => ['required', 'string', 'max:255'],
            'phone' => ['required', 'string', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        $removedSymbols = preg_replace("/[^a-zA-Z0-9\s]/", "", $data['phone']);
        $phoneNumber = str_replace(' ', '', $removedSymbols);

        $user = User::create([
            'firstname' => $data['firstname'],
            'lastname' => $data['lastname'],
            'phone' => $data['phone'],
            'password' => Hash::make($data['password']),
            'phone_verify_code' => rand(1000, 9999)
        ]);

        $client = new Client();
        $client->post('http://kazinfoteh.org:9507/api?action=sendmessage&username=smartbaza1&password=kJ6uViovf&recipient='.$phoneNumber.'&messagetype=SMS:TEXT&originator=SMARTBAZAR&messagedata=Код подтверждения для SMARTBAZAR.KZ: '.$user->phone_verify_code.'');

        $role = Role::select('id')->where('name', 'user')->first();
        $user->roles()->attach($role);

        return $user;
    }
}