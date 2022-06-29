<?php

namespace App\Traits;


use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\File;

trait StorageImageTrait
{
    public function storageTraitUpload($request, $fieldName, $folderName)
    {
        if($request->hasFile($fieldName)){
            $file = $request->$fieldName;
            $upload_file = $request->file($fieldName);
            $file4Resize=Image::make($upload_file);
            $height = $file4Resize->height();
            $width = $file4Resize->width();
            $fileNameOrigin = $file->getClientOriginalName();
            $fileNameHash = Str::random(20) . '.' . $file->getClientOriginalExtension();
            if($height>400){
                $height=400;
            }
            $destinationPath = public_path('storage/'.$folderName);
            File::ensureDirectoryExists($destinationPath);
            $filePath =$file4Resize->resize(null, $height, function ($constraint) {
                $constraint->aspectRatio();
            })->save($destinationPath .'/'. $fileNameHash);
            $dataUpluadTrait = [
                'file_name'=> $fileNameOrigin,
                'file_path'=> '/storage/'.$folderName.'/'. $fileNameHash,
            ];
            return $dataUpluadTrait;
        }

        return null;
    }

    public function storageTraitUploadwoResize($request, $fieldName, $folderName)
    {

        if($request->hasFile($fieldName)){
            $file = $request->$fieldName;
            $upload_file = $request->file($fieldName);
            $file4Resize=Image::make($upload_file);
            $height = $file4Resize->height();
            $width = $file4Resize->width();
            $fileNameOrigin = $file->getClientOriginalName();
            $fileNameHash = Str::random(20) . '.' . $file->getClientOriginalExtension();

            $destinationPath = public_path('storage/'.$folderName);
            File::ensureDirectoryExists($destinationPath);
            $filePath =$file4Resize->resize(null, $height, function ($constraint) {

            })->save($destinationPath .'/'. $fileNameHash);
            $dataUpluadTrait = [
                'file_name'=> $fileNameOrigin,
                'file_path'=> '/storage/'.$folderName.'/'. $fileNameHash,
            ];
            return $dataUpluadTrait;
        }

        return null;
    }

    public function storageTraitUploadMultiple($file, $folderName){

        $file4Resize=Image::make($file);
        $height = $file4Resize->height();
        $width = $file4Resize->width();
        $fileNameOrigin = $file->getClientOriginalName();
        $fileNameHash = Str::random(20) . '.' . $file->getClientOriginalExtension();
        if($height>400){
            $height=400;
        }
        $destinationPath = public_path('storage/'.$folderName);
        File::ensureDirectoryExists($destinationPath);
        $filePath =$file4Resize->resize(null, $height, function ($constraint) {
            $constraint->aspectRatio();
        })->save($destinationPath .'/'. $fileNameHash);
        $dataUpluadTrait = [
            'file_name'=> $fileNameOrigin,
            'file_path'=> '/storage/'.$folderName.'/'. $fileNameHash,
        ];

        return $dataUpluadTrait;
    }
}
