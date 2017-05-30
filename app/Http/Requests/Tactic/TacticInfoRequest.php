<?php

namespace App\Http\Requests\Tactic;

use Illuminate\Foundation\Http\FormRequest;

class TacticInfoRequest extends FormRequest
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
        $id = $this->route('tacticInfo');

        return [
            'name' => 'required|unique:tactic_infos,name,' . $id . ',id,deleted_at,NULL'
        ];
    }
}
