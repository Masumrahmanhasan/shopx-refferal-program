<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TaskStoreRequest extends FormRequest
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
     * @return array
     */
    public function rules(): array
    {
        return [
            'title' => ['required', 'max:150'],
            'description' => ['required'],
            'url' => ['required'],
            'price' => ['required'],
            'status' => ['nullable'],
            'thumbnail' => ['required','image', 'mimes:jpeg,png,jpg,gif,webp', 'exclude']
        ];
    }

    protected function prepareForValidation(): void
    {
        if(!$this->has('status')) {
            $this->merge([
                'status' => 'active'
            ]);
        }
    }
}
