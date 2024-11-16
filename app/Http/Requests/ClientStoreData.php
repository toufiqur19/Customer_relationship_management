<?php

namespace App\Http\Requests;

use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class ClientStoreData extends FormRequest
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
            'contact_name' => ['required','string','max:255'],
            'contact_email' => ['required','email',Rule::unique('clients')],
            'contact_phone' => ['required'],
            'company_name' => ['required'],
            'company_address' => ['required'],
            'company_city' => ['required','string'],
            'company_zip' => ['required','integer'],
            'company_vat' => ['required','numeric'],
        ];
    }
}
