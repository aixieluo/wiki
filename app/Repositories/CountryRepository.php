<?php

namespace App\Repositories;

use App\Models\Country;

class CountryRepository
{
    use BaseRepository;

    protected $model;

    public function __construct(Country $country) {
        $this->model = $country;
    }

    public function destroy($id) {
        $this->model = $this->getById($id);
        if ($this->model->dancers()->count()) {
            return $message = '该国籍下存在关联钢舞姬,无法删除';
        }
        $this->model->delete();
    }
}