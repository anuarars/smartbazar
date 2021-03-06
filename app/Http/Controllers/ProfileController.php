<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\{Order, User, Address};
use Illuminate\Support\Facades\{Auth, Hash};

class ProfileController extends Controller
{
    public function index(){
        $orders= Auth::user()->order;
        $orders = $orders->load('status');
        return view('user.profile', compact('orders'));
    }

    public function address(){
        return view('user.address');
    }

    public function addressCreate(Request $request)
    {
        $user = Auth::user();
        $address = implode(', ', $request->all());
        if ($user->address) {
            $user->address()->update(['description' => $address]);
        } else {
            $user->address()->create(['description' => $address]);
        }
    }

    public function addressUpdate(Request $request, Address $address){
        $user = User::find(Auth::id());
        $data = [
            'name' => $request->name,
            'city' => 'Астана',
            'home' => $request->home,
            'unit' => $request->unit,
            'street' => $request->street
        ];

        $address->update($data);
        return redirect()->route('profile.address')->with('success','Адрес успешно добавлен');;
    }

    public function addressRemove(Request $request, Address $address){
        $address->delete();
        return redirect()->back()->with('success','Адрес удален');
    }

    public function password(){
        return view('user.password');
    }

    public function passwordUpdate(Request $request){
        $user = User::find(Auth::id());
        if(Hash::check($request->password_current, $user->password)){
            $user->update([
                'password'=>bcrypt($request->password_new)
            ]);
            return redirect()->back()->with('success','Пароль успешно изменен');
        }else{
            return redirect()->back()->with('error','Старый пароль недействителен');
        }
    }

    public function history(){
        $orders = Order::where('user_id', Auth::id())->where('status_id', '!=', '1')->with('items.product')->get();
        return view('user.history', compact('orders'));
    }


    public function info(){
        return view('user.info');
    }

    public function infoUpdate(Request $request){
        $user = User::find(Auth::id());
        $user->update([
            'firstname' => $request->firstname,
            'lastname' => $request->lastname,
            'login' => $request->login,
            'phone' => $request->phone
        ]);
        
        return redirect()->route('profile.index');
    }
}