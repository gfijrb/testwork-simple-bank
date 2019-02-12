<?php

namespace App\Http\Controllers;

use App\Models\Account;
use App\Models\Transaction;
use App\Models\User;
use Illuminate\Http\Request;
use PhpParser\Node\Expr\Cast\Object_;

/**
 * Class TransactionController
 * @package App\Http\Controllers
 */
class TransactionController extends Controller
{
    /**
     * STATUSES
     */
    const FAIL    = 0;
    const PENDING = 1;
    const SUCCESS = 2;

    private function generateTransactionHash($data) {
        return \hash('ripemd128', $data);
    }

    public function balanceAvaliable(Request $account):string
    {
        // add role for current user and admin
        $acc = Account::where('number', $account->id)->first();
        return $acc->balance - $acc->balance_blocked;
    }

    public function lockBalance($amount):bool
    {
        $acc = Account::where('number', $amount)->first();
        $acc->balance = $acc->balance - $amount;
        $acc->balance_blocked = $amount;
        $acc->update();
        return true;
    }


    public function initTransaction(string $from, string $to, string $amount)
    {
        // validate data
        $time = new \DateTime();
        $date = $time->date;
        $data = implode('', [$from, $to, $amount, $date]);
        $trx_hash = $this->generateTransactionHash($data);

        $trx = new Transaction();
        $trx->hash = $trx_hash;
        $trx->from = $from;
        $trx->to = $to;
        $trx->amount = $amount;
        $trx->status = self::PENDING;
        $trx->initialized_at = $time->getTimestamp();
        $trx->save();

        return $trx_hash;
    }

    public function transfer(string $hash)
    {
        $trx = Transaction::where('hash', $hash)->get();

        $acc_1 = Account::where('number', $trx->to)->first();
        $acc_1->balance_blocked = $acc_1->balance_blocked - $trx->amount; // clear blocked balance
        $acc_1->update();

        $acc_2 = Account::where('number', $trx->from)->first();
        if(is_null($acc_2)) return self::SUCCESS; // only for test mode
        $acc_2->balance = $acc_2->balance + $trx->amount; // add balance
        $acc_2->update();
    }

}
