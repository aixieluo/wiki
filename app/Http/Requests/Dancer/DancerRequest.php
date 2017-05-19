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
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'required',
            'dance_outfit' => 'required',
            'type_id' => 'required | integer',
            'country_id' => 'required | integer',
            'rarity_id' => 'required | integer',
            'subjection' => 'required',
            'introduction' => 'nullable',
            'character' => 'nullable',
            'grow_fire' => 'required | numeric',
            'grow_penetrate' => 'required | numeric',
            'grow_durable' => 'required | numeric',
            'grow_armor' => 'required | numeric',
            'barbette' => 'required | numeric | between:0, 9',
            'refit' => 'required | numeric | between:0, 9',
            'outside' => 'required | numeric | between:0, 9',
            'inwall' => 'required | numeric | between:0, 9',
            'inwarehouse' => 'required | numeric | between:0, 9',
            'carriage' => 'required | numeric | between:0, 9',
            'special' => 'required | numeric | between:0, 9',
            'special' => 'required | numeric | between:0, 9'
        ];
    }

    public function messages() {
        return [
            'required' => '必填',
            'numeric' => '必须为数字',
            'between' => '必须是在:min-:max之间的数字'
        ];
    }
}
