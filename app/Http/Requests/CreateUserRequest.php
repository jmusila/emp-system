<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateUserRequest extends FormRequest
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
            'firstname' => ['required', 'string'],
            'othername' => ['filled', 'string'],
            'surname' => ['required', 'string'],
            'title' => ['required', 'string'],
            'dob' => ['required', 'date'],
            'gender' => ['required', 'string'],
            'nationality' => ['required', 'string'],
            'ethnicity' => ['integer', 'exists:ethnicities,id'],
            'county' =>  ['integer', 'exists:counties,id'],
            'address' => ['filled', 'string'],
            'code' => ['filled', 'string'],
            'telephone_number' => ['nullable', 'string'],
            'mobile_number' => ['required', 'string', 'unique:users'],
            'email' => ['required', 'email', 'unique:users'],
            'alternative_contact_person' => ['filled', 'string'],
            'living_with_disability' => ['required', 'string', 'unique:users'],
            'nature_of_disability' => ['nullable', 'required_with:living_with_disability'],
            'disability_reg_no' => ['nullable', 'required_with:living_with_disability'],
            'disability_reg_date' => ['nullable', 'required_with:living_with_disability'],
        ];
    }
}
