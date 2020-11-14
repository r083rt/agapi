<?php

namespace App\Http\Controllers\API\v1;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use App\Models\Book;
use \Spatie\PdfToImage\Pdf;
use Illuminate\Support\Facades\Hash;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $books = Book::with('user','book_category')->orderBy('created_at','desc')->get();
        return response()->json($books);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request->file('file'));
        $book = new Book($request->all());
        // $book->user_id = 1;
        if($request->hasFile('file')){
            $path = $request->file('file')->store('books', 'wasabi');
            // $file = Storage::disk('public')->url($path);
            $book->file = $path;

            $disk = Storage::disk('wasabi');
            $disk->setVisibility($book->file, 'public');
            $pdf = new \Imagick();
            $path = public_path()."/storage/tmp/".md5(time()).".pdf";
            if(!file_exists(public_path()."/storage/tmp")){
                File::makeDirectory(public_path()."/storage/tmp", 0755, true, true);
            }
            $download = file_put_contents($path,$disk->get($book->file));
            $pdf->readImage($path."[0]");
            unlink($path);
            $pdf->setResolution(300,300);
            $pdf->setImageFormat('png');
            $pdf->setImageCompressionQuality(10);
            $name = md5(time());
            $previewpath = public_path().'/storage/tmp/'.$name.'.png';
            $pdf->writeImage($previewpath);
            $disk->put('thumbnails/'.$name.'.png',Storage::disk('public')->get('tmp/'.$name.'.png'));
            $disk->setVisibility('thumbnails/'.$name.'.png', 'public');
            unlink($previewpath);
            $pdf->clear();
            $pdf->destroy();
            $book->thumbnail = 'thumbnails/'.$name.'.png';
            $book->update();
        }
        // dd($book,$file,$pdf);
        // $book->save();
        $request->user()->books()->save($book);
        return response()->json($book->load('user','book_category'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $book = Book::with('user','book_category')->find($id);
        return response()->json($book);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $book = Book::findOrFail($id);
        Storage::disk('wasabi')->delete($book->file);
        $book->delete();
        return response()->json($book);
    }

    public function makeThumbnail(Request $request,$id){
        # code...
        $book = Book::findOrFail($id);
        $disk = Storage::disk('wasabi');
        if($disk->exists($book->file)){
            $disk->setVisibility($book->file, 'public');
            $pdf = new \Imagick();
            $path = public_path()."/storage/tmp/".md5(time()).".pdf";
            if(!file_exists(public_path()."/storage/tmp")){
                File::makeDirectory(public_path()."/storage/tmp", 0755, true, true);
            }
            $download = file_put_contents($path,$disk->get($book->file));
            $pdf->readImage($path."[0]");
            unlink($path);
            $pdf->setResolution(300,300);
            $pdf->setImageFormat('png');
            $pdf->setImageCompressionQuality(10);
            $name = md5(time());
            $previewpath = public_path().'/storage/tmp/'.$name.'.png';
            $pdf->writeImage($previewpath);
            $disk->put('thumbnails/'.$name.'.png',Storage::disk('public')->get('tmp/'.$name.'.png'));
            $disk->setVisibility('thumbnails/'.$name.'.png', 'public');
            unlink($previewpath);
            $pdf->clear();
            $pdf->destroy();
            $book->thumbnail = 'thumbnails/'.$name.'.png';
            $book->update();
        }
        return response()->json($book);
    }
}
