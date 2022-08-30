<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;

class ProcessWriteFile1 implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        for ($i=1; $i <= 5; $i++) {
            Storage::disk('local')->put("/write-html/result-" . $i . ".html", view('tes-write-file-1', [
                'data1' => 'Paragraph from Data 1'
            ]));
        }

        Log::build([
            'driver' => 'single',
            'path' => storage_path('logs/write-file-1.log'),
        ])->info('Running Queue write_file_1: ' . now());
    }
}
