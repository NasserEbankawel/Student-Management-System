<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>Login</title>
</head>
<body>

<form class="container mt-5" action="{{ route('auth.login') }}" method="POST">
    <x-alert-box />
    <h4 class="mb-3">Welcome back. Please login</h1>
    @csrf
    <x-textfield name="email" label="Email" type="email" :value="old('email')" placeholder="Enter Your Email" />
    <x-textfield name="password" label="Password" type="password" :value="old('password')" placeholder="Enter Password" />
    <button type="submit" class="btn btn-primary">Submit</button>
    <a href="{{route('auth.getForgotPasswordPage')}}" class="btn btn-danger">Forgot Password</a>

</form>

</body>
</html>
