<?php

namespace App\Http\Requests\Dancer;

use Illuminate\Foundation\Http\FormRequest;

class DancerRequest extends FormRequest
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
            'name'           => 'required',
            'dance_outfit'   => 'required',
            'type_id'        => 'required|exists:types,id',
            'country_id'     => 'required|exists:countries,id',
            'rarity_id'      => 'required|exists:rarities,id',
            'subjection'     => 'nullable',
            'introduction'   => 'nullable',
            'character'      => 'nullable',
            'grow_fire'      => 'required|numeric',
            'grow_penetrate' => 'required|numeric',
            'grow_durable'   => 'required|numeric',
            'grow_armor'     => 'required|numeric',
        ];
    }
}
