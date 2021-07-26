<?php

namespace App\Http\Requests;

use App\Rules\MaxWordsRule;
use Illuminate\Foundation\Http\FormRequest;

class PostFormRequest extends FormRequest
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
        if(request()->isMethod('post')){

            return [
                //
                'title' => 'required|string|max:100',new MaxWordsRule(100),
                'description' => 'required',new MaxWordsRule(),
                'content' => 'required|string',
                'caption' => 'required',
                'keywords' => 'required',
                'image' => 'required|image|mimes:jpeg,png,jpg,gif,webp,svg,bmp|max:2048',
                'category'   => 'required|exists:categories,id',
            ];
        } else {
            return [
                'title' => 'required|string|max:100',new MaxWordsRule(100),
                'description' => 'required',new MaxWordsRule(),
                'content' => 'required|string',
                'caption' => 'required',
                'keywords' => 'required',
                'image' => 'required|image|mimes:jpeg,png,jpg,gif,webp,svg,bmp|max:2048',
                'category'   => 'required|exists:categories,id',
            ];
        }        
    }

    public function messages()
    {
        if(request()->isMethod('post')){

            return [
                'title.required' => 'The title is required',
                'description' => 'The description is required',
                'content' => 'The content is required',
                'caption' => 'The caption is required',
                'keywords' => 'The keywords are required',
                'image' => 'The image is required',
                'category'   => 'The category the article belongs to is required',
            ];
        }
    }
}
