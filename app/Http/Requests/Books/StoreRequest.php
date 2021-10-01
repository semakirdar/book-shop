<?php

namespace App\Http\Requests\Books;

use Illuminate\Foundation\Http\FormRequest;

class StoreRequest extends FormRequest
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
            'category_id' => 'required',
            'publisher_id' => 'required',
            'page_count' => 'required',
            'description' => 'required',
            'publish_date' => 'required',
            'author' => 'required',
            'image' => 'required'

        ];
    }
}
