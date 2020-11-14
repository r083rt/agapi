<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use App\Models\User;
use Illuminate\Support\Facades\Storage;

class SetAvatarVisibility implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;
    protected $id;
    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($id)
    {
        //
        $this->id = $id;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        //
        $user = User::findOrFail($this->id);
        $disk = Storage::disk('wasabi');
        if($disk->exists($user->avatar)){
            $visibility = $disk->getVisibility($user->avatar);
            if($visibility != 'public'){
                $res['from'] = $disk->getVisibility($user->avatar);
                $res['res'] = $disk->setVisibility($user->avatar, 'public');
                $res['to'] = $disk->getVisibility($user->avatar);
            }
        }
    }
}
