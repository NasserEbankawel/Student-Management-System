@extends('layout.master')

@section('title', 'User Details')

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

    <x-textfield name="fullname" label="Full Name" type="text" :value="$user->fullname" placeholder="Full Name" readonly />
    <x-textfield name="email" label="Email" type="email" :value="$user->email" placeholder="Email" readonly />
    <x-textfield name="password" label="Password" type="password" placeholder="Password (hidden)" readonly />
    <x-textfield name="role" label="Role" type="text" :value="$user->role" placeholder="Role" readonly />

    <a href="{{ route('users.index') }}" class="btn btn-secondary mt-3">Back to list</a>
</form>

@endsection
