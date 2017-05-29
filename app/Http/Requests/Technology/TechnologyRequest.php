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
        return [
            'technology_type_id' => 'required|numeric|exists:technology_types,id',
            'name'               => 'required',
            'rank'               => 'required|numeric|min:1|max:3',
            'row'                => 'required|numeric|min:1|max:5',
            'column'             => 'required|numeric|min:1|max:6',
            'place'              => 'required',
            'fire'               => 'required|numeric',
            'penetrate'          => 'required|numeric',
            'durable'            => 'required|numeric',
            'armor'              => 'required|numeric',
            'hit'                => 'required|numeric',
            'dodge'              => 'required|numeric',
            'concealment'        => 'required|numeric',
            'spy'                => 'required|numeric',
        ];
    }
}
