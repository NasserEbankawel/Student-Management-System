@extends('layout.master')

@section('content')


<a class="btn btn-outline-primary" href="{{route('students.create')}}">Add New Student</a>

<form class="row flex g-3 justify-content-center"  action="{{route('students.index')}}" method="GET" >
  <div class="col">
    <x-textfield value="" label="Search for a student" name="search" type="text" placeholder="Enter name or email" />
  </div>
  <div class="col">
    <button class="btn btn-success" type="submit">Search</button>
  </div>
</form>


<!-- @dump($students) -->


<table class="table">
  <thead>
    <tr>
      <th scope="col">StudentID</th>
      <th scope="col">Firstname</th>
      <th scope="col">Lastname</th>
      <th scope="col">Gender</th>
      <th scope="col">Image</th>
      <th scope="col">Course</th>
      <th scope="col">Actions</th>
    </tr>
  </thead>
  <tbody>

    @foreach ($students as $student)
    <tr>
      <th scope="row"> {{ $student->student_id }} </th>
      <td>{{ $student->firstname }}</td>
      <td>{{ $student->lastname }}</td>
      <td>{{ $student->gender }}</td>
      <td>
          <img src="{{$student->getImageURL()}}" alt="" height="70" width="70">
      </td>
      <td>{{ $student->course->coursename }}</td>

      <td>
        <a class="btn btn-outline-primary" href="{{route('students.show', $student->id)}}">View</a>
        <a class="btn btn-outline-warning" href="{{route('students.edit', $student->id)}}">edit</a>
        <x-deletebutton :action="route('students.destroy', $student->id)" />
      </td>
    </tr>


    @endforeach
<!-- 
    <tr>
      <th scope="row"> {{ $student->student_id }} </th>
      <td>{{ $student->student_id }}</td>
      <td>{{ $student->student_id }}</td>
      <td>{{ $student->student_id }}</td>
      <td>{{ $student->student_id }}</td>

      <td>
        <a class="btn btn-outline-primary" href="{{route('students.show', 1)}}">View</a>
        <a class="btn btn-outline-warning" href="{{route('students.edit', 1)}}">edit</a>
        <a class="btn btn-outline-danger" href="{{route('students.destroy', 1)}}">delete</a>
      </td>
    </tr> -->

   <!--  
    <tr>
      <th scope="row">2</th>
      <td>Jacob</td>
      <td>Thornton</td>
      <td>@fat</td>
    </tr>
    <tr>
      <th scope="row">3</th>
      <td colspan="2">Larry the Bird</td>
      <td>@twitter</td>
    </tr> -->
  </tbody>
</table>
{{ $students->links()}}
@endsection

@section('title', 'list of Students')