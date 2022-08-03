<?php

namespace App\Http\Controllers\Subject;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Subject\Subject;
use App\Models\Student\Student;
use Illuminate\Support\Facades\Validator;
use App\Contracts\Services\Subject\SubjectServiceInterface;

class SubjectController extends Controller
{
        /**
     * subject interface
     */
    private $subjectInterface;
    /**
     * Create a new controller instance.
     * @param SubjectServiceInterface $subjectServiceInterface
     * @return void
     */
    public function __construct(SubjectServiceInterface $subjectServiceInterface)
    {
        
        $this->subjectInterface = $subjectServiceInterface;
    }

    public function index() {
        // $subjects = Subject::all();

        $subjects = $this->subjectInterface->getSubjectList();
        return view('subject.index',['subjects'=>$subjects]);
    }

    public function create(){
        return view('subject.create');
    }
    
    public function store(Request $request) {
        
        $subjects = $this->subjectInterface->store($request);
        return redirect()->back()->with('status', "Subject Created Successfully");
       
    }
    
    public function show($id) {
        // $subject = Subject::find($id);

        $subjects = $this->subjectInterface->show($id);
        return view('subject.edit', ['subject'=>$subjects]);
    }

    public function update(Request $request, $id) {
        
        $subjects = $this->subjectInterface->update($request, $id);
        return redirect('subject/index')->with('status', "Subject Updated Successfully");
    }

    public function destroy($id) {
        // Subject::destroy($id);

        $subjects = $this->subjectInterface->destroy($id);
        return redirect()->back()->with('status', "Subject Deleted Successfully");
    }

   

}
