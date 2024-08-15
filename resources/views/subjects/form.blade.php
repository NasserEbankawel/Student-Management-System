
<form class="container mt-5" action="{{$action}}" method="POST">
@csrf
    @isset($edit)
        @method('PATCH')
    @endisset

    <x-textfield name="subjectname" label="Subject Name" type="text" :value="old('subjectname', $subject->subjectname)" placeholder="Enter Subject Name" />
    <x-textfield name="description" label="Description" type="text" :value="old('description', $subject->description)" placeholder="Enter Description" />
    @csrf
    <button type="submit" class="btn btn-primary">Submit</button>
        
</form>