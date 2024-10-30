<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

// Post deixou de ser uma classe abstrata
class Post extends Model
{
    use HasFactory;

    protected $fillable = [
        'image',
        'user_id'
    ];

    // public function topic()
    // {
    //     return $this->hasOne(Topic::class, 'id');
    // }

    // Relacionamento polimórfico
    public function postable()
    {
        return $this->morphTo();
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function rates()
    {
        return $this->hasMany(Rate::class);
    }
}
