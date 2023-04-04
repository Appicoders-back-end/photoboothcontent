<?php

use Kreait\Firebase\Factory;
use Kreait\Firebase\Messaging\CloudMessage;
use Kreait\Firebase\Messaging\Notification;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;

if (!function_exists('saveFile')) {

    function saveFile($file)
    {
        $file_name = time() . "_" . $file->getClientOriginalName();
        $filename = pathinfo($file_name, PATHINFO_FILENAME);
        $extension = pathinfo($file_name, PATHINFO_EXTENSION);
        $file_name = str_replace(" ", "_", $filename);
        $file_name = str_replace(".", "_", $file_name) . "." . $extension;
        $path = public_path() . "/storage/uploads/";
        $file->move($path, $file_name);

        return $file_name;
    }
}

if (!function_exists('deleteAttachment')) {

    function deleteAttachment($attachment)
    {
        if ($attachment == null) {
            return true;
        }
        $attachment_path = public_path() . '/storage/uploads/' . $attachment;
        $attachment_path = str_replace('/', "\\", $attachment_path);
        if (File::exists($attachment_path)) {
            File::delete($attachment_path);
            return true;
        }
        return false;
    }
}

if (!function_exists('formattedDate')) {

    /**
     * @param $date
     * @return string|null
     */
    function formattedDate($date): ?string
    {
        if (!$date) {
            return null;
        }
        return date('F d, Y', strtotime($date));
    }
}

if (!function_exists('formattedDateWithDay')) {

    /**
     * @param $date
     * @return string|null
     */
    function formattedDateWithDay($date): ?string
    {
        if (!$date) {
            return null;
        }
        return date('D, F d, Y', strtotime($date));
    }
}

if (!function_exists('formattedTime')) {

    /**
     * @param $date
     * @return string|null
     */
    function formattedTime($date): ?string
    {
        if (!$date) {
            return null;
        }
        return date('h:i A', strtotime($date));
    }
}

if (!function_exists('get_option')) {

    function get_option($option_name)
    {

        if (empty($option_name)) {
            return;
        }

        $row = App\Models\Setting::where('name', $option_name)->first();
        if (!empty($row)) {
            return $row->value;
        }
    }
}

if (!function_exists('update_option')) {

    function update_option($option_name, $option_value)
    {
        App\Models\Setting::updateOrCreate(
            ['name' => $option_name],
            ['value' => $option_value]
        );
    }
}
