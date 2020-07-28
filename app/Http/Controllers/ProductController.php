<?php

namespace App\Http\Controllers;

use App\Cart;
use App\Product;
use App\Order;
use App\City;
use Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Session;
use App\User;

class ProductController extends Controller
{
    public function getIndex(){
        $products = Product::all();
        return view('shop.index', ['products' => $products]);
    }

    public function getAddToCart(Request $request, $id){
        $product = Product::find($id);
        $oldCart = Session::has('cart') ? Session::get('cart') : null;
        $cart = new Cart($oldCart);
        $cart->add($product, $product->id);

        $request->session()->put('cart', $cart);
        return redirect()->route('product.shop');
    }
    public function getReduceByOne($id){
        $oldCart = Session::has('cart') ? Session::get('cart') : null;
        $cart = new Cart($oldCart);
        $cart->reduceByOne($id);

        if (count($cart->items)>0){
            Session::put('cart',$cart);
        } else {
            Session::forget('cart');
        }
        return redirect()->route('product.shoppingCart');
    }
    public function getRemoveItem($id){
        $oldCart = Session::has('cart') ? Session::get('cart') : null;
        $cart = new Cart($oldCart);
        $cart -> removeItem($id);

        if (count($cart->items)>0){
            Session::put('cart',$cart);
        } else {
            Session::forget('cart');
        }

       
        return redirect()->route('product.shoppingCart');
    }

    public function getCart(){
        if (!Session::has('cart')){
            return view('shop.shopping-cart');
        }
        $oldCart = Session::get('cart');
        $cart = new Cart($oldCart);
        return view('shop.shopping-cart', ['products' => $cart->items, 'totalPrice' =>$cart->totalPrice]);
    }

    public function getCheckout(){
        if (!Session::has('cart')){
            return view('shop.shopping-cart');
        }
        $oldCart = Session::get('cart');
        $cart = new Cart($oldCart);
        $total = $cart->totalPrice;
        return view('shop.checkout', ['total' => $total]);
    }

    public function postCheckout(Request $request){
        $oldCart = Session::get('cart');
        $cart = new Cart($oldCart);
        $totalQty = $cart->totalQty;
       
        $user = User::find(Auth::user()->id);
        $user->total_books=$user->total_books+$totalQty;
        $user->save();

        $city = $user->city;

     
        $totalBooks = DB::table('cities')
            ->where('city_name', $city)
            ->sum('totalBooks');



        $table = DB::table('cities')->updateOrInsert(
            ['city_name' => $city],
            ['totalBooks' => $totalBooks + $totalQty]
        );
        
         $products = Product::all();
         $orders = Order::all();
         $orders->transform(function($order, $key){
           $order->cart = unserialize($order->cart);
           return $order;
       });
       
            foreach ($cart->items as $item){
                foreach($products as $product){
                   if ( $product->title == $item['item']['title']){
                       $product->total_sales = $product->total_sales + $item['qty'];
                       $product->save();
                   }
                }
            }
       


           
        


        $order = new Order();
        $order->cart = serialize($cart);

        Auth::user()->orders()->save($order);
        Session::forget('cart');
        return redirect()->route('product.shop');
    }

}
