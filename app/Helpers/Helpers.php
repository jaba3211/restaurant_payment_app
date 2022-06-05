<?php

use App\Facades\Date;
use App\Facades\EmbedVideo;
use App\Facades\ImageCache;
use App\Models\Article;
use App\Services\EmbedVideoService;
use Carbon\Carbon;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Str;
use Webwizo\Shortcodes\Facades\Shortcode;

if (!function_exists('full_url')) {
    /**
     * @param bool $withHttp
     * @param bool $withSlashOnEnd
     * @return string
     */
    function full_url($withHttp = true, $withSlashOnEnd = false)
    {
        $slash = $withSlashOnEnd == true ? '/' : '';
        $http = $withHttp == true ? 'http://' : '';

        return env('APP_URL') . $slash;
    }
}

if (!function_exists('storage_url')) {
    /**
     * @param string $src
     * @return string
     */
    function storage_url($src = '')
    {
        return full_url(true, true) . $src;
    }
}

if (!function_exists('isAdmin')) {
    /**
     * @return bool
     */
    function isAdmin()
    {
        if (isset(auth()->user()->status_id) and auth()->user()->status_id == ADMIN) {
            return true;
        }
        return false;
    }
}

if (!function_exists('isStaff')) {
    /**
     * @return bool
     */
    function isStaff()
    {
        if (isset(auth()->user()->status_id) and auth()->user()->status_id == STAFF) {
            return true;
        }
        return false;
    }
}

if (!function_exists('isUser')) {
    /**
     * @return bool
     */
    function isUser()
    {
        if (isset(auth()->user()->status_id) and auth()->user()->status_id == USER) {
            return true;
        }
        return false;
    }
}



