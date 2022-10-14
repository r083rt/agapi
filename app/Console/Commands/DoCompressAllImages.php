<?php

namespace App\Console\Commands;

use App\Models\File;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Storage;

class DoCompressAllImages extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'compress:all-images';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Kompres Gambar Semua File yang ada di Database';

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
        $images = File::where('type', 'like', 'image%')->limit(10)->orderBy('created_at', 'desc')->get();
        foreach ($images as $image) {
            // read file dari wasabi
            $file = Storage::disk('wasabi')->get($image->src);
            // decode file
            $compressed = \Image::make($file);
            // resize
            $compressed->resize(1080, null, function ($constraint) {
                $constraint->aspectRatio();
            });
            // encode
            $compressed->encode('jpg', 60);

            // simpan gambar
            Storage::disk('public')->put($image->src, $compressed);

            // log
            $this->info("{$image->src} compressed");
        }
        return 0;
    }
}
