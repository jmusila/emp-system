<?php

namespace App\Http\Requests;

use App\Enums\Titles;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

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
            'title' => ['required', 'string', Rule::in(array_column(Titles::cases(), 'value'))],
            'dob' => ['required', 'date'],
            'gender' => ['required', 'string', Rule::in(['male', 'female'])],
            'nationality' => ['required', 'string'],
            'ethnicity' => ['integer', 'exists:ethnicities,id'],
            'county' =>  ['integer', 'exists:counties,id'],
            'address' => ['filled', 'string'],
            'code' => ['filled', 'string'],
            'telephone_number' => ['nullable', 'string'],
            'mobile_number' => ['required', 'string', 'unique:users'],
            'email' => ['required', 'email', 'unique:users'],
            'alternative_contact_person' => ['filled', 'string'],
            'living_with_disability' => ['required', 'string', Rule::in(['yes', 'no'])],
            'nature_of_disability' => ['nullable', 'required_if:living_with_disability,yes'],
            'disability_reg_no' => ['nullable', 'required_if:living_with_disability,yes'],
            'disability_reg_date' => ['nullable', 'required_if:living_with_disability,yes'],
            'password' => ['required', 'string'],
        ];
    }
}
