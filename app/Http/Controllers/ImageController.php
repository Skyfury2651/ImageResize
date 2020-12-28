<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Requests;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;
use App\Traits\ResizeImage;

class ImageController extends Controller
{

    use ResizeImage;

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function resizeImage()
    {
        return view('resizeImage');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function resizeImagePost(Request $request)
    {
        $this->validate($request, [
            'title' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
        $image     = $this->resize($request->file('image'), "images", 500, 500);
        $thumbnail = $this->resize($request->file('image'), "thumbnails", 250, 250);

        dd($thumbnail);

        $path = $request->file('image');
        return back()
            ->with('success', 'Image Upload successful')
            ->with('imageName', $input['imagename']);
    }

}