<?php

namespace App\Jobs;

use App\Models\Content;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class UploadVideoJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;
    protected $request;
    /**
     * Create a new job instance.
     */
    public function __construct($request)
    {
        $this->request = $request;
    }

    /**
     * Execute the job.
     */

    public function handle()
    {
//        dd($this->request->getRealPath());
        $content = new Content();

        $thumbnailImageName = saveFile($this->request['thumbnail_image'], $this->request['thumbnail_path']);
        $attachmentName = saveFile($this->request['attachment_name'], $this->request['attachment_path']);
        $water_mark_attachment = saveFile($this->request['watermark_attachment'], $this->request['watermark_attachment_path']);

        $content->thumbnail_image = $thumbnailImageName;
        $content->image = $attachmentName;
        $content->watermark_attachment = $water_mark_attachment;
        $content->extension = pathinfo($attachmentName, PATHINFO_EXTENSION);
        $content->size = 0;
        $content->save();
    }
}
