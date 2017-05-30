<?php

namespace App\Http\Requests\Tactic;

use Illuminate\Foundation\Http\FormRequest;

class TacticRequest extends FormRequest
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
        $id = $this->route('tactic');

        return [
            'tactic_info_id'   => 'required|exists:tactic_infos,id',
            'lv'               => 'required|numeric|min:1|max:10|unique:tactics,lv,' . $id . ',id,deleted_at,NULL',
            'fire_up'          => 'nullable|numeric',
            'penetrate_up'     => 'nullable|numeric',
            'durable_up'       => 'nullable|numeric',
            'armor_up'         => 'nullable|numeric',
            'hit_up'           => 'nullable|numeric',
            'dodge_up'         => 'nullable|numeric',
            'concealment_up'   => 'nullable|numeric',
            'spy_up'           => 'nullable|numeric',
            'fire_down'        => 'nullable|numeric',
            'penetrate_down'   => 'nullable|numeric',
            'durable_down'     => 'nullable|numeric',
            'armor_down'       => 'nullable|numeric',
            'hit_down'         => 'nullable|numeric',
            'dodge_down'       => 'nullable|numeric',
            'concealment_down' => 'nullable|numeric',
            'spy_down'         => 'nullable|numeric',
        ];
    }
}
