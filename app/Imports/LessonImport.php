<?php

namespace App\Imports;

use App\Lesson;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
class LessonImport implements ToModel, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Lesson([
            'name'  => $row['lesson'],
            'course_id'   => $row['course_id'],
            'video_url'   => $row['video_url'],
        ]);
    }
}
