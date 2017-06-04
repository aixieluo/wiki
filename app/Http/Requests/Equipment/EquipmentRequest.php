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
        $id = $this->route('equipment');

        return [
            'equipment_info_id' => 'required|exists:equipment_infos,id',
            'lv'                => 'required|numeric|min:1|max:10|unique:equipment,lv,' . $id . ',id,equipment_info_id,' . $this->equipment_info_id,
            'price'             => 'required|numeric',
            'fire'              => 'nullable|numeric',
            'penetrate'         => 'nullable|numeric',
            'durable'           => 'nullable|numeric',
            'armor'             => 'nullable|numeric',
            'hit'               => 'nullable|numeric',
            'dodge'             => 'nullable|numeric',
            'concealment'       => 'nullable|numeric',
            'spy'               => 'nullable|numeric'
        ];
    }
}
