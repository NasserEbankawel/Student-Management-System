<?php

namespace App\Http\Controllers;
use App\Models\Course;
use App\Models\Subject;
use Illuminate\Http\Request;



class CourseController extends Controller
{
   
    

    public function index()
    {            
        //$courses = Course::all();
        $subjects = Subject::all();
        $courses = Course::simplePaginate(5);
      
        return view('courses.index',[
            "courses" => $courses
        ]) ;
        //return "This is the index function" ;
    }


    public function create()
    {   $subjects = Subject::all();
        return view('courses.create',[ "course" => new Course, 'subjects'=> $subjects ]);
       
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'coursename' => 'required|unique:courses|max:150|min:4',
            'description' => 'required|max:150|min:4',
            'subject_id' => 'required|array' ,
            'subject_id.*' => 'exists:subjects,id'

        ]); //data type is array

        /* 
        method 1 using save
        $newCourse = new Course ;
        $newCourse->coursename = $data['coursename'];
        $newCourse->description = $data['description'];
        $newCourse->save();
        return $newCourse; */

        //dd($data) ;

        //method 2
        
        $course = Course::create($data);

        $course->subjects()->sync($data['subject_id']);

        return redirect()->route('courses.index')->with('alertMessage',"Course {$data['coursename']} added successfully")->with('type', 'success');

    }

    public function edit(Course $course)
    {
        $subjects = Subject::all();
        return view('courses.edit',[ "course" => $course, 'subjects' => $subjects  ]);
        //
    }
    
    
    public function update(Request $request, Course $course)
    {
        $data = $request->validate([
            'coursename' => 'required|unique:courses,coursename,' . $course->id . '|max:150|min:4',
            'description' => 'required|max:150|min:4',
            'subject_id' => 'required|array',
            'subject_id.*' => 'exists:subjects,id'
        ]);
    
        $course->update($data);
        $course->subjects()->sync($data['subject_id']);

    
        return redirect()->route('courses.index')->with('alertMessage',"Course {$course->coursename} updated successfully")->with('type', 'success');
    }
    



    public function show($id)
    {    $course = Course::findOrFail($id);
        return view('courses.show', ['course' => $course]);
    }

 

  
    public function destroy(Course $course)
    {
        //
        $course->delete();
        return redirect()->route('courses.index')->with('alertMessage',"Course {$course->coursename} deleted successfully")->with('type', 'success');
    }



 

     
    
}




