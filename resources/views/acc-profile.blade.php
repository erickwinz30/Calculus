<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous" />
    <link rel="stylesheet" href="{{ asset('css/Acc-page.css') }}" />
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
                    <div class="col mt-1">
                        @foreach ($account as $row)
                        <p><b>{{ $row->username }}</b></p>
                        Height: <br>
                        Weight:
                        @endforeach
                    </div>
                </div>
            </section>

            <section class="card">
                <div class="menu">
                    <li><a href="account">Account</a></li>
                    <li><a href="change-height-weight">Change height & Weight</a></li>
                    <li><a href="login">Log out</a></li>
                </div>
            </section>
        </div>

        <aside>
            <div class="card">
                <form action="/account/update" method="post" enctype="multipart/form-data">
                    @foreach ($account as $row)
                    {{ csrf_field() }}
                    <div class="card-item">
                        <label class="col-2"><b>Username</b></label>
                        <input type="input" name='username' class="form-control" value="{{ $row->username }}" disabled>
                    </div>
                    <div class="card-item">
                        <label for="formFile" class="form-label col-2"><b>Profile Photo</b></label>
                        <input class="form-control" type="file" id="profile_pic" name="profile_pic">
                    </div>
                    <div class="card-item">
                        <label class="col-2"><b>Gender</b></label>
                        <input type="input" class="form-control" name="sex" value="{{ $row->sex }}">
                    </div>
                    <div class="card-item">
                        <label class="col-2"><b>Date of Birth</b></label>
                        <input type="date" class="form-control" name="date-of-birth" value="{{ $row->date_of_birth }}">
                    </div>
                    <div class="card-item">
                        <label class="col-2"><b>Email</b></label>
                        <input type="input" class="form-control" name="email" value="{{ $row->email }}">
                    </div>
                    <div class="card-item">
                        <label class="col-2"><b>Password</b></label>
                        <input type="password" class="form-control" name="password" value="{{ $row->password }}">
                    </div>
                    <div class="d-grid justify-content-md-end">
                        <button class="btn-save" type="submit" value="add">Save</button>
                    </div>
                    @endforeach
                </form>
                </ul>
            </div>
        </aside>
    </main>
    @include('layouts.footer')
</body>

</html>