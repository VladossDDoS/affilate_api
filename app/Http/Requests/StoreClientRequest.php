<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\JsonResponse;

class StoreClientRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => ['required', 'string'],
            'surname' => ['required', 'string'],
            'phone' => ['required', 'string', 'unique:clients,phone'],
            'email' => ['required', 'email', 'unique:clients,email'],
            'country' => ['required', 'string']
        ];
    }

    public function failedValidation(Validator $validator)
    {
        $response = new JsonResponse(['data' => [],
            'meta' => [
                'message' => 'The given data is invalid',
                'errors' => $validator->errors()
            ]], 400);

        throw new \Illuminate\Validation\ValidationException($validator, $response);
    }
}
