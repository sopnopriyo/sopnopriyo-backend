<?php namespace App\Http\Requests;

class SliderRequest extends Request {

	/**
	 * Get the validation rules that apply to the request.
	 *
	 * @return array
	 */
	public function rules()
	{
		return [
			'title' => 'required|max:100',
			'description' => 'required|max:300',
			'file_name'     => 'required|image|mimes:jpeg,png|min:1'
		];
	}

}
