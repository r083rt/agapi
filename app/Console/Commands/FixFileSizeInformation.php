<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\File;
// Storage
use Illuminate\Support\Facades\Storage;

class FixFileSizeInformation extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'fix:file-size-information';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        // get all files where size is null
        $files = File::whereNull('size')->get();

        // loop through each file
        foreach ($files as $file) {
            // get the file size
            // jika file->src adalah struktur json maka skip
            if (json_decode($file->src)) {
                $this->info("{$file->src} => skipped");
                continue;
            }
            // $size = filesize("https://cdn-agpaiidigital.online/{$file->src}");
            // get size from storage
            try{
                $size = Storage::disk('wasabi')->size($file->src);
                // $this->info("{$file->src} => {$size}");
                // update the file size
                $file->update([
                    'size' => $size
                ]);
                $this->info("{$file->src} => {$size} => updated");
            } catch (\Exception $e) {
                $this->info("{$file->src} => {$size} => failed");
            }

        }
        return 0;
    }
}
