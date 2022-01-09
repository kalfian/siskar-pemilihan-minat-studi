<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

use Illuminate\Http\Request;
use Image;
use File;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function create_dir($dir) {
        $path = public_path($dir);
        if(!File::isDirectory($path)){
            File::makeDirectory($path, 0777, true, true);
        }
    }

    public function uploadImage(Request $request, String $field ) {
        $file                   = $request->file($field);
        $thumbnailImage         = Image::make($file);

        $this->create_dir('/uploads/imgs');
        $this->create_dir('/uploads/thumbnails');

        $tmpFilePath            = public_path().'/uploads/imgs/';
        $tmpThumbnailFilePath   = public_path().'/uploads/thumbnails/';
        $tmpFileName            = date('YmdHis') . "_" . str_replace(" ","_",$file->getClientOriginalName());
        
        $thumbnailImage->save($tmpFilePath.$tmpFileName);
        $thumbnailImage->resize(env('THUMBNAIL_WIDTH_SIZE', '250'), null, function ($constraint) {
            $constraint->aspectRatio();
        });
        $thumbnailImage->save($tmpThumbnailFilePath.$tmpFileName); 

        return $tmpFileName;
    }

    public function deleteImage(String $name) {
        $tmpFilePath            = public_path().'/uploads/imgs/';
        $tmpThumbnailFilePath   = public_path().'/uploads/thumbnails/';
        File::delete($tmpThumbnailFilePath.$name);
        File::delete($tmpFilePath.$name);
    }
}
