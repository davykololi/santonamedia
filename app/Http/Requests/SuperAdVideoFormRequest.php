<?php

namespace App\Http\Requests;

use App\Rules\MaxWordsRule;
use Illuminate\Foundation\Http\FormRequest;

class SuperAdVideoFormRequest extends FormRequest
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
                'video' => 'required|mimes:mpeg,ogg,mp4,webm,3gp,mov,flv,avi,wmv,ts|max:9000040',
                'category'   => 'required|exists:categories,id',
                'tags'   => 'required|exists:tags,id',
                'admin'   => 'required|exists:admins,id',
            ];
        } else {
            return [
                'title' => 'required|string|max:100',new MaxWordsRule(100),
                'description' => 'required',new MaxWordsRule(),
                'content' => 'required|string',
                'caption' => 'required',
                'keywords' => 'required',
                'video' => 'required|mimes:mpeg,ogg,mp4,webm,3gp,mov,flv,avi,wmv,ts|max:9000040',
                'category'   => 'required|exists:categories,id',
                'tags'   => 'required|exists:tags,id',
                'admin'   => 'required|exists:admins,id',
            ];
        }        
    }

    public function messages()
    {
        if(request()->isMethod('post')){

            return [
                'title.required' => 'The title of the video is required',
                'description.required' => 'The description of the video is required',
                'content.required' => 'The video content is required is required',
                'caption.required' => 'The name of the video is required',
                'keywords.required' => 'The video keywords are required',
                'video.required' => 'The video clip is required',
                'category.required'   => 'The category the video belongs to is required',
                'admin.required'   => 'The name of the author is required',
                'tags.required'   => 'The tags for this video are required',
            ];
        }

        if(request()->isMethod('put')){

            return [
                'title.required' => 'The title of the video is required',
                'description.required' => 'The description of the video is required',
                'content.required' => 'The video content is required is required',
                'caption.required' => 'The name of the video is required',
                'keywords.required' => 'The video keywords are required',
                'video.required' => 'The video clip is required',
                'category.required'   => 'The category the video belongs to is required',
                'admin.required'   => 'The name of the author is required',
                'tags.required'   => 'The tags for this video are required',
            ];
        }
    }
}
