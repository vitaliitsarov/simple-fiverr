<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Models\User;
use App\Models\Transaction;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index()
    {
        return view('dashboard');
    }

    public function form(Request $request)
    {
        DB::beginTransaction();

        $data = $request->validate([
            'iban' => 'required',
            'amount' => 'required',
        ]);

        $data['amount'] = (float) str_replace(',', '.', $data['amount']);

        if($data['iban'] == Auth::user()->iban) {
            DB::rollBack();
            toastr()->error('You can\'t send money to yourself!', 'Error');
            return back();
        }

        if($data['amount'] <= 0) {
            DB::rollBack();
            toastr()->error('Invalid sending amount!', 'Error');
            return back();
        }

        $user = User::where('iban', $data['iban'])->first();

        if(is_null($user)) {
            DB::rollBack();
            toastr()->error('Invalid sending amount!', 'Error');
            return back();
        }

        $auth_user = User::find(Auth::user()->id);

        if($auth_user->balance < $data['amount']) {
            DB::rollBack();
            toastr()->error('Not enough money!', 'Error');
            return back();
        }

        // Update Auth Balance
        $newBalance = $auth_user->balance - $data['amount'];
        $auth_user->balance = $newBalance;
        $auth_user->save();

        $userBalace = $user->balance + $data['amount'];
        $user->balance = $userBalace;
        $user->save();

        $transaction = new Transaction();
        $transaction->from_id = $auth_user->id;
        $transaction->to_id = $user->id;
        $transaction->amount = $data['amount'];
        $transaction->message = 'Success';
        $transaction->save();


        DB::commit();
        toastr()->success('Money has been successfully sent!', 'Success');
        return back();
    }
}
