<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;

use App\Models\User;

use App\Models\Product;

use App\Models\Cart;

use App\Models\Order;

class HomeController extends Controller
{
    public function index()
    {
        $products = Product::paginate(3);
        return view('home.userpage', compact('products'));
    }

    public function redirect()
    {
        if (Auth::check()) {
            $usertype = Auth::user()->usertype;

            if ($usertype == '1') {
                return view('admin.home');
            } else {
                $products = Product::paginate(3);
                return view('home.userpage', compact('products'));
            }
        } else {
            // User is not authenticated, handle accordingly
            // For example, redirect to login page
            return redirect()->route('login');
        }
    }

    public function product_details ($id)
    {
        $product = product::find($id);
        
        return view ('home.product_details', compact('product'));
    }

    public function add_cart(Request $request, $id) 
    {
        if(Auth::id()) 
        {
            $user = Auth::user();

            $product = product::find($id);

            $cart = new cart;

            $cart->name = $user->name;
            
            $cart->email = $user->email;
            $cart->phone = $user->phone;
            $cart->address = $user->address;
            $cart->user_id = $user->id;

                $cart->product_title=$product->title;

                if($product->discount_price!=null)
                {
                    $cart->price=$product->discount_price * $request->quantity;
                }
                else
                {
                    $cart->price=$product->price * $request->quantity;
                }
                  $cart->product_id=$product->id;
                   $cart->quantity=$request->quantity;
                    $cart->image=$product->image;

            $cart->save();

            return redirect()->back();
        }

        else
        {
            return redirect('login');
        }
    }

    public function show_cart()
    {
        if (Auth::check()) {
            $id = Auth::user()->id;

            $cart = Cart::where('user_id', $id)->get();

            return view('home.show_cart', compact('cart'));
        } else {
            // Handle the case where the user is not authenticated
            // For example, redirect them to the login page
            return redirect()->route('login');
        }
    }

    public function remove_cart($id)
    {
        $cart = cart::find($id);

        $cart->delete();

        return redirect()->back();
    }

    public function cash_order()
    {
        $user = Auth::user();

        $userid = $user->id;

        $data = cart::where('user_id','=', $userid)->get();

        foreach($data as $data)
        {
            $order = new order;

            $order->name = $data->name;
            $order->email = $data->email;
            $order->phone = $data->phone;
            $order->address = $data->address;
            $order->user_id = $data->user_id;

            $order->price = $data->price;
            $order->quantity = $data->quantity;
            $order->image = $data->image;
            $order->product_id = $data->product_id;

            $order->payment_status = 'cash on delivery';

            $order->delivery_status = 'processing';

            $order->save();

            $cart_id = $data->id;
            
            $cart = Cart::find($cart_id);

            $cart->delete();

        }


        return redirect()->back()->with('message', 'We have received your. We will contact with you soon');

        
    }

}
