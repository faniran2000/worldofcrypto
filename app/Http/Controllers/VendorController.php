<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\OrderProduct;
use App\Models\Product;
use App\Models\Vendor;
use App\Models\Withdrawal;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class VendorController extends Controller
{
    public function add_payment_method()
    {
        $user = Auth::user();
        return view("vendor.add-payment-method", ['user' => $user]);
    }
    public function post_add_payment_method(Request $request)
    {
        $user = Auth::user();
        $payment_method = Vendor::where('user_id', Auth::id())->first();
        $payment_method->eth = $request->eth;
        $payment_method->bnb = $request->bnb;
        $payment_method->btc = $request->btc;
        $payment_method->usdt = $request->usdt;
        $payment_method->paypal = $request->paypal;
        $payment_method->update();
        return redirect()->back()->withSuccess("Payment method updated successfully.");
    }
    public function index()
    {
        $user = Auth::user();
        $recent_orders = OrderProduct::select('order_products.*', 'products.*', 'orders.*')
            ->where('order_products.vendor_id', Auth::id())
            ->join('orders', 'orders.id', '=', 'order_products.order_id')
            ->join('products', 'products.id', '=', 'order_products.product_id')
            ->orderBy('order_products.id', 'desc')
            ->take(5)
            ->get();
        $total_sale = OrderProduct::select('order_products.*', 'orders.total_amount', 'orders.status')
            ->where('order_products.vendor_id', Auth::id())
            ->where('orders.status', 'paid')
            ->join('orders', 'orders.id', '=', 'order_products.order_id')
            ->orderBy('order_products.id', 'desc')
            ->distinct()
            ->sum('orders.total_amount');
        $pending_orders = OrderProduct::select('order_products.*', 'orders.status')
            ->where('order_products.vendor_id', Auth::id())
            ->where('orders.status', 'pending')
            ->join('orders', 'orders.id', '=', 'order_products.order_id')
            ->orderBy('order_products.id', 'desc')
            ->distinct()
            ->count();
        $paid_orders = OrderProduct::select('order_products.*', 'orders.status')
            ->where('order_products.vendor_id', Auth::id())
            ->where('orders.status', 'paid')
            ->join('orders', 'orders.id', '=', 'order_products.order_id')
            ->orderBy('order_products.id', 'desc')
            ->distinct()
            ->count();
        return view("vendor.index", ['user' => $user, 'recent_orders' => $recent_orders,'total_sale' => $total_sale,'pending_orders' => $pending_orders,'paid_orders' => $paid_orders]);
    }
    public function edit_item($slug)
    {
        $user = Auth::user();
        $product = Product::where('slug', $slug)->first();
        if ($product->user_id == Auth::id()) {
            return view("vendor.edit-item", ['user' => $user, 'product' => $product]);
        }
        abort(404);
    }
    public function delete_item($slug)
    {
        $user = Auth::user();
        $product = Product::where('slug', $slug)->first();
        if ($product->user_id == Auth::id()) {
            $product->delete();
            return redirect()->back()->withSuccess("Product deleted successfully");
        }
        abort(404);
    }
    public function manage_item()
    {
        $user = Auth::user();
        $products = Product::where('user_id', Auth::id())->paginate(12);
        $product_count = Product::where('user_id', Auth::id())->count();
        return view("vendor.manage-item", ['user' => $user, 'products' => $products, 'product_count' => $product_count]);
    }
    public function purchases()
    {
        $user = Auth::user();
        $purchases = OrderProduct::select('order_products.*', 'products.*', 'orders.*')
        ->where('order_products.vendor_id', Auth::id())
        ->join('orders', 'orders.id', '=', 'order_products.order_id')
        ->join('products', 'products.id', '=', 'order_products.product_id')
        ->orderBy('order_products.id', 'desc')
        ->paginate(12);
        return view("vendor.purchases", ['user' => $user, 'purchases' => $purchases]);
    }
    public function purchase($order_id)
    {
        $user = Auth::user();
        $purchase = Order::where('order_id', $order_id)->firstOrFail();
        return view("vendor.purchase", ['user' => $user, 'purchase' => $purchase]);
    }
    public function settings()
    {
        $user = Auth::user();
        return view("vendor.settings", ['user' => $user]);
    }
    public function statement(Request $request)
    {
        $from = isset($request->from) ? date('d-m-Y H:i:s', strtotime($request->from)) : "";
        $to = isset($request->to) ? date('d-m-Y H:i:s', strtotime($request->to)) : "";
        $user = Auth::user();
        $orders = OrderProduct::where('vendor_id',Auth::id())->whereBetween('created_at', [$from, $to])->get();
        return view("vendor.statement", ['user' => $user, 'orders' => $orders]);
    }
    public function upload()
    {
        $user = Auth::user();
        return view("vendor.upload", ['user' => $user]);
    }
    public function withdrawal()
    {
        $user = Auth::user();
        $withdrawals = Withdrawal::where('user_id', Auth::id())->paginate(12);
        return view("vendor.withdrawal", ['user' => $user, 'withdrawals' => $withdrawals]);
    }
}
