<form class="container mt-5" action="{{ $action }}" method="POST" enctype="multipart/form-data">
    @csrf
    @isset($edit)
        @method('PATCH')
    @endisset

    <x-textfield name="firstname" label="First Name" type="text" :value="old('firstname', $student->firstname ?? '')" placeholder="Enter First Name"/>
    <x-textfield name="lastname" label="Last Name" type="text" :value="old('lastname', $student->lastname ?? '')" placeholder="Enter Last Name"/>
    <x-textfield name="email" label="Email" type="email" :value="old('email', $student->email ?? '')" placeholder="Enter Email"/>
    <x-textfield name="phone" label="Phone" type="text" :value="old('phone', $student->phone ?? '')" placeholder="Enter Phone"/>
    <div class="row g-3">
        @isset($edit)
        <div class="col">
            <label for="">Current Image:</label>
            <img src="{{$student->getImageURL()}}" alt="student image" height="70" width="70">
        </div>
        @endisset
        <div class="col">
            <x-textfield name="image" :value="$student->image" label="Student Image" type="file" placeholder="Upload student image" />
        </div>
    </div>
    

    @php
        $gender = [
            ['value' => 'Male', 'label' => 'Male'],
            ['value' => 'Female', 'label' => 'Female'],
            ['value' => 'Other', 'label' => 'Other']
        ];
    @endphp
    <x-selectfield :options="$gender" name="gender" label="Select Gender" :value="old('gender', $student->gender ?? '')" />

    <x-textfield name="dob" label="DOB" type="date" :value="old('dob', $student->dob ?? '')" placeholder="Enter DOB"/>
    <x-selectfield :options="$courses" name="course_id" label="Select Course" :value="old('course_id', $student->course_id ?? '')" />
    <x-textfield name="student_id" label="Student_id" type="text" :value="old('student_id', $student->student_id ?? '')" placeholder="Enter Student_id"/>

    <button type="submit" class="btn btn-primary">Submit</button>
</form>
