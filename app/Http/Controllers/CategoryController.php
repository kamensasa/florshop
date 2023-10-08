<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Category;

use App\Models\Post;

class CategoryController extends Controller
{
    public function index() {

        $categories = Category::query()->get();

        return view('categories.index', compact('categories'));

    }

    public function show ($categoryid) {

        //$posts = Post::query()->where('category_id', $categoryid)->get();

        $category = Category::query()->where('id', $categoryid)->first();

        return view('categories.show', compact('category'));

    }
}
