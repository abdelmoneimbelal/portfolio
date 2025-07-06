<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MessageRequest extends FormRequest
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
            'name'    => 'required|string|max:255',
            'email'   => 'required|email|max:255',
            'phone'   => 'nullable|string|max:20',
            'subject' => 'required|string|max:255',
            'message' => 'required|string',
        ];
    }

    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array<string, string>
     */
    public function messages(): array
    {
        return [
            'name.required'    => 'Name is required',
            'name.string'      => 'Name must be a string',
            'name.max'         => 'Name may not be greater than 255 characters',
            'email.required'   => 'Email is required',
            'email.email'      => 'Email must be a valid email address',
            'email.max'        => 'Email may not be greater than 255 characters',
            'phone.string'     => 'Phone must be a string',
            'phone.max'        => 'Phone may not be greater than 20 characters',
            'subject.required' => 'Subject is required',
            'subject.string'   => 'Subject must be a string',
            'subject.max'      => 'Subject may not be greater than 255 characters',
            'message.required' => 'Message is required',
            'message.string'   => 'Message must be a string',
        ];
    }
} 