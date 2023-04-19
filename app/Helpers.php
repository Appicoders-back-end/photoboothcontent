<?php

use App\Models\Subscription;
use Carbon\Carbon;
use Kreait\Firebase\Factory;
use Kreait\Firebase\Messaging\CloudMessage;
use Kreait\Firebase\Messaging\Notification;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;

if (!function_exists('saveFile')) {

    function saveFile($file, $path)
    {
        $file_name = time() . "_" . $file->getClientOriginalName();
        $filename = pathinfo($file_name, PATHINFO_FILENAME);
        $extension = pathinfo($file_name, PATHINFO_EXTENSION);
        $file_name = str_replace(" ", "_", $filename);
        $file_name = str_replace(".", "_", $file_name) . "." . $extension;
        $path = "storage/uploads/" . $path;

        $file->move(public_path() . '/' . $path, $file_name);

        return $path . '/' . $file_name;
    }
}

if (!function_exists('deleteAttachment')) {

    function deleteAttachment($attachment)
    {
        if ($attachment == null) {
            return true;
        }

        $attachment_path = public_path() . '/' . $attachment;
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

if (!function_exists('generateRandomString')) {
    /**
     * @param $length
     * @return string
     */
    function generateRandomString($length = 10): string
    {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
        return $randomString;
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

if (!function_exists('get_logo')) {

    function get_logo()
    {
        return get_option('logo') != null ? url('/') . '/' . get_option('logo') : asset('frontend') . '/assets/img/logo.png';
    }
}

if (!function_exists('getPlanExpiryDate')) {
    function getPlanExpiryDate($plan)
    {
        $intervalTime = $plan->interval_time;
        $expiryDate = null;

        if ($intervalTime == Subscription::DURATION_WEEK) {
            $expiryDate = Carbon::now()->addWeek()->subDays(1)->toDateString();
        }

        if ($intervalTime == Subscription::DURATION_MONTH) {
            $expiryDate = Carbon::now()->addMonth()->subDays(1)->toDateString();
        }

        if ($intervalTime == Subscription::DURATION_YEAR) {
            $expiryDate = Carbon::now()->addYear()->subDays(1)->toDateString();
        }

        return $expiryDate;
    }
}

