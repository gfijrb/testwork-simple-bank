<?php

namespace App\Http\Controllers;

use App\Models\Account;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use \Illuminate\Http\JsonResponse as json;

class AccountController extends Controller
{
    public function generatePinCode()
    {
        return \substr(rand(), 0, 4);
    }

    public function generateAccountNumber():string
    {
        $account = '';
        for($i=0; $i<2; $i++) {
            $account .= \substr(rand(), 0, 8);
        }
        if(!is_null(Account::where('number', $account)->first())) {
            $this->generateAccountNumber();
        } else {
            return (string) $account;
        }
    }

    public function totalSupply() {
        return Account::where('users_id', Auth::id())->get(['balance'])
            ->reduce(function($carry, $item) {
                return (float) $carry + (float) $item->balance;
            });
    }

    public function isAccountExists($account):bool
    {
        //if(is_null(Account::where('number', $account)->first())) return false;
        return true;
    }

    public function newAccount(Request $request):json
    {
        if(!Auth::check())
            return response()->json('false');
        $acc = new Account();
        $acc->users_id = Auth::id();
        $acc->number = $this->generateAccountNumber();
        $acc->balance = '1000';
        $acc->balance_blocked = '0';
        //$acc->pin_code = Hash::make($request->pin);
        $acc->save();
        return response()->json('true');
    }

    public function getAccountsList():json
    {
        return response()->json(Account::where('users_id', Auth::id())->get(['number', 'balance']));
    }





    
}
