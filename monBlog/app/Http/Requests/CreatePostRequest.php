<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreatePostRequest extends FormRequest
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
            'titre'  => ['required', 'min:3'],
            'slug'  => ['required'],
            'contenu'=> ['required', 'min:10'],
            'categories'=> ['array', 'exists:categories,id','required'],
            'image'  => ['required','image'],
            'titre1'  => ['required', 'min:3'],
            'titre2'  => ['required', 'min:3'],
            'titre3'  => ['min:3'],
            'paragraphe1'=> ['required', 'min:10'],
            'paragraphe2'=> ['required', 'min:10'],
            'paragraphe3'=> ['min:10'],
            'image1'  => ['image'],
            'image2'  => ['image'],
            'image3'  => ['image'],
            'conclusion'=> ['required', 'min:10'],
            'user_id'    => ['exists:users,id'],
        ];
    }
}
