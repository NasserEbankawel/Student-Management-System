<?php

namespace App\Http\Controllers;
use App\Models\Subject;

use Illuminate\Http\Request;

class SubjectController extends Controller
{
    
    public function index()
    {
        
        $subjects = Subject::simplePaginate(5);
        //$subjects = Subject::all();
        return view('subjects.index', [
            "subjects" => $subjects
        ]) ;
        //return "This is the index function" ;

    }

    public function create()
    {


        return view('subjects.create',[ "subject" => new Subject ]);
    }
    public function store(Request $request)
    {
        $data = $request->validate([
            'subjectname' => 'required|unique:subjects|max:150|min:4',
            'description' => 'required|max:150|min:4'
        ]); //data type is array

        Subject::create($data);

        return redirect()->route('subjects.index')->with('alertMessage',"Subject {$data['subjectname']} added successfully")->with('type', 'success');
    }
    public function edit(Subject $subject)
    {
        return view('subjects.edit', ['subject' => $subject]);
    }

    public function update(Request $request, Subject $subject)
    {
        $data = $request->validate([
            'subjectname' => 'required|unique:subjects,subjectname,' . $subject->id . '|max:150|min:4',
            'description' => 'required|max:150|min:4'
        ]);
    
        $subject->update($data);
    
        return redirect()->route('subjects.index')->with('alertMessage',"Subject {$subject->subjectname} updated successfully")->with('type', 'success');
    }
    

    
    public function show($id)
    {    $subject = Subject::findOrFail($id);
        return view('subjects.show', ['subject' => $subject]);
    }

    
   
    public function destroy(Subject $subject)
    {
        //
        $subject->delete();
        return redirect()->route('subjects.index')->with('alertMessage',"Subject {$subject->subjectname} deleted successfully")->with('type', 'success');
    }

 

     
    
    

}
