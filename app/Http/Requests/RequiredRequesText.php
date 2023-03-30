<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RequiredRequestText extends FormRequest
{
	/**
	 * Determine if the user is authorized to make this request.
	 */
	public function authorize(): bool
	{
		return false;
	}

	/**
	 * Get the validation rules that apply to the request.
	 *
	 * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
	 */
	public function rules(): array
	{
		return [
			'username' => 'required',
			'password' => 'required',
		];
	}

	public function messages()
	{
		return[
			'username.required' => 'Поле "Логин" является обязательным для заполнения.',
			'password.required' => 'Поле "Пароль" является обязательным для заполнения.'
		];
	}
}
