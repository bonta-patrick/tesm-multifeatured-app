<?php

namespace App\Models;

use App\Models\User;
use App\Models\Comment;
use Spatie\MediaLibrary\HasMedia;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\InteractsWithMedia;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Post extends Model implements HasMedia
{
    use HasFactory, InteractsWithMedia;

    public function user() {
        return $this->belongsTo(User::class, "user_id");
    }

    public function getComments() {
        return $this->hasMany(Comment::class, "post_id");
    }

    public function likes() {
        return $this->hasMany(Like::class, "post_id");
    }
}
