<?php

namespace App\Http\Controllers;

use App\Http\Traits\HasRoles;
use App\Models\Account;
use App\Http\Traits\Permissions;
use App\Models\User;
use Illuminate\Contracts\Support\Jsonable;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use App\Http\Controllers\UtilsController as Utils;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use phpDocumentor\Reflection\Types\Self_;
use Psy\Util\Json;


class BankController extends Controller
{
    use Permissions, HasRoles;

    protected static $user;
    //protected $account;
    
    public function __construct()
    {
        self::$user = new User();
        //$this->account = new Account();
        //new Utils;
    }

    public function getUser():JsonResponse
    {
        return (new JsonResponse())->setData([
            "user" => Auth::user()
        ]);
    }



    public function transfer(Request $request):int
    {
        $trx = new TransactionController();
        $user = new UserController();
        if(Auth::id() === $request->from || self::hasRole('admin'))
        if($user->isUserBlocked($request->from)) return $trx::FAIL; // user was blocked to bank
        if(!$trx->isAccountExists($request->to)) return $trx::FAIL; // recipient is not exist
        $trx->lockBalance($request->amount); // lock available balance
        $hash = $trx->initTransaction(
            $request->from,
            $request->to,
            $request->amount);
        return $trx->transfer($hash);
    }

    public function blockUser(string $user_id):bool
    {
        if(!$this->isBank(self::$user->level)) {
            throw new \Error("Haven't permission");
        }
        //
        return true;
    }

    public function unblockUser(string $user_id):bool
    {
        if(!$this->isBank(self::$user->level)) {
            throw new \Error("Haven't permission");
        }
        //
        return true;
    }

    public function emit(string $account_id, string $amount):bool
    {
        //
        if(!$this->isBank(self::$user->level)) {
            throw new \Error("Haven't permission");
        }
        return true;
    }
    
}
