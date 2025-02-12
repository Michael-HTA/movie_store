<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateMovieRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'title' => 'nullable|string|max:255',
            'description' => 'nullable|string|min:10',
            'movie_image' => 'nullable|file|mimes:png,jpg,jpeg',
            'release' => 'nullable|date',
            'rating' => 'nullable|numeric',
            'movie_type_id' => 'nullable|exists:types,id',
            'director' => 'nullable',
            'trailer_link' => 'nullable|string',
            'production' => 'nullable',
            'males' => 'nullable',
            'males.*' => 'nullable',
            'females' => 'nullable',
            'females.*' => 'nullable',
            'genres' => 'nullable',
            'genres.*' => 'nullable',
        ];
    }

    public function messages()
    {
        return [
            'males.required' => 'Actors field must be necessary.',
            'males.*.required' => 'Actors field must be necessary.',
            'females.required' => 'Actress field must be necessary.',
            'females.*.required' => 'Actress field must be necessary.',
        ];
    }
}
