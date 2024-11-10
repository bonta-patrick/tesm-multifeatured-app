<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Member extends Model
{
    use HasFactory;

    public function getChannel() {
        return $this->belongsTo(Channel::class, 'channel_id');
    }

    public function user() {
        return $this->belongsTo(User::class, "user_id");
    }
}
