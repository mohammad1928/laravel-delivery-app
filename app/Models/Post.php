<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $fillable=[
      "user_id",
      "title",
      "text",
    ];

    public function images()
    {
        return $this->hasMany(PostImage::class);
    }
    public function likes(){
        return $this->hasMany(PostLike::class);
    }
}
