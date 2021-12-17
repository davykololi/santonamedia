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
                'tags'   => 'required|exists:tags,id',
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
                'tags'   => 'required|exists:tags,id',
            ];
        }        
    }

    public function messages()
    {
        if(request()->isMethod('post')){

            return [
                'title.required' => 'The title of the article is required',
                'description.required' => 'The description of the article is required',
                'content.required' => 'The content of the article is required',
                'caption.required' => 'The name of the fetured image is required',
                'keywords.required' => 'The keywords for the article are required',
                'image.required' => 'The featured image for the article is required',
                'category.required'   => 'The category the article belongs to is required',
                'tags.required'   => 'The tags for this article are required',
            ];
        }

        if(request()->isMethod('put')){

            return [
                'title.required' => 'The title of the article is required',
                'description.required' => 'The description of the article is required',
                'content.required' => 'The content of the article is required',
                'caption.required' => 'The name of the fetured image is required',
                'keywords.required' => 'The keywords for the article are required',
                'image.required' => 'The featured image for the article is required',
                'category.required'   => 'The category the article belongs to is required',
                'tags.required'   => 'The tags for this article are required',
            ];
        }
    }
}
