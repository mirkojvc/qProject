<?php

namespace App\Http\Requests;

use App\Providers\Services\AuthService;
use Illuminate\Foundation\Http\FormRequest;

class StoreBookRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return AuthService::isAuth();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'title' => 'required|max:255',
            'author_id' => 'required|integer',
            'description' => 'required',
            'isbn' => 'required',
            'release_date' => 'required|date',
            'format' => 'required',
            'number_of_pages' => 'required|integer|min:1'
        ];
    }
    public function messages()
    {
        return [
            'title.required' => 'The title of the book is required.',
            'isbn.unique' => 'The ISBN has already been taken. Please use another ISBN.'
        ];
    }
}
