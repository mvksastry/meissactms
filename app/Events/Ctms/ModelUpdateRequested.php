<?php

namespace App\Events\Ctms;

use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class ModelUpdateRequested
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public string $uuid;
    public string $status_comment;
    public string $status;

    /**
     * Create a new event instance.
     */
    public function __construct(string $uuid, string $status, string $status_comment)
    {
        //
        $this->uuid = $uuid;
        $this->status = $status;
        $this->status_comment = $status_comment;
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return array<int, \Illuminate\Broadcasting\Channel>
     */
    public function broadcastOn(): array
    {
        return [
            new PrivateChannel('channel-name'),
        ];
    }
}
