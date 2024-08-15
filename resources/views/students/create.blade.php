@extends('layout.master')
@section('title', 'Create new Student')

@section('content')
   <!--  @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif -->
    @include('students.form', ['action' => route('students.store')])
@endsection
