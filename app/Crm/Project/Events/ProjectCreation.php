<?php

namespace Crm\Project\Events;

use Crm\Project\Models\Project;
use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class ProjectCreation
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    private Project $Project;

    /**
     * Create a new event instance.
     */
    public function __construct(Project $Project)
    {
        $this->setProject($Project);
    }



    /**
     * Get the value of Project
     */
    public function getProject()
    {
        return $this->Project;
    }

    /**
     * Set the value of Project
     *
     * @return  self
     */
    public function setProject($Project)
    {
        $this->Project = $Project;

        return $this;
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
