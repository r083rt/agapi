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
        $images = File::where('type', 'like', 'image%')
            ->where('file_type', 'App\Models\Post')
        // ->limit(20)
            ->orderBy('created_at', 'desc')
            ->get();

        $total = File::where('type', 'like', 'image%')
            ->where('file_type', 'App\Models\Post')
        // ->limit(20)
            ->orderBy('created_at', 'desc')
            ->count();

        foreach ($images as $index => $image) {
            // return $this->info($image->toArray());
            // tunjukan total progress dan jumlah dari total
            $this->info("Progress: {$index} dari {$total}");
            $this->info("Progress: " . round(($index / $total) * 100, 2) . "%");

            // if file doesnt exist in storage, skip
            if (!Storage::disk('wasabi')->exists($image->src)) {
                $this->warn("File {$image->path} tidak ditemukan di storage - Skipped");
                continue;
            }

            // jika ukuran file lebih kecil dari 300 kb maka skip
            if (Storage::disk('wasabi')->size($image->src) < 300000) {
                $this->warn("File {$image->path} ukurannya lebih kecil dari 300 kb - Skipped");
                continue;
            }

            try {
                // read file dari wasabi
                $file = Storage::disk('wasabi')->get($image->src);
                // $extension = pathinfo($image->src, PATHINFO_EXTENSION);
                // // return $this->info($extension);
                // $fileName = time() . '.' . $extension;
                // $folder = 'images';
                // $path = $folder . '/' . $fileName;

                $newPath = "compressed-" . $image->src;

                $this->info("Prosesing {$newPath}...");

                // decode file
                $compressed = \Image::make($file)->resize(1080, null, function ($constraint) {
                    $constraint->aspectRatio();
                })->encode('jpg', 60);

                // simpan gambar
                Storage::disk('wasabi')->put($newPath, $compressed);

                // log
                $this->info("{$image->src} compressed");

                $image->src = $newPath;
                $image->save();

                // log sukses warna hijau
                $this->info("{$image->src} saved");
                // $newFile = File::firstOrNew([
                //     'src' => $path,
                // ]);
                // $newFile->fill($image->toArray());
                // $newFile->src = $path;
                // $newFile->file_type = "App\Models\Member\Post";
                // $newFile->save();

            } catch (\Exception $e) {
                $this->error("{$image->src} failed to compress - Skipped");
                $this->error("{$e->getMessage()}");
            }

        }
        return 0;
    }
}
