<?php

namespace App\Console\Commands;

use App\Models\Certificate;
use Illuminate\Console\Command;

class CertificateCleanup extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:certificate-cleanup';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        // Delete cert older than 3 days
        $deletedCert = Certificate::where('created_at', '<', now()->subDays(3))
            ->delete();

        $this->info($deletedCert.' old certificates  have been cleaned up!');
    }
}
