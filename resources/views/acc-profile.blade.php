<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous" />
    <link rel="stylesheet" href="{{ asset('public/css/Acc-page.css') }}" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" />
    <title>Calculus | Profile</title>
</head>

<body>
    <header>
        @include('layouts.navbar')
    </header>
    <main>
        <div id="content">
            <section class="card">
                <div class="row">
                    <div class="col-auto">
                        <img class="profile-photo" src="{{ asset('profilePic/'.Auth::user()->profile_pic) }}" alt="foto profile">
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
                    <li><a href="login">Log out</a></li>

                </div>
            </section>
        </div>

        <aside>
            <div class="card profile">
                <ul class="list-group list-group-flush">
                    <form action="/account/update" method="post" enctype="multipart/form-data">
                        @foreach ($account as $row)
                        {{ csrf_field() }}
                        <li class="list-group-item">
                            <p class="font-weight-bold">Username</p>
                            <input style="pointer-events: none; filter: brightness(80%);" type="input" name='username' class="form-control form-control-lg" value="{{ $row->username }}" />
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
    @include('layouts.footer')
</body>

</html>