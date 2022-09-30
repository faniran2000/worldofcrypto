<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Vendor;
use App\Models\Withdrawal;
use Illuminate\Http\Request;

class WithdrawalController extends Controller
{
    public function new(Request $request){
        $user = User::findOrFail($request->user_id);
        $vendor = Vendor::findOrFail($request->vendor_id);
        if($vendor->user_id == $user->id){
            if($vendor->wallet_balance >= $request->amount){
                if($vendor->{$request->method} != ''){
                    $withdrawal = new Withdrawal();
                    $withdrawal->user_id = $request->user_id;
                    $withdrawal->vendor_id = $request->vendor_id;
                    $withdrawal->method = $request->method;
                    $withdrawal->amount = isset($request->amount) && $request->amount != '' ? $request->amount : $request->amount1;
                    $withdrawal->status = "pending";
                    $withdrawal->save();
                    $vendor->wallet_balance -= $request->amount;
                    $vendor->update();
                    return redirect()->back()->withSuccess("Withdrawal request sent.");
                }
                return redirect()->back()->withInfo("Please set your payment method");
            }
            return redirect()->back()->withInfo("Insufficient wallet balance");
        }
        abort(404);
    }
}
