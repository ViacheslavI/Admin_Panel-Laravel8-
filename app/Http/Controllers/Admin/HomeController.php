<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $postCount = Post::all()->count();
        $categoriesCount = Category::all()->count();
        return view('admin.home.index',compact('postCount','categoriesCount'));
    }
}
