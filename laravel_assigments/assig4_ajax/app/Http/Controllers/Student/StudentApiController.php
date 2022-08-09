<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\ImportUser;
use App\Exports\ExportUser;
use App\Models\Student\Student;
use App\Models\Subject\Subject;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use App\Contracts\Services\Student\StudentServiceInterface;

class StudentApiController extends Controller
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
        $students = $this->studentInterface->getStudentList();
        $subject = $this->studentInterface->showSubject();
                
        return view('student.ajax-crud', compact('students','subject'));
    }
    
    public function store(Request $request) {  
        $students = $this->studentInterface->store($request);
        return response()->json(['success' => 'Create Successful', 'student'=>$students]);

    }
    
    public function show($id) {
        $student = $this->studentInterface->show($id);
        return response()->json($student);

    }

    public function update(Request $request) {
        $students = $this->studentInterface->update($request);
        return response()->json(['success' => 'Updated Successful', 'student'=>$students]);
    }

    public function destroy(Request $request) {
        $students = $this->studentInterface->destroy($request); 
        return response()->json(['success' => true]);
    }

    public function importView(Request $request){
        return view('importFile');
    }

    public function import(Request $request){
        $this->studentInterface->import($request);
        return redirect()->back();
    }

    public function exportUsers(Request $request){
        return $this->studentInterface->exportUsers($request);
    }

    public function search(Request $request) {
        $students = $this->studentInterface->search($request);
        return view('student.index',['students' => $students]);
    }
        
}
