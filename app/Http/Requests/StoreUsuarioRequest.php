<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class StoreUsuarioRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return Auth::check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'nome' => ['required'],
            'telefone' => ['required', 'unique:usuarios', 'min:14', 'max:15'],
            'email' => ['required', 'unique:usuarios'],
            'senha' => ['required', 'min:8', 'max:15'],
        ];
    }
}
