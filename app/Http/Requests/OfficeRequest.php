<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class OfficeRequest extends FormRequest
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
            'name' => ['required','max:50'],
            'address' => ['required','max:255','unique:offices,address,'. $this->address.',address'],
            'post_code' => ['nullable','digits:7'],
            'stair' => ['required'],
        ];
    }

    public function messages(){
        return [
            'name.required' => '施設名を入力してください',
            'name.max' => '施設名は50文字以内で入力してください',
            'address.required' => 'ビル名を入力してください',
            'address.max' => 'ビル名は255文字以内で入力してください',
            'address.unique' => 'このビル名はすでに登録されています',
            'post_code.digits' => '郵便番号は7桁で入力してください',
            'stair.required' => '募集階を入力してください',
        ];
    }
}
