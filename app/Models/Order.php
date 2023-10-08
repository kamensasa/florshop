<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    public function posts () {
        return $this->belongsToMany(Post::class)->withPivot('count')->withTimestamps();
    }

    public function user () {
        return $this->belongsTo(User::class);
    }

    public function saveOrder ($name, $phone) {
        if($this->status == 0) {
            $this->name = $name;
            $this->phone = $phone;
            $this->status = 1;
            $this->save();
            session()->forget('orderId');
                return true;
        } else {
                return false;
        }
    }

    public function calculate() {
        $sum = 0;
        foreach($this->posts as $post) {
            $sum += $post->getPriceForCount();
        }
        return $sum;
    }

}
