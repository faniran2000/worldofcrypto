<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\OrderProduct;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class CartController extends Controller
{
    public function httpPost($url, $data)
    {
        $curl = curl_init($url);
        curl_setopt($curl, CURLOPT_POST, true);
        curl_setopt($curl, CURLOPT_HTTPHEADER, [
            'Content-Type: application/json',
            'X-CC-Api-Key: ae743c8d-6a09-4ded-918d-81bca891e288',
            'X-CC-Version: 2018-03-22'
        ]);
        curl_setopt($curl, CURLOPT_POSTFIELDS, json_encode($data));
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        $response = curl_exec($curl);
        curl_close($curl);
        return $response;
    }

    public function httpGet($url)
    {
        $curl = curl_init($url);
        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_HTTPHEADER, [
            'X-CC-Api-Key: ae743c8d-6a09-4ded-918d-81bca891e288',
            'X-CC-Version: 2018-03-22'
        ]);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        $response = curl_exec($curl);
        curl_close($curl);
        return $response;
    }

    public function cart()
    {
        return view("cart.cart");
    }
    public function checkout()
    {
        return view("cart.checkout");
    }
    public function order_confirmation($order_id)
    {
        $order = Order::where('order_id', $order_id)->first();
        if ($order) {
            $order->status = 'paid';
            $order->update();
            $all_products = json_decode($order->all_products, true);
            foreach ($all_products["product_ids"] as $ap) {
                $product = Product::where('id', $ap)->first();
                if ($product) {
                    $order_product = new OrderProduct();
                    $order_product->user_id = Auth::id();
                    $order_product->vendor_id = $product->user_id;
                    $order_product->product_id = $ap;
                    $order_product->order_id = $order->id;
                    $order_product->save();
                }
            }
            return view("cart.order-confirmation");
        }
        abort(404);
    }
    public function order_failed($order_id)
    {
        $order = Order::where('order_id', $order_id)->first();
        if ($order) {
            $order->status = 'failed';
            $order->update();
            return view("cart.order-failed");
        }
        abort(404);
    }
    public function invoice($order_id)
    {
        return view("cart.invoice");
    }
    public function add($product_id)
    {
        $getCart = Session::get("cart", json_encode([]));
        $cart = json_decode($getCart);
        $getQty = Session::get("qty", json_encode([]));
        $qty = json_decode($getQty);
        if (in_array($product_id, $cart)) {
            $key = array_search($product_id, $cart);
            $qty[$key] += 1;
        } else {
            $cart[] = $product_id;
            $qty[] = 1;
        }
        Session::forget('cart');
        Session::forget('qty');
        Session::put("cart", json_encode($cart));
        Session::put("qty", json_encode($qty));
        return redirect()->back()->withSuccessAdd("Product added to cart");
    }
    public function remove($id)
    {
        $getCart = Session::get("cart", json_encode([]));
        $cart = json_decode($getCart, TRUE);
        $getQty = Session::get("qty", json_encode([]));
        $qty = json_decode($getQty, TRUE);
        if (count($cart) > 0 && count($qty) > 0) {
            unset($cart[$id]);
            unset($qty[$id]);
        }
        return redirect()->back()->withSuccessRemove("Product removed from cart");
    }
    public function empty()
    {
        Session::forget('cart');
        Session::forget('qty');
        return redirect()->back()->withSuccessEmpty("Cart is now empty!");
    }
    public function pay(Request $request)
    {
        $order = new Order();
        $order->order_id = rand() . time();
        $order->user_id = Auth::id();
        $order->total_amount = $request->total_amount;
        $order->total_item = $request->total_item;
        $order->all_products = json_encode([
            "product_ids" => json_decode(Session::get("cart", [])),
            "qtys" => json_decode(Session::get("qty", []))
        ]);
        $order->user_details = json_encode(
            [
                "firstname" => $request->firstname,
                "lastname" => $request->lastname,
                "email" => $request->email,
                "phone" => $request->phone,
                "address" => $request->address,
                "city" => $request->city,
                "state" => $request->state,
                "country" => $request->country
            ]
        );
        $order->status = "pending";
        $order->save();
        $data = [
            "name" => "Order payment",
            "description" => $order->order_id,
            "local_price" => [
                "amount" => $request->total_amount,
                "currency" => "USD"
            ],
            "pricing_type" => "fixed_price",
            "requested_info" => [
                "email"
            ],
            "metadata" => [
                "customer_id" => Auth::id(),
                "customer_name" => $request->firstname . " " . $request->lastname
            ],
            "redirect_url" => url("/order-confirmation/" . $order->order_id),
            "cancel_url" => url("/order-failed/" . $order->order_id)
        ];
        $url = 'https://api.commerce.coinbase.com/charges';
        $send = $this->httpPost($url, $data);
        $res = json_decode($send);
        // return redirect()->away("https://api.commerce.coinbase.com/charges/".$res->data->code)
        // ->header('X-CC-Api-Key', 'ae743c8d-6a09-4ded-918d-81bca891e288')
        // ->header('X-CC-Version','2018-03-22');
        $resp = $this->httpGet("https://api.commerce.coinbase.com/charges/".$res->data->id);
        $resp2 = json_decode($resp);
        return redirect()->away($resp2->data->hosted_url);
    }
}
