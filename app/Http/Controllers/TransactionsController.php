<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\TransactionRequest;
use Auth;

class TransactionsController extends Controller
{
    public function index()
    {
        return view('transactions.index');
    }

    public function create()
    {
        return view('transactions.create', [
            'categories' => Auth::user()->categories,
            'funds' => Auth::user()->funds,
        ]);
    }


    public function store(TransactionRequest $request)
    {
        Auth::user()->transactions()->create($request->validated());
        return back()
            ->with('alert', ['type' => 'success', 'text' => 'Transaction created.']);
    }
}
