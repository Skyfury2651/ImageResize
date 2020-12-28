<?php

namespace App\Traits;

use Carbon\Carbon;
use Intervention\Image\Facades\Image;

trait ResizeImage
{
    public function resize($file, $folder, $width = 300, $height = 300)
    {
        // returns Intervention\Image\Image
        $resize = Image::make($file)->fit($width, $height)->encode('jpg');
        $now    = Carbon::now()->toDateTimeString();
        // calculate md5 hash of encoded image
        $hash = md5($resize->__toString() . $now);
        if (!file_exists($folder)) {
            mkdir($folder, 666, true);
        }
        // use hash as a name
        $path = "$folder/{$hash}";
        // save it locally to ~/public/images/{$hash}.jpg
        $resize->save(public_path($path) . ".jpg");
        // $url = "/images/{$hash}.jpg"
        $url = "/" . $path;

        return $url;
    }
}