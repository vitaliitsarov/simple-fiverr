<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Transaction;
use Auth;

class TransactionController extends Controller
{
    public function index()
    {
        $transactions = Transaction::where('from_id', Auth::user()->id)->orWhere('to_id', Auth::user()->id)->paginate(10);

        return view('transaction', [
            'transactions' => $transactions
        ]);
    }
}
