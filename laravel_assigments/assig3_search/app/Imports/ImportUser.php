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
            'id' => $row[0],
            'name' => $row[1],
            'email' => $row[2],
            'phone_no' => $row[3],
            'address' => $row[4],
            'subject_id' => $row[5],
        ]);
    }
}
