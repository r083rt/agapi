<?php

namespace App\Jobs;

use App\Models\Template;
use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Carbon\Carbon;

class ProcessTemplateModule implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    protected $module;
    protected $image;
    public function __construct($module, $image)
    {
        $this->module=$module;
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
        $image_path=base64_encode(Hash::make(Carbon::now()->toDateTimeString().$this->module->id));
        $isImageUploaded = Storage::disk('wasabi')->put('files/'.$image_path.'.png', base64_decode($image));
        if(!$isImageUploaded)return abort(500,'Gambar gagal diupload');
        
        $template = new Template;
        $template->creator_id=$this->module->user_id;
        $template->image = 'files/'.$image_path.'.png';
        $template->name = 'custom template';
        $this->module->template()->save($template);
        
        //hapus template lama
        if($template->id){
            $oldTemplates = Template::where('template_type','App\Models\Module')->where('template_id',$this->module->id)->where('id','!=',$template->id)->get();
            $removedIds=[];
            foreach($oldTemplates as $oldTemplate){
                array_push($removedIds,$oldTemplate->id);
            }
            Template::where('template_type','App\Models\Module')->where('template_id',$this->module->id)->whereIn('id',$removedIds)->delete();
            foreach($oldTemplates as $oldTemplate){
                Storage::disk('wasabi')->delete($oldTemplate->image);
            }
        }
        //return $template;

    }
}
