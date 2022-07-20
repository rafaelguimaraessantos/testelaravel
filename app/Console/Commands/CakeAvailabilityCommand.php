<?php

namespace App\Console\Commands;

use App\Models\Cake;
use Illuminate\Console\Command;
use App\Jobs\SendCakeIsAvailableMail;

class CakeAvailabilityCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'cake:availability';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Verify if cake has a determined quantity available';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $cakes = Cake::with('interesteds')->get();

        foreach ($cakes as $cake) {
            if ($cake->quantity_available > 0) {
                new SendCakeIsAvailableMail($cake->toArray());
            }
        }
    }
}