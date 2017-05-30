<?php

namespace App\Http\Requests\Skill;

use Illuminate\Foundation\Http\FormRequest;

class SkillRequest extends FormRequest
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
        $id = $this->route('skill');

        return [
            'skill_info_id'   => 'required|exists:skill_infos,id',
            'lv'               => 'required|numeric|min:1|max:10|unique:skills,lv,' . $id . ',id,deleted_at,NULL',
            'fire_up'          => 'nullable|numeric',
            'penetrate_up'     => 'nullable|numeric',
            'durable_up'       => 'nullable|numeric',
            'armor_up'         => 'nullable|numeric',
            'hit_up'           => 'nullable|numeric',
            'dodge_up'         => 'nullable|numeric',
            'concealment_up'   => 'nullable|numeric',
            'spy_up'           => 'nullable|numeric',
        ];
    }
}
