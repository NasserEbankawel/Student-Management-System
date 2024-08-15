@extends('layout.master')

@section('title','Edit Student: ' . $student->firstname)

@section('content')
    @include('students.form',[ 'action' => route('students.update', $student->id), 'edit' => true ])
@endsection