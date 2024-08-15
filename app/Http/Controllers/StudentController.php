<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;
use App\Models\Course;
use Illuminate\Validation\Rule;
use App\Mail\StudentAdded;
use Illuminate\Support\Facades\Mail;


class StudentController extends Controller
{
   


    public function index(Request $request)
    {
        //$students = Student::all() ;
       //$students = Student::simplePaginate(15);
        //fetch all students and save into a variable

        $search = $request->query('search');
        if ($search){
            $search = "%$search%";
            $students = Student::where('firstname','like', $search)
            ->orWhere('lastname','like',$search)
            ->orWhere('email','like', $search)
            ->orderBy('firstname','asc')
            ->paginate(15); 
            // ->toSql();
            // dd($students);
        } else {
            $students = Student::orderBy('firstname','asc')->simplePaginate(15);
        }
        
        return $students ;
    }

    public function create()
    {
        $courses = Course::all(['id','coursename'])->map(function ($course) {
            return [ 
                'value' => $course->id,
                'label' => $course->coursename
            ];
        });
    
        return view('students.create', [ 'courses' => $courses ] , [ "student" => new Student ]);

      
      
    }
    public function store(Request $request)
    {
        //dd($request) ;
        // 1st argument : rules
        // 2nd argument : custom messages
        // 3rd argument : custom attributes names

        $data = $request->validate([
            'firstname' => 'required|alpha|min:3|max:50',
            'lastname' => 'required|alpha|min:3|max:100',
            'email' => 'required|email|unique:students,email',
            'email' => 'required|email|unique:students,email',
            'phone' => 'required|numeric',
            'gender' => 'required|in:Male,Female,Other',
            'dob' => 'required',
            'course_id' => 'required|exists:courses,id',
            'student_id' => 'required',
            'image' => 'sometimes|image|max:1024'

        ],[
            'required' => 'Please enter a value for :attribute',
            'gender.required' => 'Please select a gender',
            'course_id.required'=> 'Please select a course',
            'image.image' => 'You can only upload images'
        ],
        [
            'dob' => 'date of birth',
            'course_id' => 'course',
        ]); //data type is array

        if ($request->hasFile('image')) {
            // $request->image->store('images', 'public'); // if default storage is local, you need to specific the disk 
            $data['image'] = $request->image->store('images');
        }


        $student = Student::create($data);
        return $student;

       /*  Mail::to($student->email)->send(new StudentAdded($student));


        return redirect()->route('students.index')->with('alertMessage',"Student {$data['firstname']} added successfully")->with('type', 'success');
    
     */
}
    
    public function edit(Student $student)
    {
        $courses = Course::all(['id', 'coursename'])->map(function ($course) {
            return [
                'value' => $course->id,
                'label' => $course->coursename
            ];
        })->toArray(); // Ensure it's an array
    
        return view('students.edit', ['student' => $student, 'courses' => $courses]);
    }
    


    public function update(Request $request, Student $student)
    {
        // dd($request);
        $data = $request->validate([
            //'coursename' => 'required|unique:courses,coursename,' . $course->id . '|max:150|min:4',
            'firstname' => 'required|max:150|min:3',
            'lastname' => 'required|max:150|min:3',
            //'email' => 'required|email|unique:students,email,' . $student->id,
            'email' => ['required',Rule::unique('students')->ignore($student->id), 'email','email', 'max:150'],
            'phone' => 'required|max:15',
            'gender' => 'required|in:Male,Female,Other',
            'dob' => 'required|date',
            'course_id' => 'required|exists:courses,id',
            'student_id' => 'required|unique:students,student_id,' . $student->id,
                     'image' => 'sometimes|image|max:1024'

        ],[
            'required' => 'Please enter a value for :attribute',
            'gender.required' => 'Please select a gender',
            'course_id.required'=> 'Please select a course'
        ],
        [
            'dob' => 'date of birth',
            'course_id' => 'course',
        ]);
        if ($request->hasFile('image')) {
            
            // $request->image->store('images', 'public'); // if default storage is local, you need to specific the disk 
            $data['image'] = $request->image->store('images');
        }

    
        $student->update($data);
    
        return redirect()->route('students.index')->with('alertMessage',"Student {$student->firstname} updated successfully")->with('type', 'success');
    }
    


    public function show($id)
    {    
        $courses = Course::all(['id', 'coursename'])->map(function ($course) {
            return [
                'value' => $course->id,
                'label' => $course->coursename
            ];
        })->toArray();

        $student = Student::findOrFail($id);
        return view('students.show', ['student' => $student, 'courses' => $courses]);
    }
  

    private function getValidationRules($studentId = null)
    {
        $rules =[];
        $messages =[];
        $attributes =[];

        return [$rules, $messages, $attributes] ;
    }

  

    public function destroy(Student $student)
    {
        //
        $student->delete();
        return redirect()->route('students.index')->with('alertMessage',"Student {$student->firstname} deleted successfully")->with('type', 'success');
    }

   



}
