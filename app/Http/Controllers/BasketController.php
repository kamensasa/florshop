<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Models\Order;
use App\Models\Post;

class BasketController extends Controller
{

    public function place(){
        $orderId = session('orderId');
        if(is_null($orderId)){
            return redirect()->route('basket');
        }
        $order=Order::find($orderId);
        return view('basket.place', compact('order'));
    }

    public function confirm (Request $request){
        $orderId = session('orderId');
        if(is_null($orderId)){
            return redirect()->route('basket');
        }
        $order=Order::find($orderId);
        $success = $order->saveOrder($request->name, $request->phone);

        if($success){
            session()->flash('success', 'Ваш заказ принят!');
        }
        else{
            session()->flash('warning', 'Ошибка!');
        }
        return redirect()->route('posts');
        }


    public function index() {
        $orderId = session('orderId');
        if(!is_null($orderId)){
            $order = Order::findOrFail($orderId);
        }
        return view('basket.index', compact('order'));
    }

    public function add ($postId) {

        $orderId = session('orderId');
        if(is_null($orderId)) {
            $order = Order::create();
            session(['orderId' => $order->id]);
        } else {
            $order = Order::find($orderId);
        }
        if ($order->posts->contains($postId)){
        $pivotRow = $order->posts()->where('post_id', $postId)->first()->pivot;
        $pivotRow->count++;
        $pivotRow->update();
        } else {
        $order->posts()->attach($postId);
        }

        if(Auth::check()) {
            $order->user_id = Auth::id();
            $order->save();
        }

        $post = Post::find($postId);
        session()->flash('success', 'Добавлен товар ' . $post->title);

        return redirect()->route('basket');
        }

    public function remove ($postId) {

        $orderId=session('orderId');
        if(is_null($orderId)) {
            return redirect()->route('basket');
        }
        $order=Order::find($orderId);
        if ($order->posts->contains($postId)){
            $pivotRow = $order->posts()->where('post_id', $postId)->first()->pivot;
            if ($pivotRow->count < 2) {
                $order->posts()->detach($postId);
            } else {
                $pivotRow->count--;
            $pivotRow->update();
            }

        $post = Post::find($postId);
        session()->flash('warning', 'Удален товар ' . $post->title);
        }
        return redirect()->route('basket');

}
}
