<?php

namespace App\Events;

use App\Models\ClinicalStory;
use App\Models\ClinicalStoryRequestStatus;
use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class ClinicalStoryRequirementEvent
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $priority = 1;
//    public $clinicalStory;
//    public $clinicalStoryRequestStatus;
    /**
     * Create a new event instance.
     */
    public function __construct(
        public ClinicalStory $clinicalStory,
        public int $clinicalStoryRequestStatus,
        public String $detail = ''
    ) {}

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
