<?php

namespace App\Jobs;

use App\Models\Template;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Carbon\Carbon;

class ProcessTemplateLessonPlan implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    protected $lessonPlan;
    protected $image;
    public function __construct($lessonPlan, $image)
    {
        $this->lessonPlan=$lessonPlan;
        $this->image=$image;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
         //proses template baru
         $image = preg_replace('#^data:image/\w+;base64,#i','',$this->image);
         $image_path=base64_encode(Hash::make(Carbon::now()->toDateTimeString().$this->lessonPlan->id));
         $isImageUploaded = Storage::disk('wasabi')->put('files/'.$image_path.'.png', base64_decode($image));
         if(!$isImageUploaded)return abort(500,'Gambar gagal diupload');
         
         $template = new Template;
         $template->creator_id=$this->lessonPlan->user_id;
         $template->image = 'files/'.$image_path.'.png';
         $template->name = 'custom template';
         $this->lessonPlan->template()->save($template);
         
         //hapus template lama
         if($template->id){
             $oldTemplates = Template::where('template_type','App\Models\LessonPlan')->where('template_id',$this->lessonPlan->id)->where('id','!=',$template->id)->get();
             $removedIds=[];
             foreach($oldTemplates as $oldTemplate){
                 array_push($removedIds,$oldTemplate->id);
             }
             Template::where('template_type','App\Models\LessonPlan')->where('template_id',$this->lessonPlan->id)->whereIn('id',$removedIds)->delete();
             foreach($oldTemplates as $oldTemplate){
                 Storage::disk('wasabi')->delete($oldTemplate->image);
             }
         }
    }
}
