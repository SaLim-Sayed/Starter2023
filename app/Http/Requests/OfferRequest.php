<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class OfferRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules()
    {
        return [
            'name_en' => 'required|string|unique:offers,name_en|max:100',
            'name_ar' => 'required|string|unique:offers,name_ar|max:100',
            'price' => 'required|numeric',
            'details_en' => 'required|string',
            'details_ar' => 'required|string',
        ];
    }
    public function messages(){
        return [
            'name.required' => __('messages.offer name required'),
            'details.required' => 'تفاصيل العرض مطلوبة',
            'name.unique' => __('messages.offer name must be unique'),
            'price.required' => 'سعر العرض مطلوب',
            'price.numeric' => 'سعر العرض يجب ان يكون رقماََ',
        ];
    }
}
