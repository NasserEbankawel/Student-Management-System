<form class="container mt-5" action="{{ $action }}" method="POST">
    @csrf
    @isset($edit)
        @method('PATCH')
    @endisset

    <x-textfield name="fullname" label="Full Name" type="text" :value="old('fullname', $user->fullname)" placeholder="Enter Full Name" />
    <x-textfield name="email" label="Email" type="email" :value="old('email', $user->email)" placeholder="Enter Email" />
    <!-- <x-textfield name="password" label="Password" type="password" :value="old('password', $user->password)" placeholder="Enter Password" /> -->

    @csrf
    @isset($edit)
        @method('PATCH')
    @endisset


    @unless(isset($edit))
    <x-textfield name="password" label="User Password" type="password" placeholder="Enter a user password" />
    <x-textfield name="password_confirmation" label="Confirm Password" type="password" placeholder="Confirm password" />
    @endunless

    @php
        $roles = [
            [
                'value'=>'super_admin',
                'label' => 'Super Administrator'
            ],
            [
                 'value'=>'admin',
                'label' => 'Administrator'
            ] 
        ];
    @endphp
    <x-select-field :options="$roles" name="role" label="Select Role" :value="$user->role"  />

    <button type="submit" class="btn btn-primary">Submit</button>
</form>
