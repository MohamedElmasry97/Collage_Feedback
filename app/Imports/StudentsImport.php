<?php

namespace App\Imports;

use App\Models\Student;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Concerns\Importable;
use Maatwebsite\Excel\Concerns\SkipsErrors;
use Maatwebsite\Excel\Concerns\SkipsFailures;
use Maatwebsite\Excel\Concerns\SkipsOnError;
use Maatwebsite\Excel\Concerns\SkipsOnFailure;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class StudentsImport implements ToModel, WithHeadingRow, SkipsOnError, SkipsOnFailure
{
    use Importable, SkipsFailures, SkipsErrors;

    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function model(array $row)
    {
        return new Student([
            'name' => $row['name'],
            'email' => $row['email'],
            'phone' => $row['phone'],
            'password' => Hash::make($row['password']),
            'department_name' => $row['department_name'],
        ]);
    }
    public function rules(): array
    {
        return [
            'name' => 'required|unique:students,name',
            'email' => 'required|email|unique:students,email',
            'phone' => 'required|digits|unique:students,phone',
            'password' => 'required',
            'department_name' => 'required',
        ];
    }
}
