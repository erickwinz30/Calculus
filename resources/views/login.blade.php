<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('/public/css/login.css') }}">
    <title>Calculus | Login</title>
</head>

<body>
    <form action="actionlogin" method="post" id="login">
        <div class="imgcontainer">
            <img src="{{ asset('/public/img/logo.png') }}" alt="Logo" class="logo">
        </div>
        <div class="container">
            <h3>Login</h3>
            <label for="username"><b>Username</b></label>
            <input type="text" placeholder="Enter Username" name="username" required>

            <label for="password"><b>Password</b></label>
            <input type="password" placeholder="Enter Password" name="password" required>

            <div class="buttons">
                <button type="submit">Register</button>
                <button type="submit">Login</button>
            </div>
        </div>
    </form>
</body>

</html>