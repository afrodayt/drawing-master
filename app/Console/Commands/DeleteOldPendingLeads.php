<?php

namespace App\Console\Commands;

use Illuminate\Support\Facades\Log;
use Illuminate\Console\Command;
use App\Models\Lead;

class DeleteOldPendingLeads extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'leads:cleanup-pending';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Delete pending leads older than 7 days';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $deleted = Lead::where('payment_status', 'pending')
            ->where('created_at', '<', now()->subDays(7))
            ->delete();

        Log::info("Deleted $deleted pending leads older than 7 days.");
        $this->info("Deleted $deleted pending leads older than 7 days.");
    }
}
