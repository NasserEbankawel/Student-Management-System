@extends('layout.master')
@section('title', 'Create new Subject')

@section('content')
 <!--    @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif -->
    @include('subjects.form', ['action' => route('subjects.store')])
@endsection