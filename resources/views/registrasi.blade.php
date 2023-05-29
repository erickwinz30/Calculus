<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('/public/css/registrasi.css') }}">
    <title>Calculus | Register</title>
</head>

<body>
    <form action="postregistrasi" method="post" id="register">
        <div class="imgcontainer">
            <img src="{{ asset('/public/img/logo.png') }}" alt="Logo" class="logo">
        </div>
        <div class="container">
            <h3>Register</h3>
            <label for="username"><b>Username</b></label>
            <input type="text" placeholder="Enter Username" name="username" required>

            <label for="email"><b>Email</b></label>
            <input type="email" placeholder="Enter Email" name="email" required>

            <label for="name"><b>Name</b></label>
            <input type="text" placeholder="Enter Name" name="name" required>

            <label for="password"><b>Password</b></label>
            <input type="password" placeholder="Enter Password" name="password" required>

            <label for="date_of_birth"><b>Date of Birth</b></label>
            <input type="text" placeholder="Enter Date of Birth" name="date_of_birth" required>

            <label for="sex"><b>Sex</b></label><br>
            <input type="radio" name="sex">
            <label for="laki-laki">Laki-laki</label>
            <input type="radio" name="sex">
            <label for="perempuan">Perempuan</label>

            <div class="buttons">
                <button type="submit">Back</button>
                <button type="submit">Register</button>
            </div>
        </div>
    </form>
</body>

</html>