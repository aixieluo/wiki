<?php

namespace App\Http\Requests\Equipment;

use Illuminate\Foundation\Http\FormRequest;

class EquipmentInfoRequest extends FormRequest
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
        $id = $this->route('equipmentInfo');

        return [
            'name'     => 'required|unique:equipment_infos,name,' . $id,
            'describe' => 'nullable',
            'slots'    => 'required',
            'main'     => 'required|in_array:slots'
        ];
    }
}
