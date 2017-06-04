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
            'grow_fire'      => 'nullable|numeric',
            'grow_penetrate' => 'nullable|numeric',
            'grow_durable'   => 'nullable|numeric',
            'grow_armor'     => 'nullable|numeric',
            'fire'           => 'nullable|numeric',
            'penetrate'      => 'nullable|numeric',
            'durable'        => 'nullable|numeric',
            'armor'          => 'nullable|numeric',
            'hit'            => 'nullable|numeric',
            'dodge'          => 'nullable|numeric',
            'concealment'    => 'nullable|numeric',
            'spy'            => 'nullable|numeric'
        ];
    }
}
