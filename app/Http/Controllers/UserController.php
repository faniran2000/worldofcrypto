<?php

namespace App\Http\Controllers;

use App\Models\Favourite;
use App\Models\Order;
use App\Models\User;
use App\Models\Vendor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class UserController extends Controller
{
    
    public function login() {
        return view("auth.login");
    }

    public function signup() {
        return view("auth.signup");
    }

    public function reset() {
        return view("auth.reset");
    }

    public function index() {
        $user = Auth::user();
        return view("user.index", ['user' => $user]);
    }

    public function favourites() {
        $user = Auth::user();
        $favourites = Favourite::where('user_id', $user->id)->orderBy("id", "desc")->paginate(12);
        return view("user.favourites", ['user' => $user, 'favourites' => $favourites]);
    }

    public function settings() {
        $user = Auth::user();
        return view("user.settings", ['user' => $user]);
    }

    public function orders() {
        $user = Auth::user();
        $orders = Order::where('user_id', Auth::id())->orderBy("id", "desc")->get();
        return view("user.orders", ['user' => $user, 'orders' => $orders]);
    }

    public function order($id) {
        $user = Auth::user();
        $order = Order::where('user_id', Auth::id())->where('order_id',$id)->orderBy("id", "desc")->first();
        return view("user.order", ['user' => $user, 'order' => $order]);
    }

    public function post_login(Request $request)
    {
        $request->validate([
            "email" => "required",
            "password" => "required"
        ]);
        $credentials = $request->only(["email", "password"]);
        if (Auth::attempt($credentials)) {
            $user = Auth::user();
            if($user->type == 'user'){
                return redirect()->route("user.index", ['user' => $user]);
            }
            if($user->type == 'vendor'){
                return redirect()->route("vendor.index", ['user' => $user]);
            }
        }
        return redirect()->back()->withError("Invalid email address/password provided");
    }

    public function post_signup(Request $request)
    {
        $request->validate([
            'firstname' => 'required',
            'lastname' => 'required',
            'type' => 'required',
            'email' => 'required|unique:users',
            'password' => 'required|confirmed'
        ]);

        $user = new User();
        $user->firstname = ucwords($request->firstname);
        $user->lastname = ucwords($request->lastname);
        $user->email = strtolower($request->email);
        $user->type = ($request->type);
        $user->password = bcrypt($request->password);
        $user->photo = asset("assets/img/avatar.jpeg");
        $user->save();
        if($user->type == 'vendor'){
            $vendor = new Vendor();
            $vendor->user_id = $user->id;
            $vendor->vendor_id = rand();
            $vendor->wallet_balance = 0;
            $vendor->status = 'inactive';
            $vendor->save();
        }
        return redirect()->route('login')->withSuccess("Signup successfully, login now to continue to your account dashboard");
    }

    public function post_reset(Request $request)
    {
        $request->validate([
            "email" => "required"
        ]);
        $user = User::where("email", $request->email)->first();
        if ($user) {
            $new_password = Str::random(6);
            $user->password = bcrypt($new_password);
            $user->save();
            return redirect()->back()->withSuccess("New temporary password have been sent to your mailbox, use that to login and change to a desire password.");
        }
        return redirect()->back()->withError("Invalid email address provided");
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route("login")->withSuccess("Account logged out successfully.");
    }

    public function post_edit_profile(Request $request) {
        $request->validate([
            'firstname' => 'required',
            'lastname' => 'required'
        ]);
        $photo = "";
        $destinationPath = 'assets/img/avatars/';
        if($request->file("photo")){
            $photo = date('YmdHis') . "." . $request->file("photo")->getClientOriginalExtension();
            $request->file("photo")->move($destinationPath, $photo);
        }

        $user = User::findOrFail(Auth::id());
        $user->firstname = $request->firstname;
        $user->lastname = $request->lastname;
        $user->phone = $request->phone;
        $user->address = $request->address;
        $user->city = $request->city;
        $user->state = $request->state;
        $user->country = $request->country;
        $user->password = isset($request->password) ? bcrypt($request->password) : $user->password;
        $user->photo = $photo ? asset($destinationPath.$photo) : $user->photo;
        $user->update();
        return redirect()->back()->withSuccess("Profile updated successfully.");
    }

}
