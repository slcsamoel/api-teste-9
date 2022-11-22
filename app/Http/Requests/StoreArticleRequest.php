<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreArticleRequest extends FormRequest
{

    /**
     * Indicates if the validator should stop on the first rule failure.
     *
     * @var bool
     */
    protected $stopOnFirstFailure = true;

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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'title' => 'required|max:255',
            'url' => 'required|max:255',
            'imageUrl' => 'required|max:255',
            'newsSite' => 'required|max:255',
            'summary' => 'required',
            'publishedAt' => 'required',
            'featured' => 'required|boolean',
        ];
    }

    public function messages()
    {
        return [
            'title.required' => 'A title is required',
            'url.required' => 'A url is required',
            'imageUrl.required' => 'A imageUrl is required',
            'newsSite.required' => 'A newSite is required',
            'summary.required' => 'A summary is required',
            'publishedAt.required' => 'A publishedAt is required',
            'featured.required' => 'A featured is required',
        ];
    }
}
