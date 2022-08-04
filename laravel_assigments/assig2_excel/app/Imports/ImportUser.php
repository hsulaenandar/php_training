<?php

namespace App\Imports;

use App\Models\Student\Student;
use Maatwebsite\Excel\Concerns\ToModel;

class ImportUser implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Student([
            'name' => $row[0],
            'email' => $row[1],
            'phone_no' => $row[2],
            'address' => $row[3],
            'subject_id' => $row[4],
        ]);
    }
}
