@extends('layout.master')

@section('content')


<a class="btn btn-outline-primary" href="{{route('subjects.create')}}">Add New Subject</a>

<table class="table">
  <thead>
    <tr>
      <th scope="col">Subject ID</th>
      <th scope="col">Subject Name</th>
      <th scope="col">Description</th>
      <th scope="col">Actions</th>
    </tr>
  </thead>
  <tbody>
  @foreach ($subjects as $subject)
    <tr>
      <th scope="row">{{ $subject->id}}</th>
      <td>{{ $subject->subjectname}}</td>
      <td>{{ $subject->description}}</td>
      <td>
        <a class="btn btn-outline-primary" href="{{route('subjects.show', $subject->id)}}">View</a>
        <a class="btn btn-outline-warning" href="{{route('subjects.edit', $subject->id)}}">edit</a>
        <x-deletebutton :action="route('subjects.destroy', $subject->id)" />
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
{{ $subjects->links()}}
@endsection

@section('title', 'list of subjects')
