<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use Intervention\Image\Facades\Image;
use App\Models\User;
use App\Models\Province;
use App\Models\Book;
use \Spatie\PdfToImage\Pdf;

class SecureController extends Controller
{
    public function index(){
        $data['jumlah user per provinsi'] = Province::select('name')->withCount('users')->get();
        $data['user aktif tidak punya profile'] = User::where('user_activated_at','!=',null)
        ->whereDoesntHave('profile')
        ->count();
        $data['user aktif punya profile'] = User::where('user_activated_at','!=',null)
        ->whereHas('profile')
        ->count();
        $data['list user aktif tidak punya profile'] = User::select('name','email')->where('user_activated_at','!=',null)
        ->whereDoesntHave('profile')
        ->get();
        $data['users'] = User::get();
        foreach ($data['users'] as $key => $user) {
            # code...
            $oldphoto = $user->avatar;
            $oldfileexists = Storage::disk('public')->exists($oldphoto);
            if(!$oldfileexists){
                $user->avatar = "users/default.png";
                $user->update();
            }
        }
        return response()->json($data);
    }

    public function resetPassword($email){
        $user = User::where('email',$email)->first();
        $user->password = bcrypt('password');
        $user->update();

        return response()->json($user);
    }

    public function makeThumbnails($id){
        $book = Book::findOrFail($id);
        // foreach ($books as $b => $book) {
            # code...
            $disk = Storage::disk('gcs');
            $file = $disk->get($book->file);
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
                $pdf->setImageCompressionQuality(20);
                $name = md5(time());
                $previewpath = public_path().'/storage/tmp/'.$name.'.png';
                $pdf->writeImage($previewpath);
                $disk->put('thumbnails/'.$name.'.png',Storage::disk('public')->get('tmp/'.$name.'.png'));
                unlink($previewpath);
                $pdf->clear();
                $pdf->destroy();
                $book->thumbnail = 'thumbnails/'.$name.'.png';
                $book->update();
            } else {
                return abort(404);
            }
        // }
        return response()->json([$book,$pdf]);
    }

    public function backupDBToGoogle(){

    }

    public function makeFilePublic(){
        // return 'woi';
        $users = User::inRandomOrder()->limit(100)->get();
        // $users = User::orderBy('created_at','desc')->limit(100)->get();
        $disk = Storage::disk('wasabi');
        $res = [];
        // return $users;
        foreach ($users as $u => $user) {
            # code...
            if($disk->exists($user->avatar)){
                $visibility = $disk->getVisibility($user->avatar);
                $res[$u]['status'] = $visibility;
                if($visibility != 'public'){
                    $res[$u]['from'] = $disk->getVisibility($user->avatar);
                    // $res[$u]['res'] = $disk->setVisibility($user->avatar, 'public');
                    // $res[$u]['to'] = $disk->getVisibility($user->avatar);
                }
            }
        }

        return $res;
    }
}
