<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login With Socialite</title>
</head>
<body>
    <div>
        <h1>Login Page</h1>
        <form action="{{ route('login') }}" method="post">
            @csrf
            <div>
                <label for="">Email</label>
                <input type="text" name="email">
            </div>
            <div>
                <label for="">Password</label>
                <input type="text" name="password">
            </div>
            <div>
                <button type="submit">Login</button>
                <a href="{{ url('auth/google') }}">Login With Google</a>
                <a href="{{ url('auth/github') }}">Login With GitHub</a>
            </div>
        </form>
    </div>
</body>
</html>