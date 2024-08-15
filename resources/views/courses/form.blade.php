<form class="container mt-5" action="{{ $action }}" method="POST">
    @csrf
    @isset($edit)
        @method('PATCH')
    @endisset

    <x-textfield name="coursename" label="Course Name" type="text" :value="old('coursename', $course->coursename)" placeholder="Enter Course Name" />
    <x-textfield name="description" label="Description" type="text" :value="old('description', $course->description)" placeholder="Enter Description" />

   

    <h4>Select Subjects</h4>
    <div class="row row-cols-3 mb-3">
        @foreach($subjects as $subject)
        <x-inputswitch :subjects="$course->subjects"  :label="$subject->subjectname" name="subject_id[]" :value="$subject->id" />
        @endforeach
    </div>

    <button type="submit" class="btn btn-primary">Submit</button>
</form>
