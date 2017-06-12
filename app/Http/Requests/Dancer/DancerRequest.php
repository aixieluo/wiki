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
        $id = $this->route('dancer');

        return [
            'name'           => 'required|unique:dancers,name,' . $id,
            'dance_outfit'   => 'required|unique:dancers,dance_outfit,' . $id,
            'type_id'        => 'required|exists:types,id',
            'country_id'     => 'required|exists:countries,id',
            'rarity_id'      => 'required|exists:rarities,id',
            'subjection'     => 'nullable',
            'introduction'   => 'nullable',
            'character'      => 'nullable',
            'grow_fire'      => 'nullable|numeric|min:0',
            'grow_penetrate' => 'nullable|numeric|min:0',
            'grow_durable'   => 'nullable|numeric|min:0',
            'grow_armor'     => 'nullable|numeric|min:0',
            'fire'           => 'nullable|numeric|min:0',
            'penetrate'      => 'nullable|numeric|min:0',
            'durable'        => 'nullable|numeric|min:0',
            'armor'          => 'nullable|numeric|min:0',
            'hit'            => 'nullable|numeric|min:0',
            'dodge'          => 'nullable|numeric|min:0',
            'concealment'    => 'nullable|numeric|min:0',
            'spy'            => 'nullable|numeric|min:0',
            'slots'          => 'nullable'
        ];
    }
}
