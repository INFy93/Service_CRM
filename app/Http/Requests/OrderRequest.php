<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class OrderRequest extends FormRequest
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
            'status' => 'required',
            'manager_id' => 'required',
            'service' => 'required',
            'product' => 'required',
            'product_complection' => 'required',
            'model' => 'required',
            'model_full_name' => 'string',
            'malfunction' => 'required',
            'appearance' => 'required',
            'client_login' => 'required',
            'client_phone' => [
                'required',
                'regex:/^(\+7)?[\s\-]?\(?[489][0-9]{2}?[\s\-]?[0-9]{3}[\s\-]?[0-9]{2}[\s\-]?[0-9]{2}$/'
                ],
            'marks' => 'string',
            'works' => 'string'
        ];
    }

    public function messages(): array
    {
        return [
            'product.required' => 'Необходимо ввести тип устройства.',
            'product_complection.required' => 'Необходимо ввести комплектацию.',
            'model.required' => 'Необходимо ввести бренд.',
            'malfunction.required' => 'Необходимо ввести неисправность.',
            'appearance.required' => 'Необходимо ввести состояние устройства.',
            'client_login.required' => 'Необходимо ввести логин.',
            'client_phone.required' => 'Необходимо ввести телефон.',
            'client_phone.regex' => 'Проверьте формат: +7хххххххххх. Без плюса, скобок и пробелов',

        ];
    }
}
