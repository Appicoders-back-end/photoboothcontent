<?php

namespace App\Services;

use App\Jobs\UploadVideoJob;
use App\Models\Content;
use Dflydev\DotAccessData\Data;
use Illuminate\Support\Facades\Storage;

class ContentStoreService
{
    /**
     * @param array $request
     * @return Content
     * @throws \Exception
     */
    public function store(array $request)
    {
        try {
            $content = new Content();
            $content->name = $request['name'];
            $content->description = $request['description'];
            $content->category_id = $request['category_id'];
            $content->status = $request['status'];
            $content->type = $request['type'];

//            dd($request['thumbnail_image']);
            $thumbnailImageName = saveFile($request['thumbnail_image'], $this->getPath($request['type'])['thumbnail_path']);
           $content->thumbnail_image = $thumbnailImageName;
            $attachmentName = saveFile($request['attachment'], $this->getPath($request['type'])['path']);
            $content->thumbnail_image = $thumbnailImageName;
            $content->image = $attachmentName;
            if (isset($request['watermark_attachment'])) {
                $content->watermark_attachment = saveFile($request['watermark_attachment'], $this->getPath($request['type'])['path']);
            }
          /*  $upload_video_content = [
               "thumbnail_image"  =>  $request['thumbnail_image'],
               "thumbnail_path"   =>  $this->getPath($request['type'])['thumbnail_path'],
               "attachment_name"  =>  $request['attachment'],
               "attachment_path"  =>  $this->getPath($request['type'])['path'],
               "watermark_attachment" => $request['watermark_attachment'],
               "watermark_attachment_path" => $this->getPath($request['type'])['path'],
            ];*/
//            dispatch(new UploadVideoJob($upload_video_content));
//            dispatch(new App\Jobs\UploadVideoJob($details));

            $content->extension = pathinfo($attachmentName, PATHINFO_EXTENSION);
            $content->size = $this->get_size($attachmentName);
            $content->save();

            return $content;
        } catch (\Exception $exception) {
            throw new \Exception($exception->getMessage());
        }
    }

    /**
     * @param array $request
     * @return mixed
     * @throws \Exception
     */
    public function update(array $request)
    {
        try {
            $content = Content::find($request['id']);
            $content->name = $request['name'];
            $content->description = $request['description'];
            $content->category_id = $request['category_id'];
            $content->status = $request['status'];

            if (isset($request['thumbnail_image'])) {
                deleteAttachment($content->thumbnail_image);
                $thumbnailImageName = saveFile($request['thumbnail_image'], $this->getPath($content->type)['thumbnail_path']);
                $content->thumbnail_image = $thumbnailImageName;
            }

            if (isset($request['attachment'])) {
                deleteAttachment($content->image);
                $attachmentName = saveFile($request['attachment'], $this->getPath($content->type)['path']);
                $content->image = $attachmentName;
                $content->extension = pathinfo($attachmentName, PATHINFO_EXTENSION);
                $content->size = $this->get_size($attachmentName);
            }

            if (isset($request['watermark_attachment'])) {
                deleteAttachment($content->image);
                $watermarkAttachmentName = saveFile($request['watermark_attachment'], $this->getPath($content->type)['path']);
                $content->watermark_attachment = $watermarkAttachmentName;
            }

            $content->save();

            return $content;
        } catch (\Exception $exception) {
            throw new \Exception($exception->getMessage());
        }
    }

    /**
     * @param $type
     * @return string[]
     */
    private function getPath($type)
    {
        $thumbnailPath = "content_store";
        $path = "content_store";
        switch ($type) {
            case Content::DOCUMENT:
                $thumbnailPath = "content_store/documents/thumbnail_images";
                $path = "content_store/documents";
                break;
            case Content::VIDEO:
                $thumbnailPath = "content_store/videos/thumbnail_images";
                $path = "content_store/videos";
                break;
            default:
                $thumbnailPath = "content_store/images/thumbnail_images";
                $path = "content_store/images";
        }

        return [
            'thumbnail_path' => $thumbnailPath,
            'path' => $path
        ];
    }

    public function get_size($file_path)
    {
        return 0; // todo will be fixed later
    }
}
