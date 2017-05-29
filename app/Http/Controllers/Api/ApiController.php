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
     * Get the status code.
     *
     * @return int $statusCode
     */
    public function getStatusCode() {

        return $this->statusCode;
    }

    /**
     * Set the status code.
     *
     * @param $statusCode
     *
     * @return $this
     */
    public function setStatusCode($statusCode) {
        $this->statusCode = $statusCode;

        return $this;
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
        return response()->json($array, $this->getStatusCode(), $headers);
    }

    /**
     * Respond a no content response.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function noContent() {

        return response()->json(null, 204);
    }

    public function respondWithError($message) {

        return $this->respondWithArray([
            'error' => [
                'message'   => $message,
                'http_code' => $this->getStatusCode()
            ]
        ]);
    }

    /**
     * Respond the error of 'Forbidden'
     *
     * @param  string $message
     * @return json
     */
    public function errorForbidden($message = 'Forbidden') {

        return $this->setStatusCode(403)
                    ->respondWithError($message);
    }

    /**
     * Respond the error of 'Internal Error'.
     *
     * @param  string $message
     * @return json
     */
    public function errorInternalError($message = 'Internal Error') {

        return $this->setStatusCode(500)
                    ->respondWithError($message);
    }

    /**
     * Respond the error of 'Resource Not Found'
     *
     * @param  string $message
     * @return json
     */
    public function errorNotFound($message = 'Not Found') {

        return $this->setStatusCode(404)
                    ->respondWithError($message);
    }

    /**
     * Respond the error of 'Unauthorized'.
     *
     * @param  string $message
     * @return json
     */
    public function errorUnauthorized($message = 'Unauthorized') {

        return $this->setStatusCode(401)
                    ->respondWithError($message);
    }

    /**
     * Respond the error of 'Wrong Arguments'.
     *
     * @param  string $message
     * @return json
     */
    public function errorWrongArgs($message = 'Wrong Arguments') {

        return $this->setStatusCode(400)
                    ->respondWithError($message);
    }
}
