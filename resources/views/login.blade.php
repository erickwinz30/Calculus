<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('/public/css/login.css') }}">
    <title>Calculus | Login</title>
</head>

<body>
    <form action="actionlogin" method="post" id="login">
        <div class="imgcontainer">
            <img src="{{ asset('/public/img/brand.png') }}" alt="Logo" class="logo">
        </div>
        <div class="container">
            <h3>Login</h3>
            <form action="{{ url('actionlogin') }}" method="post">
                {{ csrf_field() }}
                @if (session('error'))
                    <div class="alert alert-danger text-center">{{ session('error') }}</div>
                @endif
                <label for="username"><b>Username</b></label>
                <input type="text" placeholder="Enter Username" name="username" required>

                <label for="password"><b>Password</b></label>
                <input type="password" placeholder="Enter Password" name="password" required>

                <div class="buttons">
                    <button type="button" name="register"
                        onclick="window.location.href='http://localhost/Calculus/registrasi'">Register</button>
                    <button type="submit" name="kirim" value="kirim">Login</button>
                </div>
            </form>
        </div>
    </form>
</body>

</html>
