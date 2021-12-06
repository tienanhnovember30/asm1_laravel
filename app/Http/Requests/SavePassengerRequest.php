<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class SavePassengerRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        
        $requestRule =  [
            'name' => [
                'required',
                Rule::unique('passengers')->ignore($this->id)
            ],
            'travel_time' => 'required',
            'avatar' => 'mimes:jpg,jpeg,png,gif'
        ];
        
        if($this->id == null){
            $requestRule['avatar'] = "required|" . $requestRule['avatar'];
        }

        return $requestRule;
    }
    public function messages()
    {
        return [
            'name.required' => 'Hãy nhập tên khách hàng',
            'name.unique' => 'Tên khách hàng đã tồn tại',
            'travel_time.required' => 'Hãy nhập giá sản phẩm',
            'avatar.required' => 'Hãy chọn ảnh sản phẩm',
            'avatar.mimes' => 'Cần chọn đúng định dạng ảnh'
        ];
    }
}
