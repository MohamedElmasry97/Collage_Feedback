<?php

namespace App\Imports;

use App\Models\Course;
use Maatwebsite\Excel\Concerns\Importable;
use Maatwebsite\Excel\Concerns\SkipsErrors;
use Maatwebsite\Excel\Concerns\SkipsFailures;
use Maatwebsite\Excel\Concerns\SkipsOnError;
use Maatwebsite\Excel\Concerns\SkipsOnFailure;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class CoursesImport implements ToModel, WithHeadingRow, SkipsOnError, SkipsOnFailure
{
    use Importable, SkipsFailures, SkipsErrors;

    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function model(array $row)
    {
        return new Course([
            'name' => $row['name'],
            'department_id' => $row['department_id'],
            'type' => $row['type'],
            'symbolic' => $row['symbolic'],
        ]);
    }

    public function rules(): array
    {
        return [
            'name' => 'required',
            'department_id' => 'required',
            'type' => 'required',
            'symbolic' => 'required',
        ];
    }
}
