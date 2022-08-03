<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Student\Student;
use App\Models\Subject\Subject;
use Illuminate\Support\Facades\Validator;
use App\Contracts\Services\Student\StudentServiceInterface;

class StudentController extends Controller
{
        /**
     * student interface
     */
    private $studentInterface;
    /**
     * Create a new controller instance.
     * @param StudentServiceInterface $studentServiceInterface
     * @return void
     */
    public function __construct(StudentServiceInterface $studentServiceInterface)
    {
        
        $this->studentInterface = $studentServiceInterface;
    }
    
    public function index() {
        // $students = Student::all();

        $students = $this->studentInterface->getStudentList();
        return view('student.index',['students'=>$students]);
    }

    public function create(){
        $subjects = Subject::all();

        $students = $this->studentInterface->create();
        return view('student.create',['subjects'=>$subjects]);
    }

    public function store(Request $request) {
       
        
        $students = $this->studentInterface->store($request);
        return redirect()->back()->with('status', "Student Created Successfully");
       
    }
    
    public function show($id) {
        // $student = Student::find($id);
        $subjects = Subject::all();
        $student = $this->studentInterface->show($id);
        return view('student.edit', ['student'=>$student, 'subjects'=>$subjects]);

    }

    public function update(Request $request, $id) {
        

        $students = $this->studentInterface->update($request, $id);
        return redirect('index')->with('status', "Student Updated Successfully");
    }

    public function destroy($id) {
        // Student::destroy($id);
        $students = $this->studentInterface->destroy($id); 
        return redirect()->back()->with('status', "Student Deleted Successfully");
    }
}