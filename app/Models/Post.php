<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Post extends Model
{
    use HasFactory, Notifiable;

    protected $table = "posts";
    protected $fillable = [
        'image',
        'title',
        'name',
        'description',
        'user_id',
        'category',
        'tags',
        'published',
        'published_at',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    protected $casts = [
        'tags' => 'json',
    ];
}
