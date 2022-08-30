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

class ProcessWriteFile3 implements ShouldQueue
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
        for ($i=11; $i <= 15; $i++) {
            Storage::disk('local')->put("/write-html/result-" . $i . ".html", view('tes-write-file-3', [
                'data1' => 'Paragraph from Data 3',
                'data2' => 'Paragraph from Data 33',
                'data3' => 'Paragraph from Data 333'
            ]));
        }

        Log::build([
            'driver' => 'single',
            'path' => storage_path('logs/write-file-3.log'),
        ])->info('Running Queue write_file_3: ' . now());
    }
}
