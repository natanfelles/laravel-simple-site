<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ContactStoreRequest extends FormRequest
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
			'name' => 'required|min:5|max:64',
			'email' => 'required|email',
			'subject' => 'required|min:10|max:255',
			'message' => 'required|min:10|max:2048',
		];
	}

	public function attributes()
	{
		return [
			'name' => __('contact.name'),
			'email' => __('contact.email'),
			'subject' => __('contact.subject'),
			'message' => __('contact.message'),
		];
	}
}
