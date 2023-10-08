<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Post extends Model
{
    use HasFactory;

    public function category() {

        return $this->belongsTo(Category::class);

    }

    public function getPriceForCount() {
        if(!is_null($this->pivot)) {
        return $this->pivot->count * $this->price;
        }
        return $this->price;
    }

    protected $fillable = [

        'id',

        'category_id',

        'title',
        'content',

        'image',

        'code',
        'price',

        'published',
        'published_at'
    ];
}
