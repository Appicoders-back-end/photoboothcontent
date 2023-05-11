<?php

namespace App\Http\Controllers;

use App\Mail\TestEmail;
use App\Models\Category;
use App\Models\Content;
use App\Models\UserCoupon;
use App\Models\UserDownload;
use Illuminate\Http\Request;
use App\Models\Page;
use Illuminate\Support\Facades\Mail;

class ContentStoreController extends Controller
{
    public function index(Request $request)
    {
        $contentPage = Page::firstOrCreate([
            'slug' => 'content'
        ], [
            'slug' => 'content',
            'name' => 'Content Store'
        ]);

        $baseContentQuery = Content::query()->active();

        if (isset($request->keyword) && $request->keyword != null) {
            $baseContentQuery = $baseContentQuery->where('name', 'like', '%' . $request->keyword . '%')->orWhere('description', 'like', '%' . $request->keyword . '%');
        }

        if (isset($request->categories) && $request->categories != null) {
            $baseContentQuery = $baseContentQuery->whereIn('category_id', $request->categories);
        }

        $data = [
            'content' => json_decode($contentPage->content),
            'categories' => Category::with(['subcategories' => function ($query) {
                $query->where('status', Category::ACTIVE);
            }])->whereNull('parent_id')->active()->orderBy('id')->get(),
            'content_store' => $baseContentQuery->orderByDesc('id')->get()
        ];

        return view('content-store', $data);
    }

    public function myDownloads(Request $request)
    {
        $downloads = UserDownload::with('content', 'user', 'UserCoupon')->where('user_id', auth()->user()->id)->orderByDesc('id')->get();
        return view('myDownloads', compact('downloads'));
    }

    public function download(Request $request)
    {
        try {
            $code = $request->code;
            $userCoupon = UserCoupon::where('code', $code)->first();

            if (!$userCoupon) {
                return response()->json([
                    'success' => false,
                    'message' => "Invalid Token"
                ]);
            }

            if (isset($request->user_id) && $userCoupon->user_id != $request->user_id) {
                return response()->json([
                    'success' => false,
                    'message' => "Invalid Token"
                ]);
            }

            $content = Content::find($request->content_id);
            $contentType = $content->type;

            $isAlreadyDownloaded = UserDownload::where('content_id', $content->id)->where('user_id', $userCoupon->user_id)->exists();

            if ($isAlreadyDownloaded) {
                return response()->json([
                    'success' => false,
                    'message' => sprintf("This %s is already downloaded", $contentType)
                ]);
            }

            if ($contentType == Content::IMAGE && $userCoupon->checkImagesDownloadLimit() <= 0) {
                return response()->json([
                    'success' => false,
                    'message' => sprintf("Your %s download limit is full. You can buy another coupon", $contentType)
                ]);
            }

            if ($contentType == Content::VIDEO && $userCoupon->checkVideosDownloadLimit() <= 0) {
                return response()->json([
                    'success' => false,
                    'message' => sprintf("Your %s download limit is full. You can buy another coupon", $contentType)
                ]);
            }

            if ($contentType == Content::DOCUMENT && $userCoupon->checkDocumentDownloadLimit() <= 0) {
                return response()->json([
                    'success' => false,
                    'message' => sprintf("Your %s download limit is full. You can buy another coupon", $contentType)
                ]);
            }

            UserDownload::create([
                'user_id' => $userCoupon->user_id,
                'content_id' => $content->id,
                'user_coupon_id' => $userCoupon->id,
            ]);

            if ($contentType == Content::IMAGE) {
                $userCoupon->increment('downloaded_images');
                $userCoupon->save();
            }

            if ($contentType == Content::VIDEO) {
                $userCoupon->increment('downloaded_videos');
                $userCoupon->save();
            }

            if ($contentType == Content::DOCUMENT) {
                $userCoupon->increment('downloaded_documents');
                $userCoupon->save();
            }

            return response()->json([
                'success' => true,
                'message' => sprintf("Your %s has been downloaded successfully, and you can see this %s in my downloads section.", $contentType, $contentType)
            ]);

        } catch (\Exception $exception) {
            return response()->json([
                'success' => false,
                'message' => $exception->getMessage()
            ]);
        }
    }

    public function testEmail(Request $request)
    {
        try {
            Mail::to('hirfan875@gmail.com')->send(new TestEmail());

            return response()->json([
                'success' => true,
                'message' => "Email has been sent"
            ]);
        } catch (\Exception $exception) {
            return response()->json([
                'success' => false,
                'message' => $exception->getMessage()
            ]);
        }
    }
}
