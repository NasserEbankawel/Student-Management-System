@extends('layout.master')

@section('title', 'Edit ' . $course->coursename)

@section('content')
    @include('courses.form', ['action' => route('courses.update', $course->id), 'edit' => true, 'course' => $course])
@endsection
