<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;

class UserController extends Controller
{
    public function edit(){
        if(Auth::user()){
            $user = User::find(Auth::user()->id);

            if ($user){
            return view('user.edit')->withUser($user);
            } else {
                return redirect() -> back();
            }
        } else {
                 return redirect() -> back();
        }
    }
    public function show(){
        if(Auth::user()){
            $user = User::find(Auth::user()->id);

            if ($user){
            return view('user.change')->withUser($user);
            } else {
                return redirect() -> back();
            }
        } else {
                 return redirect() -> back();
        }
    }
    

    public function update(Request $request){
       
        $user = User::find(Auth::user()->id);
        if ($user){
            
            if(Auth::user()->email === $request['email']){
                $validate = $this->validate($request, [
                    'name' => 'required|min:2',
                    'email' => 'required|email',
                    
                ]);
            } else {
                $validate = $this->validate($request, [
                    'name' => 'required|min:2',
                    'email' => 'required|email|unique:users',
                    
                ]);
            }
           
            
            $user->name = $request['name'];
            $user->email = $request['email'];
            $user->address = $request['address'];
            

            $user->save();
                $request->session()->flash('success','Yout details have now been updated');
            return redirect()->back();
           
        } else {
            return redirect()->back(); 
        }

  

    }

   public function change(Request $request){
    $user = User::find(Auth::user()->id);

    $validate = $this->validate($request, [
        'password' => 'required|string|min:6|confirmed',
        
    ]);
     $user->password =bcrypt($request['password']);
            

     $user->save();
     $request->session()->flash('success','Yout details have now been updated');
     return redirect()->back();
   }

   public function getOrders(){
       $orders = Auth::user()->orders;
       $orders->transform(function($order, $key){
           $order->cart = unserialize($order->cart);
           return $order;
       });
       return view('user.orders', ['orders' => $orders]);
   }
   
}
