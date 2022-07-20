<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use App\Mail\CakeIsAvailableMail;
use Illuminate\Support\Facades\Mail;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Contracts\Queue\ShouldBeUnique;

class SendCakeIsAvailableMail implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public $cake;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct(array $cake)
    {
        $this->cake = $cake;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        foreach ($this->cake as $cake) {
            foreach ($cake['interesteds'] as $interested) {
                Mail::to($interested['email'])->send(new CakeIsAvailableMail($cake));
            }
        }
    }
}