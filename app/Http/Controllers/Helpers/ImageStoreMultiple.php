<?php
namespace App\Http\Controllers\Helpers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;

class ImageStoreMultiple
{

    public $request;
    public $path;
    public $paths;

    public function __construct(Request $request, $path)
    {
        $this->request = $request;
        $this->path = $path;
    }

    public function imageStore()
    {
        if ($this->request->hasFile('image')) {
            $images = $this->request->file('image');
            $imageName = [];
                foreach ($images as $image) {

                    $imageTitle = rand(1000, 100000) . '-' . $image->getClientOriginalName();

                    $paths = $this->makePaths();


                    File::makeDirectory($paths['original'], $mode = 0755, true, true);
                    File::makeDirectory($paths['thumbnail'], $mode = 0755, true, true);
                    File::makeDirectory($paths['medium'], $mode = 0755, true, true);


                    $image->move($paths['original'], $imageTitle);

                    $findimage = $paths['original'] . $imageTitle;
                    $imagethumb = Image::make($findimage)->resize(200, null, function ($constraint) {
                        $constraint->aspectRatio();
                    });
                    $imagemedium = Image::make($findimage)->resize(1200, null, function ($constraint) {
                        $constraint->aspectRatio();
                    });
                    $imagethumb->save($paths['thumbnail'] . $imageTitle);
                    $imagemedium->save($paths['medium'] . $imageTitle);

                    array_push($imageName, $imageTitle);

                }
            dd($imageName);
                return $imageTitle;
        }

        return false;
    }

    public function makePaths()
    {
        $original = public_path() . '/images/' . $this->path . '/originals/';;
        $thumbnail = public_path() . '/images/' . $this->path . '/thumbnails/';
        $medium = public_path() . '/images/' . $this->path . '/medium/';
        $paths = ['original' => $original, 'thumbnail' => $thumbnail, 'medium' => $medium];
        return $paths;
    }
}
