<?php

namespace App\Http\Requests;

use App\Providers\Services\AuthService;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class AuthorIndexRequest extends FormRequest
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
            'query' => 'sometimes|string',
            'orderBy' => ['sometimes', Rule::in(['id', 'first_name', 'last_name'])],
            'direction' => 'sometimes|in:ASC,DESC',
            'limit' => 'sometimes|integer|min:1',
            'page' => 'sometimes|integer|min:1'
        ];
    }
}
