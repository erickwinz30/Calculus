<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous" />
    <link rel="stylesheet" href="{{ asset('public/css/Acc-page.css') }}" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" />
    <title>Calculus | Home Page</title>
</head>

<body>
    <header>
        <nav class="navbar">
            <div class="container">
                <a class="navbar-brand" href="">
                    <img src="{{ asset('public/img/logo.png') }}" alt="logo" />
                </a>
                <ul class="nav justify-content-end">
                    <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="health-tips">Health Tips</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="aboutus">About Us</a>
                    </li>
                    <a href="">
                        <img src="{{ asset('public/profilePic/erickwinz30-jiwoni.jpg') }}" alt="profile-img" />
                    </a>
                </ul>
            </div>
        </nav>
    </header>
    <main>
        <div id="content">
            <section class="card">
                <div class="row">
                    <div class="col-auto">
                        <img class="profile-photo" src="{{ asset('public/profilePic/'.Auth::user()->username.'-'.Auth::user()->profilePic.') }}" alt="foto profile">
                    </div>
                    <div class="col">
                        @foreach ($account as $row)
                        <p>{{ $row->username }}</p>
                        <p>height</p>
                        <p>weight</p>
                        @endforeach
                    </div>
                </div>
            </section>

            <section class="card">
                <div class="">
                    <li><a href="#account-page">Account</a></li>
                    <li><a href="#change-height-page">Change height & Weight</a></li>
                    <li><a href="#progress-page">Progress</a></li><br>
                    <li><a href="#logout">Log out</a></li>

                </div>
            </section>
        </div>

        <aside>
            <div class="card profile">
                <ul class="list-group list-group-flush">
                    <form action="/Calculus/account/update" method="post" enctype="multipart/form-data">
                        @foreach ($account as $row)
                            {{ csrf_field() }}
                            <li class="list-group-item">
                                <p class="font-weight-bold">Username</p>
                                <input style="pointer-events: none; filter: brightness(80%);" type="input"
                                    name='username' class="form-control form-control-lg"
                                    value="{{ $row->username }}" />
                            </li>
                            <li class="list-group-item">
                                <div class="mb-3">
                                    <label for="formFile" class="form-label">Profile photo</label>
                                    <input class="form-control" type="file" id="profile_pic" name="profile_pic">
                                </div>
                            </li>
                            <li class="list-group-item">
                                <p class="font-weight-bold">Gender</p>
                                <p>{{ $row->sex }}</p>
                            </li>
                            <li class="list-group-item">
                                <p class="font-weight-bold">Date Of Birth</p>
                                <p>{{ $row->date_of_birth }}</p>
                            </li>
                            <li class="list-group-item">
                                <p class="font-weight-bold">Email</p>
                                <p>{{ $row->email }}</p>
                            </li>
                            <li class="list-group-item">
                                <p class="font-weight-bold"></p>
                                <p>Password</p>
                            </li>

                            <button class="btn btn-success" type="submit">Save
                        @endforeach
                    </form>
                </ul>
            </div>
        </aside>

    </main>
</body>

</html>
