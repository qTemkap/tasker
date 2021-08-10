<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CategoryController extends Controller
{

    public function store($group, Request $request)
    {
        $category = new Category();

        $category->name = $request->name;
        $category->group_id = $group;
        $category->user_id = Auth::id();

        $category->save();
    }

}
