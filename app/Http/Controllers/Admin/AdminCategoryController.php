<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Support\Facades\Event;
use App\Models\Events\CustomIncrementCreating;
use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Http\Requests\CategoryRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class AdminCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::paginate(10);

        return view('admin.categories.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * ?
     */
    public function create()
    {
        // $categories = Category::query()->get();
        return view('admin.categories.create', );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CategoryRequest $request, Category $category)
    {

        $path = $request->file('image')->store('categories');
        $params = $request->all();
        $params['image'] =  $path;
        $params['id'] = DB::select('SELECT IFNULL(MAX(id), 0) + 1 as id FROM categories')[0]->id;
        Category::create($params);

        return redirect()->route('admin.categories');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show($categoryid)
    {
        //$posts = Post::query()->where('category_id', $categoryid)->get();

    $category = Category::query()->where('id', $categoryid)->first();

    return view('admin.categories.show', compact('category'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit($categoryid)
    {
        $category = Category::query()->where('id', $categoryid)->first();
        return view('admin.categories.create', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(CategoryRequest $request, Category $category)
    {


        $params = $request->all();
        unset($params['image']);
        if($request->has('image')) {
            Storage::delete($category->image);
        $path = $request->file('image')->store('categories');
        $params['image'] =  $path;
        }

        $category->update($params);
        return redirect()->route('admin.categories');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        $category->delete();
        return redirect()->route('admin.categories');
    }
}

// public function category_index() {

//     $categories = Category::query()->get();

//     return view('admin.categories.index', compact('categories'));

// }

// public function categories_show ($categoryid) {

//     //$posts = Post::query()->where('category_id', $categoryid)->get();

//     $category = Category::query()->where('id', $categoryid)->first();

//     return view('admin.categories.show', compact('category'));

//}
