<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        //dd($categories);
        
        return view('categories.index')
        ->with(compact('categories')) ;

    }

}
