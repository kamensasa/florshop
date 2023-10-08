<?php


namespace App\Http\Controllers\Admin;

use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\PostsFilterRequest;

use Faker\Factory as Faker;

use App\Models\Category;
use App\Models\Post;
use App\Models\User;
use App\Models\Order;

class AdminPostController extends Controller
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

        return view('admin.posts.index', compact ('posts'));
    }

    public function orders () {
        $orders = Order::where('status', 1)->get();
        return view('admin.orders.index', compact('orders'));
    }


    public function  create (Request $request, Post $post) {

        // $posts = Post::query()->get();
        // $categories = Category::get();
        return view('admin.posts.create');

    }

    public function show($postid) {

        $post = Post::query()->get()->find($postid);

        return view('admin.posts.show', compact('post'));
    }
 /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Post $post) {

        // $title = $request->input('title');

        // $content = $request->input('content');
        // $validated = validate($request->all(), [

        //     'title' => ['required', 'string', 'max:100'],
        //     'content' => ['required', 'string', 'max:100'],
        //     'published_at' => ['nullable', 'string', 'date'],
        //     'published' => ['nullable', 'boolean'],
        // ]);

        $path = $request->file('image')->store('posts');
        $params = $request->all();
        $params['image'] =  $path;
        $params['id'] = DB::select('SELECT IFNULL(MAX(id), 0) + 1 as id FROM categories')[0]->id;
        Post::create($params);

        return redirect()->route('admin.posts');

//   for ($i=0; $i < 10; $i++) {
//     $faker = Faker::create();
//         Post::query()->create([
//             'title' => $faker->sentence(),
//             'content' => $faker->paragraph(),
//             'code' => $faker->numberBetween(1, 100),
//             'price' => $faker->numberBetween(200, 3000),

//         ]);
//     }
}


    // for ($i=0; $i < 10; $i++) {
    //     Post::query()->create([

    //         //'user_id' => User::query()->value('id'),
    //         'title' => fake()->sentence(),
    //         'content' => fake()->paragraph(),
    //         'code' => fake()->sentence(),
    //         'price' => fake()->number(),
    //         // 'published_at' => fake()->dateTimeBetween(now()->subYear(), now()),
    //         // 'published' => true,
    //     ]);



    public function edit($postid)
    {
        $post = Post::query()->where('id', $postid)->first();

        return view ('admin.posts.create', compact('post'));
    }

public function update(Request $request, $postid) {

    $post = Post::find($postid);

    $params = $request->all();
    unset($params['image']);
    if ($request->has('image')) {
        if($post->image != null) {
            Storage::delete($post->image);
        }
        $path = $request->file('image')->store('posts');
        $params['image'] =  $path;
    }

    $request->validate([
        'code' => 'required',
        'title' => 'required',
        'content' => 'required',
        'image' => 'required',
    ]);

    $post->update($params);
    return redirect()->route('admin.posts');
}



}
