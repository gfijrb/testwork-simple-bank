<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent;

class UserController extends Controller
{

    public function isUserBlocked(string $account):bool
    {
        if($this->user->status === '1') return true;
        return false;
    }

    public function accounts(Request $request)
    {
        return User::find($request->id)->account;
    }

}
