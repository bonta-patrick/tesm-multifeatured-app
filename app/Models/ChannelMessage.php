<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ChannelMessage extends Model
{
    use HasFactory;

    public function user() {
        return $this->belongsTo(User::class, "user_id");
    }

    public function message_reactions() {
        return $this->hasMany(MessageReaction::class, "message");
    }

    public function channel() {
        return $this->belongsTo(Channel::class, "channel_id");
    }
}
