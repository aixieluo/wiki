<?php

namespace App\Http\Requests\Technology;

use Illuminate\Foundation\Http\FormRequest;

class TechnologyCategoryRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize() {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules() {
        $id = $this->route('technologyCategory');

        return [
            'name' => 'required|unique:technology_categories,name,' . $id
        ];
    }
}
