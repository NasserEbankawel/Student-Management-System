@extends('layout.master')

@section('title', 'Student Details')

@section('content')

<!-- Display any errors -->
@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif


<form class="container mt-5">
    @csrf
    <!-- No method directive needed for show view -->        
   
    <x-textfield name="firstname" label="First Name" type="text" :value="old('firstname', $student->firstname ?? '')" placeholder="First Name" readonly/>
    <x-textfield name="lastname" label="Last Name" type="text" :value="old('lastname', $student->lastname ?? '')" placeholder="Last Name" readonly/>
    <x-textfield name="email" label="Email" type="email" :value="old('email', $student->email ?? '')" placeholder="Email" readonly/>
    <x-textfield name="phone" label="Phone" type="text" :value="old('phone', $student->phone ?? '')" placeholder="Phone" readonly/>

    @php
        $gender = [
            ['value' => 'Male', 'label' => 'Male'],
            ['value' => 'Female', 'label' => 'Female'],
            ['value' => 'Other', 'label' => 'Other']
        ];
    @endphp
    <x-selectfield :options="$gender" name="gender" label="Gender" :value="old('gender', $student->gender ?? '')" readonly/>

    <x-textfield name="dob" label="DOB" type="date" :value="old('dob', $student->dob ?? '')" placeholder="DOB" readonly/>
    <x-selectfield :options="$courses" name="course_id" label="Course" :value="old('course_id', $student->course_id ?? '')" readonly/>
    <x-textfield name="student_id" label="Student_id" type="text" :value="old('student_id', $student->student_id ?? '')" placeholder="Student_id" readonly/>

    <a href="{{ route('students.index') }}" class="btn btn-secondary mt-3">Back to list</a>
</form>

@endsection

