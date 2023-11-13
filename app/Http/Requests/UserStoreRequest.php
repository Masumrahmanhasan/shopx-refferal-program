<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class UserStoreRequest extends FormRequest
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
            'first_name' => ['required'],
            'last_name' => ['required'],
            'email' => ['required'],
            'phone' => ['required'],
            'password' => ['required', 'min:8'],
            'role' => ['required'],
            'referred_by' => ['required_if:role,user'],
            'avatar' => ['required', 'image', 'exclude'],
            'status' => ['required'],
            'referral_id' => ['nullable']
        ];
    }

    protected function prepareForValidation(): void
    {
        $this->merge([
            'referral_id' => random_int(111111, 999999)
        ]);
    }
}
