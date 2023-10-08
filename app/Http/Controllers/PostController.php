<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\PostsFilterRequest;

use App\Models\Post;
use App\Models\User;

class PostController extends Controller
{
    public function index(PostsFilterRequest $request) {

        // $post = (object) [
        //     'id' => 123,
        //     'title' => 'Lorem...',
        //     'content' => 'Lorem ipsum...',
        // ];

        // $posts = array_fill(0, 10, $post);
        $postsQuery = Post::query();

        if($request->filled('price_from')) {
          $postsQuery->where('price', '>=', $request->price_from);
        }

        if($request->filled('price_to')) {
            $postsQuery->where('price', '<=', $request->price_to);
          }

        $posts = $postsQuery->paginate(4)->withPath("?" . $request->getQueryString());
        // $posts = Post::query()->get();

        return view('posts.index', compact ('posts'));
    }


    public function  create() {

        return view('posts.create');

    }

    public function show($postid) {

        $post = Post::query()->get()->find($postid);

        return view('posts.show', compact('post'));
    }

    public function store($postid) {


        // $post = Post::query()->get()->find($postid);

        // return view('posts.show', compact('post'));
        // $title = $request->input('title');

        // $content = $request->input('content');
        // $validated = validate($request->all(), [

        //     'title' => ['required', 'string', 'max:100'],
        //     'content' => ['required', 'string', 'max:100'],
        //     'published_at' => ['nullable', 'string', 'date'],
        //     'published' => ['nullable', 'boolean'],
        // ]);


    // for ($i=0; $i < 10; $i++) {
    //     Post::query()->create([
    //         //'user_id' => User::query()->value('id'),
    //         'title' => fake()->sentence(),
    //         'content' => fake()->paragraph(),
    //         'code' => fake()->sentence(),
    //         // 'published_at' => fake()->dateTimeBetween(now()->subYear(), now()),
    //         // 'published' => true,
    //     ]);
    // }
}



}
