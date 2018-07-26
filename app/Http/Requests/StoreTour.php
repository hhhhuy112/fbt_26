<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreTour extends FormRequest
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
            'name' => 'required|max:255',
            'duration' => 'required|numeric',
            'itinerary' => 'required|max:255',
            'start_date' => 'required',
            'price' =>  'required',
            'image' => 'required|image',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => trans('name-required'),
            'name.max' => trans('name-max'),
            'duration.required' => trans('duration-required'),
            'duration.numeric' => trans('duration-numeric'),
            'start_date.required' => trans('start-date-required'),
            'start_date.date' => trans('start-date-date'),
            'price.required' => trans('price-required'),
            'image.required' => trans('image-required'),
            'image.image' => trans('image-image')
        ];
    }
}
