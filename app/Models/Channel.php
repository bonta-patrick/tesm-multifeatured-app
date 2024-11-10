<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Channel extends Model
{
    use HasFactory;

    public function getAllMembers() {
        return $this->hasMany(Member::class, "channel_id");
    }

    public function getMessages() {
        return $this->hasMany(ChannelMessage::class, "channel_id");
    }

    public function user() {
        return $this->belongsTo(User::class, "user_id");
    }
}
