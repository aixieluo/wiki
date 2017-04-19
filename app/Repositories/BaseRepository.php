<?php

namespace App\Repositories;

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

    public function all() {

        return $this->model->all();
    }

    /**
     * @param int $number
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

        return $this->save($this->model, $input);
    }

    /**
     * @param $id
     * @param $data
     *
     * @return mixed
     */
    public function update($id, $input) {
        $this->model = $this->getById($id);

        return $this->save($this->model, $input);
    }

    public function save($model, $input) {

        return $model->fill($input)->save();
    }

    /**
     * @param $id
     *
     * @return mixed
     */
    public function destroy($id) {
        return $this->getById($id)->delete();
    }
}