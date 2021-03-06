<?php namespace TagProNews\Http\Requests\Admin\News;

use TagProNews\Http\Requests\Request;

class StoreArticleRequest extends Request
{
    /**
     * Determine if the user is authorized to make this request.
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     * @return array
     */
    public function rules()
    {
        return [
            'title'    => 'required|string|max:255',
            'content'  => 'required|string',
            'category' => 'required|integer|exists:categories,id'
        ];
    }

}
