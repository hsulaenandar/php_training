<?php

namespace App\Exports;

use App\Models\Student\Student;
use Maatwebsite\Excel\Concerns\FromCollection;

class ExportUser implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Student::all();
        // return Student::select('name','email','phone_no','address','subject_id')->get();
    }
}
