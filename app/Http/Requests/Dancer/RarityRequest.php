<?php

namespace App\Http\Requests\Dancer;

use Illuminate\Foundation\Http\FormRequest;

class RarityRequest extends FormRequest
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
        $id = $this->route('rarity');

        return [
            'lv'   => 'required|numeric|unique:rarities,lv,' . $id,
            'name' => 'required|unique:rarities,name,' . $id
        ];
    }
}
