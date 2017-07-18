<?php

namespace App\Services;

use Intervention\Image\ImageManager;
use function Sodium\add;

class ImageService
{
    private $imageManger;

    public function __construct(ImageManager $imageManager) {
        $this->imageManger = $imageManager;
    }

    public function save($image, $width = null, $height = null) {
        $mimeType = $this->getByMimeType($image);
        $filename = time() . $mimeType;
        $image = $this->imageManger->make($image);
        $width && $height && $image->resize($width, $height);
        if ($image->save(env('UPLOAD_PATH') . $filename)) {
             $response = env('UPLOAD_PATH') . $filename;
        } else {
            $response = flase;
        }

        return $response;
    }

    public function getByMimeType($image) {
        return '.' . explode('/', $image->getMimeType())[1];
    }
}