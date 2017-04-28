<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use League\Fractal\Manager;
use League\Fractal\Pagination\IlluminatePaginatorAdapter;
use League\Fractal\Resource\Collection;
use League\Fractal\Resource\Item;

class ApiController extends Controller
{
    /**
     * @var int $statusCode
     */
    protected $statusCode = 200;

    /**
     * @var Manager
     */
    protected $fractal;

    public function __construct() {
        $this->fractal = new Manager;

        if (isset($_GET['include'])) {
            $this->fractal->parseIncludes($_GET['include']);
        }
    }

    /**
     * Respond the item data.
     * 单对象
     *
     * @param $item
     * @param $callback
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function respondWithItem($item, $callback) {
        $resource = new Item($item, $callback);
        $rootScope = $this->fractal->createData($resource);

        return $this->respondWithArray($rootScope->toArray());
    }

    /**
     * Respond the collection data.
     * 复数对象
     *
     * @param $collection
     * @param $callback
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function respondWithCollection($collection, $callback) {
        $resource = new Collection($collection, $callback);
        $rootScope = $this->fractal->createData($resource);

        return $this->respondWithArray($rootScope->toArray());
    }

    /**
     * Respond the collection data with pagination.
     *
     * @param $paginator
     * @param $callback
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function respondWithPaginator($paginator, $callback) {
        $resource = new Collection($paginator, $callback);
        $resource->setPaginator(new IlluminatePaginatorAdapter($paginator));
        $rootScope = $this->fractal->createData($resource);

        return $this->respondWithArray($rootScope->toArray());
    }

    /**
     * Respond the data.
     *
     * @param array $arrray
     * @param array $headers
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function respondWithArray(array $array, array $headers = []) {
        return response()->json($array, $this->statusCode, $headers);
    }

    /**
     * Respond a no content response.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function noContent() {
        return response()->json(null, 204);
    }
}
