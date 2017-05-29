<?php

namespace App\Http\Requests\Equipment;

use Illuminate\Foundation\Http\FormRequest;

class EquipmentRequest extends FormRequest
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
            'equipment_info_id' => 'required|numeric|exists:equipment_infos,id',
            'lv'                => 'required|numeric|min:1|max:10',
            'price'             => 'required|numeric',
            'fire'              => 'required|numeric',
            'penetrate'         => 'required|numeric',
            'durable'           => 'required|numeric',
            'armor'             => 'required|numeric',
            'hit'               => 'required|numeric',
            'dodge'             => 'required|numeric',
            'concealment'       => 'required|numeric',
            'spy'               => 'required|numeric',
        ];
    }
}
