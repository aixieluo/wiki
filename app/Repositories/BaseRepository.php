<?php

namespace App\Repositories;

use App\Models\Image;

trait BaseRepository
{
    public function getNumber() {

        return $this->model->count();
    }

    /**
     * @param $id
     *
     * @return mixed
     */
    public function getById($id) {

        return $this->model->findOrFail($id);
    }

    public function all($model = null) {

        return $model ? $model->all() : $this->model->all();
    }

    /**
     * @param int    $number
     * @param string $sort
     * @param string $sortColumn
     *
     * @return mixed
     */
    public function page($number = 10, $sort = 'desc', $sortColumn = 'id') {

        return $this->model->orderBy($sortColumn, $sort)->paginate($number);
    }

    /**
     * @param $data
     */
    public function store($input) {
        $input = $this->removeEmpty($input);
        $this->model->create($input);
    }

    /**
     * @param $id
     * @param $data
     *
     * @return mixed
     */
    public function update($id, $input) {
        $input = $this->removeEmpty($input);
        $this->getById($id)->update($input);
    }

    /**
     * @param $id
     *
     * @return mixed
     */
    public function destroy($id) {
        $this->getById($id)->delete();
    }

    public function save($model, $input) {

        return $model->fill($input)->save();
    }

    public function getByAttributes($id) {
        $this->model = $this->getById($id);

        return $this->model->attributes()->first();
    }

    public function createAttributes($attributes) {

        return $this->model->attributes()->create($attributes);
    }

    public function updateAttributes($attributes) {

        return $this->model->attributes()->first()->update($attributes);
    }

    public function deleteAttributes() {

        return $this->model->attributes()->delete();
    }

    public function updateImages($images) {
        foreach ($images as $image) {
            $imgs[] = new Image($image);
        }

        return $this->model->images()->saveMany($imgs);
    }

    public function removeEmpty($data) {

        return array_filter($data, function ($var) {
            return !empty($var);
        });
    }
}