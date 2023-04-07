<?php

namespace App\Services;

use App\Models\Content;


class ContentStoreService
{
    public function store(array $request)
    {
        try {
            $content = new Content();
            $content->name = $request['name'];
            $content->description = $request['description'];
            $content->category_id = $request['category_id'];
            $content->status = $request['status'];
            $content->type = $request['type'];
            $thumbnailImageName = saveFile($request['thumbnail_image'], "content_store/images/thumbnail_images");
            $imageName = saveFile($request['image'], "content_store/images");
            $content->thumbnail_image = $thumbnailImageName;
            $content->image = $imageName;
            $content->extension = pathinfo($imageName, PATHINFO_EXTENSION);
            $content->save();

            return $content;
        } catch (\Exception $exception) {
            throw new \Exception($exception->getMessage());
        }
    }

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
                $thumbnailImageName = saveFile($request['thumbnail_image'], "content_store/images/thumbnail_images");
                $content->thumbnail_image = $thumbnailImageName;
            }

            if (isset($request['image'])) {
                deleteAttachment($content->image);
                $imageName = saveFile($request['image'], "content_store/images");
                $content->image = $imageName;
                $content->extension = pathinfo($imageName, PATHINFO_EXTENSION);
            }

            $content->save();

            return $content;
        } catch (\Exception $exception) {
            throw new \Exception($exception->getMessage());
        }
    }
}
