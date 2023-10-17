<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreBookRequest extends FormRequest
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
            'title' => 'required|string|min:3|max:25|unique:books,title',
            'description' => 'required|string|min:15|max:255',
            'author_id'=> 'required|integer|exists:authors,id|min:1',
            'main_image' => 'file|mimes:jpg,png|max:5120',
        ];
    }
}
