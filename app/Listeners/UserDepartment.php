<?php

namespace App\Listeners;

use App\Events\UserCreated;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use App\Models\Department;

class UserDepartment implements ShouldQueue
{
   
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        
    }

    /**
     * Handle the event.
     *
     * @param  \App\Events\UserCreated  $event
     * @return void
     */
    public function handle(UserCreated $event)
    {
        $dep = Department::inRandomOrder()->take(2)->pluck('id');
            foreach ($dep as $d) {
                $event->user->department()->create(['department_id'=>$d]);
            }
    }
}
