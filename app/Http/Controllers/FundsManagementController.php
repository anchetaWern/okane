<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\UserFundRequest;
use Auth;

class FundsManagementController extends Controller
{

    public function index()
    {
        return view('funds.index');
    }

    public function create()
    {
        return view('funds.create');
    }


    public function store(UserFundRequest $request)
    {
        Auth::user()->funds()->create($request->validated());
        return back()
            ->with('alert', ['type' => 'success', 'text' => 'Fund created.']);
    }
}
