<?php

namespace App\Http\Controllers\Api\Dashboard;


use App\Http\Controllers\Api\ApiController;
use App\Http\Requests\ImageRequest;
use App\Services\ImageService;

class ImageController extends ApiController
{
    protected $imageService;

    public function __construct(ImageService $imageService) {
        parent::__construct();

        $this->imageService = $imageService;
    }


    /**
     * @param ImageRequest $request
     *
     * @return mixed
     */
    public function uploadImg(ImageRequest $request) {
        foreach ($request->all() as $key => $value) {
            $response = $this->imageService->save($request->file($key));
            if (!$response)
                return $this->errorWrongArgs();
            $filename = [
                'type' => $key,
                'path' => $response
            ];
        }

        return $filename;
    }
}
