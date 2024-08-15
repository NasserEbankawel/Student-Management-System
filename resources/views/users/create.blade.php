@extends('layout.master')
@section('title', 'Create new User')

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
    @include('users.form', ['action' => route('users.store')])
@endsection

