@extends('layout.master')

@section('content')


<a class="btn btn-outline-primary" href="{{route('courses.create')}}">Add New Course</a>

<table class="table">
  <thead>
    <tr>
      <th scope="col">Course ID</th>
      <th scope="col">Course Name</th>
      <th scope="col">Description</th>
      <th scope="col">Number of Subjects</th>
      <th scope="col">Subjects</th>
      <th scope="col">Actions</th>
    </tr>
  </thead>
  <tbody>
  @foreach ($courses as $course)
    <tr>
      <th scope="row">{{ $course->id}} </th>
      <td> {{ $course->coursename}} </td>
      <td> {{ $course->description}} </td>
      <td> {{ $course->subjects->count()}} </td>
      <td>
            @foreach ($course->subjects as $subject)
                <span>{{$subject->subjectname}}|</span>
            @endforeach  
        </td> 
      <td>
        <a class="btn btn-outline-primary" href="{{route('courses.show', $course->id)}}">View</a>
        <a class="btn btn-outline-warning" href="{{route('courses.edit',$course->id)}}">edit</a>
        <x-deletebutton :action="route('courses.destroy', $course->id)" />
        
      </td>
    </tr>

    @endforeach
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
{{ $courses->links()}}
@endsection

@section('title', 'list of Courses')