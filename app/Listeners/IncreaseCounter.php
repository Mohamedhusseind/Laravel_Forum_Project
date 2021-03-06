<?php

namespace App\Listeners;

use App\Events\VideoViewer;
use App\Models\Video;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class IncreaseCounter
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct( )
    {

    }

    /**
     * Handle the event.
     *
     * @param  object  $event
     * @return void
     */
    public function handle(VideoViewer $event)
    {
        $this->updateviewer($event->video);
    }

    public function updateviewer($video)
    {
        $video->viewers = $video->viewers + 1 ;
        $video->save();

    }
}
