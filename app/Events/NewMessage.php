<?php

namespace App\Events;

use App\Models\ChannelMessage;
use Illuminate\Queue\SerializesModels;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Contracts\Broadcasting\ShouldBroadcastNow;

class NewMessage implements ShouldBroadcastNow
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $message;

    /**
     * Create a new event instance.
     */
    public function __construct(ChannelMessage $message)
    {
        $this->message = $message;
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return array<int, \Illuminate\Broadcasting\Channel>
     */
    public function broadcastOn(): array
    {
        return [
            new PrivateChannel('channel.' . $this->message->channel->id),
        ];
    }

    public function broadcastWith() {
        return [
            'id' => $this->message->id,
            'user_id' => $this->message->user->id,
            'content' => $this->message->content,
            'type' => $this->message->type,
            'channel_id' => $this->message->channel->id,
            'created_at' => $this->message->created_at->toFormattedDateString(),
            'user' => [
                'username' => $this->message->user->username,
                'avatarsrc' => $this->message->user->avatarsrc
            ]
        ];
    }
}
