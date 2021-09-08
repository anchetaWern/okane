<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Http\Requests\UserCategoryRequest;

class CategoryManagementController extends Controller
{

    public function index()
    {
        return view('categories.index');
    }

    public function create()
    {
        return view('categories.create');
    }


    public function store(UserCategoryRequest $request)
    {

        Auth::user()->categories()->create($request->validated());
        return back()
            ->with('alert', ['type' => 'success', 'text' => 'Category created.']);
    }
}
