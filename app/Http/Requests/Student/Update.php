<?php

namespace App\Http\Requests\Student;

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
        $user = $this->route('student');
        return [
            'name' => 'required|min:3',
            'email' => 'required|email|unique:students,email,' . $user,
            'phone' => 'required|digits_between:10,11',
            'department_name' => 'required|in:CS,IS,General',
        ];
    }
}
