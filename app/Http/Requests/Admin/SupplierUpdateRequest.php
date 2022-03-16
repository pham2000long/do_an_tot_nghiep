<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class SupplierUpdateRequest extends FormRequest
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
        // dd($this->route()->supplier);
        return [
            'name' => sprintf(
                'required|string|max:255|unique:suppliers,name,%s,id',
                $this->route()->supplier
            ),
            'address' => 'nullable|string',
            'phone' => 'required|string|max:12',
            'email' => sprintf(
                'required|string|max:255|unique:suppliers,email,%s,id',
                $this->route()->supplier
            )
        ];
    }
}
