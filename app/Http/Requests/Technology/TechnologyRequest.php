<?php

namespace App\Http\Requests\Technology;

use Illuminate\Foundation\Http\FormRequest;

class TechnologyRequest extends FormRequest
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
        $id = $this->route('technology');

        return [
            'technology_type_id' => 'required|numeric|exists:technology_types,id',
            'name'               => 'required|unique:technologies,name,' . $id . ',id,technology_type_id,' . $this->technology_type_id,
            'rank'               => 'required|numeric|min:1|max:3',
            'row'                => 'required|numeric|min:1|max:5',
            'column'             => 'required|numeric|min:1|max:6',
            'place'              => 'required',
            'fire'               => 'nullable|numeric',
            'penetrate'          => 'nullable|numeric',
            'durable'            => 'nullable|numeric',
            'armor'              => 'nullable|numeric',
            'hit'                => 'nullable|numeric',
            'dodge'              => 'nullable|numeric',
            'concealment'        => 'nullable|numeric',
            'spy'                => 'nullable|numeric'
        ];
    }
}
