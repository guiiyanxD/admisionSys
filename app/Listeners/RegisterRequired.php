<?php

namespace App\Listeners;

use App\Events\ClinicalStoryRequirementEvent;
use App\Models\RequestStatus;
use App\Models\User;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;

class RegisterRequired implements ShouldQueue
{

    public $queue = 'request_status';
    public $after_commit = true;
    protected String $user;
    /**
     * Create the event listener.
     */
    public function __construct($user)
    {
        $this->user = $user;
    }

    /**
     * Handle the event.
     */
    public function handle(ClinicalStoryRequirementEvent $event): void
    {
        RequestStatus::create(
            [
                'id_request' => $event->clinicalStory->id,
                'id_status' => $event->clinicalStoryRequestStatus, //Status
                'detail' => $event->detail,
                'registrar' => $this->user,
                'date' => Carbon::now('America/La_Paz'),
            ]
        );
    }
}
