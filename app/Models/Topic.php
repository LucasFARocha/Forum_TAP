<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Topic extends Post
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'status',
    ];

    // public function post()
    // {
    //     return $this->belongsTo(Post::class);
    // }

    // Relacionamento polimórfico
    public function post()
    {
        return $this->morphOne(Post::class, 'postable');
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
    public function tags(){
        return $this->belongsToMany(Tag::class);
    }
    public function comments()
    {
        return $this->hasMany(Comment::class);
    }
}
