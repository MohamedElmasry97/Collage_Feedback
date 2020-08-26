<?php

namespace App\Imports;

use App\Models\Feedback;
use Maatwebsite\Excel\Concerns\Importable;
use Maatwebsite\Excel\Concerns\SkipsErrors;
use Maatwebsite\Excel\Concerns\SkipsFailures;
use Maatwebsite\Excel\Concerns\SkipsOnError;
use Maatwebsite\Excel\Concerns\SkipsOnFailure;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class FeedbacksImport implements ToModel, WithHeadingRow, SkipsOnError, SkipsOnFailure
{
    use Importable, SkipsFailures, SkipsErrors;

    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function model(array $row)
    {
        return new Feedback([
            'degree' => $row['degree'],
            'feedback_model_id' => $row['feedback_model_id'],
            'question' => $row['question'],
            'is_active' => $row['is_active'],
        ]);
    }

    public function rules(): array
    {
        return [
            'degree' => 'required',
            'feedback_model_id' => 'required',
            'question' => 'required',
            'is_active' => 'required',
        ];
    }
}
