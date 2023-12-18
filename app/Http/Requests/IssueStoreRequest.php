<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;


class IssueStoreRequest extends FormRequest
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
            'label' => 'required|string|max:255',
            'type' => 'required|string|max:255',
            'purchase_product_id' => 'nullable|exists:products,id',
            'free_product_id' => 'nullable|exists:products,id',
            'purchase_quantity' => 'nullable|integer|min:0',
            'free_quantity' => 'nullable|integer|min:0',
            'lower_limit' => 'nullable|integer|min:0',
            'upper_limit' => 'nullable|integer|min:0',
        ];
    }
}
