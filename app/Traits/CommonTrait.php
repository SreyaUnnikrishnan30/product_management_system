<?php

namespace App\Traits;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\Storage;
use File;

trait CommonTrait {

    public function imageUpload($image,$location) {

        $imageName= 'IMG_'.Carbon::now()->timestamp.'.'.$image->getClientOriginalExtension();
        $image->move(public_path().$location, $imageName);
        return $location.$imageName;
    }

    public function fileUpload($file,$path,$root='s3'){
        try {
            $fileName  =  'FILE_'.Carbon::now()->timestamp.'.'.$file->getClientOriginalExtension();
            $file->move( public_path().$path,$fileName);
            $file_path = public_path().$path.$fileName;
            $filePathS3 =  env('AWS_FOLDER', 'demo').$path.$fileName;
            Storage::disk($root)->put($filePathS3, file_get_contents($file_path),'public');
            $s3url= Storage::disk('s3')->url($filePathS3);
            unlink($file_path);
            return $s3url;
        } catch (\Throwable $th) {
            echo $th->getMessage();
            exit;
            return null;
        }        
    }
}

   
