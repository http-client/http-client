<?php

namespace WeForge\WeChat\OpenPlatform\Events;

use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class Unauthorized
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    /**
     * @var array
     */
    public $payload;

    /**
     * Create a new event instance.
     *
     * @param array $payload
     *
     * @return void
     */
    public function __construct(array $payload)
    {
        $this->payload = $payload;
    }
}
