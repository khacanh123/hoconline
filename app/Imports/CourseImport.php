<?php

namespace App\Imports;

use App\Course;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
class CourseImport implements ToModel, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Course([
            'name'  => $row['name'],
            'price'   => $row['price'],
            'description'   => $row['intro'],
            'price_sale'    => $row['price_sale'],
            'course_code'  => $row['course_code'],
            'time'   => $row['time'],
            'number_lesson'   => $row['number_lesson'],
            'image'         =>$row['image']
        ]);
    }
}
