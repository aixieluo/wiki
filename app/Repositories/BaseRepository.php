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
    public function store($data) {
        return $this->model->create($data);
    }

    /**
     * @param $id
     * @param $data
     *
     * @return mixed
     */
    public function update($id, $data) {
        $type = $this->getById($id);

        return $type->update($data);
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