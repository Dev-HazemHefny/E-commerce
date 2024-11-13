<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\Product;
use App\Models\User;
use App\Models\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Types\Relations\Car;
use Stripe;
use Session;


class HomeController extends Controller
{
        public function index()
        {
            $users = User::where('usertype','user')->get()->count();
            $products = Product::all()->count();
            $orders = Order::all()->count();
            $deliveredorders = Order::where('status','Order Delivered')->get()->count();
            return view('admin.index',compact('users','products','orders','deliveredorders'));
        }
        public function home()
        {
            $products = Product::all();
            if(Auth::id())
            {

                $user = Auth::user();
                $userid = $user->id;
                $count = Cart::where('user_id',$userid)->count();
            }
            else{$count = ' ';}
            return view('home.index',compact('products','count'));
        }
        public function login_home()
        {
            $products = Product::all();
            if(Auth::id())
            {

                $user = Auth::user();
                $userid = $user->id;
                $count = Cart::where('user_id',$userid)->count();
            }
            else{$count = ' ';}
            return view('home.index',compact('products','count'));
        }
        public function product_details($id)
        {
            $data = Product::findOrFail($id);
            if(Auth::id())
            {

                $user = Auth::user();
                $userid = $user->id;
                $count = Cart::where('user_id',$userid)->count();
            }
            else{$count = ' ';}
            return view('home.product_details',compact('data','count'));
        }
        public function add_cart($id)
        {
            $product_id = $id;
            $user = Auth::user();
            $user_id =$user->id;
            $data = new Cart;
            $data->user_id = $user_id;
            $data->product_id = $product_id;
            $data->save();
            toastr()->timeOut(10000)->closeButton()->addSuccess('Product Added To The Cart Succefully');
            return redirect()->back();
        }
        public function mycart()
        {
            if(Auth::id())
            {

                $user = Auth::user();
                $userid = $user->id;
                $count = Cart::where('user_id',$userid)->count();
                $cart = Cart::where('user_id',$userid)->get();
            }
            return view('home.mycart',compact('count','cart'));
        }
        public function deleteproduct($id)
        {
            $data = Cart::findOrFail($id);
            $data->delete();
            toastr()->timeOut(10000)->closeButton()->addWarning(message: 'Product Deleted From Your Cart');
            return redirect()->back();
        }
        public function confirm_order(Request $request)
        {
            $name = $request->name;
            $address = $request->address;
            $phone = $request->phone;
            $userid = Auth::user()->id;
            $carts = Cart::where('user_id',$userid)->get();
            foreach($carts as $cart)
            {
                $order = new Order;
                $order->name = $name;
                $order->rec_address = $address;
                $order->phone = $phone;
                $order->user_id = $userid;
                $order->product_id = $cart->product_id;
                $order->save();
            }
            $cart_remove = Cart::where('user_id',$userid)->get();
                foreach($cart_remove as $remove){
                    $data = Cart::find($remove->id);
                    $data->delete();
                }
            toastr()->timeOut(10000)->closeButton()->addWarning(message: 'Ordered Successfully');
            return redirect()->back();
        }
        public function myorders()
        {
            $user = Auth::user()->id;
            $count = Cart::where('user_id',$user)->get()->count();
            $orders = Order::where('user_id',$user)->get();
            return view('home.order',compact('count','orders'));
        }
        public function stripe($value)
        {
            return view('home.stripe',compact('value'));
        }
        public function stripePost(Request $request,$value)

        {

            Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));



            Stripe\Charge::create ([

                    "amount" => $value * 100,

                    "currency" => "usd",

                    "source" => $request->stripeToken,

                    "description" => "Test payment."

            ]);
            $name = Auth::user()->name;
            $phone = Auth::user()->phone;
            $address = Auth::user()->address;

            $userid = Auth::user()->id;
            $carts = Cart::where('user_id',$userid)->get();
            foreach($carts as $cart)
            {
                $order = new Order;
                $order->name = $name;
                $order->rec_address = $address;
                $order->phone = $phone;
                $order->user_id = $userid;
                $order->product_id = $cart->product_id;
                $order->payment_status = 'Paid';
                $order->save();
            }
            $cart_remove = Cart::where('user_id',$userid)->get();
                foreach($cart_remove as $remove){
                    $data = Cart::find($remove->id);
                    $data->delete();
                }
            // toastr()->timeOut(10000)->closeButton()->addWarning(message: '');
            return redirect('mycart');

        }
        public function shop()
        {
            $products = Product::all();
            if(Auth::id())
            {

                $user = Auth::user();
                $userid = $user->id;
                $count = Cart::where('user_id',$userid)->count();
            }
            else{$count = ' ';}
            return view('home.shop',compact('products','count'));
        }


        public function why()
        {

            if(Auth::id())
            {

                $user = Auth::user();
                $userid = $user->id;
                $count = Cart::where('user_id',$userid)->count();
            }
            else{$count = ' ';}
            return view('home.why',compact('count'));
        }

        public function testimonial()
        {

            if(Auth::id())
            {

                $user = Auth::user();
                $userid = $user->id;
                $count = Cart::where('user_id',$userid)->count();
            }
            else{$count = ' ';}
            return view('home.testimonial',compact('count'));
        }
        public function contact()
        {

            if(Auth::id())
            {

                $user = Auth::user();
                $userid = $user->id;
                $count = Cart::where('user_id',$userid)->count();
            }
            else{$count = ' ';}
            return view('home.contact',compact('count'));
        }
 }
