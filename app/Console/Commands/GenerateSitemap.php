<?php

namespace App\Console\Commands;

use App\Http\Controllers\FrontEndController;
use Illuminate\Console\Command;

class GenerateSitemap extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'sitemap:generate';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Generate XML Sitemap';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        app(FrontEndController::class)->sitemap();
    }
}
