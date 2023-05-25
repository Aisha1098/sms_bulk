<?php

namespace App\Http\Controllers;

use App\Http\Resources\AccountResource;
use App\Models\Account;
use Illuminate\Http\Request;

class AccountController extends Controller
{
    public function index()
    {
        $users = Account::get();

        return AccountResource::collection($users);
    }
    
    public function show($account)
    {
        $accounts = Account::findOrFail($account);
        
        return new AccountResource($accounts);
    }


    public function store(Request $request)
    {
        $validated = $request->validate([
            'user_id' => 'required',
            'is_individual' => 'sometimes|boolean',
            'is_corporate' => 'sometimes|boolean',
            'is_enterprise' => 'sometimes|boolean',
            'is_monthly_invoice' => 'sometimes|boolean',
            'senderID' => 'required|unique:accounts,senderID',
            'sms_rate_lim' => 'required',
            'price' => 'required'
        ]);
        $account = Account::create($validated);

        return new AccountResource($account);
    }

    public function update(Request $request, Account $account)
    {
        $validated = $request->validate([
            'user_id' => 'required',
            'is_individual' => 'sometimes|boolean',
            'is_corporate' => 'sometimes|boolean',
            'is_enterprise' => 'sometimes|boolean',
            'is_monthly_invoice' => 'sometimes|boolean',
            'senderID' => 'required|unique:accounts,senderID',
            'sms_rate_lim' => 'required',
            'price' => 'required'
        ]);
        $account->update($validated);

        return new AccountResource($account);
    }
}
