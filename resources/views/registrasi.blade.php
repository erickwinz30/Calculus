<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/registrasi.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Calculus | Register</title>
</head>

<body>
    <form action="postregistrasi" method="post" id="register">
        <div class="imgcontainer">
            <img src="{{ asset('img/logo.png') }}" alt="Logo" class="logo">
        </div>
        <div class="container">
            <h3>Register</h3>
            <form action="{{ url('postregistrasi') }}" method="post">
                {{ csrf_field() }}
                <div>
                    <label for="username" class="col-sm-2 col-form-label"><b>Username</b></label>
                    <input type="text" class="form-control" id="username" name="username" placeholder="calculus">
                </div>
                <div>
                    <label for="email" class="col-sm-2 col-form-label"><b>Email</b></label>
                    <input type="text" class="form-control" id="email" name="email" placeholder="calculus@gmail.com">
                </div>
                <div>
                    <label for="name" class="col-sm-2 col-form-label"><b>Name</b></label>
                    <input type="text" class="form-control" id="name" name="name" placeholder="Calculus">
                </div>
                <div>
                    <label for="password" class="col-sm-2 col-form-label"><b>Password</b></label>
                    <input type="password" class="form-control" id="password" name="password" placeholder="Input password">
                </div>
                <div>
                    <label for="date_of_birth" class="col-sm-5 col-form-label"><b>Date of Birth</b></label>
                    <input type="date" class="form-control" id="date_of_birth" name="date_of_birth" placeholder="Select a date">
                </div>
                <fieldset>
                    <label class="col-sm-2 col-form-label"><b>Sex</b></label>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="sex" id="laki-laki" value="laki-laki">
                        <label class="form-check-label" for="sex">
                            Laki-laki
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="sex" id="perempuan" value="perempuan">
                        <label class="form-check-label" for="sex">
                            Perempuan
                        </label>
                    </div>
                </fieldset>
                <div class="d-grid gap-2 d-md-block mt-2">
                    <button class="btn btn-primary" type="button">Back</button>
                    <button class="btn btn-primary" type="submit" name="kirim">Register</button>
                </div>
            </form>
        </div>
    </form>
</body>

</html>