@extends('layout.master')

@section('title', 'Course Details')

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
    <x-textfield name="coursename" label="Course Name" type="text" :value="old('coursename', $course->coursename)" placeholder="Course Name" readonly="readonly"/>
    <x-textfield name="description" label="Description" type="text" :value="old('description', $course->description)" placeholder="Description" readonly="readonly"/>

    <a href="{{ route('courses.index') }}" class="btn btn-secondary mt-3">Back to list</a>
</form>

@endsection

