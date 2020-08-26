<?php

namespace App\Http\Requests\Instructor;

use Illuminate\Foundation\Http\FormRequest;

class Update extends FormRequest
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
        $user = $this->route('instructor');
        return [
            'name' => 'required|min:3',
            'email' => 'required|email|unique:instructors,email,' . $user,
            'phone' => 'required|min:10|max:11',
        ];
    }
}
