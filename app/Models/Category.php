<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Events\CustomIncrementCreating;

class Category extends Model
{
    use HasFactory;

    public function posts() {

        return $this->hasMany(Post::class);

    }

   protected $dispatchesEvents = [
    'creating' => CustomIncrementCreating::class,
   ];

    protected $fillable = [

        'id',

        'title',
        'content',

        'image',

        'code',

        'created_at',
        'updated_at'
    ];

}
