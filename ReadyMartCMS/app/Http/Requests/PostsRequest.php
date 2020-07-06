<?php

namespace App\Http\Requests;

use App\Rules\PostTitle;
use Illuminate\Foundation\Http\FormRequest;

class PostsRequest extends FormRequest
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
            'title' => ['required', 'max:255', new PostTitle()],
            'slug' => ['required', 'max:100'],
            'image' => ['required', 'file'],
            'categories' => 'required',
            'appreance' => 'required',
            'type' => 'required'
        ];
    }


    /**
     * Custom Messages for posts insert requests
     */
    public function messages()
    {
        return [
            'title.required' => 'You must provide a post title!!!',
            'categories.required' => 'Please select atleast one category',
            'appreance.required' => 'Please select where the post should appear',
        ];
    }
}
