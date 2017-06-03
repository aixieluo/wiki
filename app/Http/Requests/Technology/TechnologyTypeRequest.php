<?php

namespace App\Http\Requests\Technology;

use Illuminate\Foundation\Http\FormRequest;

class TechnologyTypeRequest extends FormRequest
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
        $id = $this->route('technologyType');

        return [
            'technology_category_id' => 'required|numeric|exists:technology_categories,id',
            'name'                   => 'required|unique:technology_types,name,' . $id . ',id,technology_category_id,' . $this->technology_category_id
        ];
    }
}
