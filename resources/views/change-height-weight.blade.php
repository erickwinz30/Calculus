<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous" />
    <link rel="stylesheet" href="{{ asset('css/change-height-weight.css') }}" />
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
                        <img class="profile-photo" src="{{ asset('profilePic/erickwinz30-jiwoni.jpg') }}" alt="foto profile">
                    </div>
                    <div class="col mt-1">
                        <p><b>Jang Gyu-Ri</b></p>
                        Height: <br>
                        Weight:
                    </div>
                </div>
            </section>

            <section class="card">
                <div class="menu">
                    <li><a href="account">Account</a></li>
                    <li><a href="change-height-weight">Change height & Weight</a></li>
                    <li><a href="#progress-page">Progress</a></li>
                    <li><a href="login">Log out</a></li>
                </div>
            </section>
        </div>

        <aside>
            <div class="card">
                <form action="/Calculus/account/update" method="post" enctype="multipart/form-data">
                    <div class="card-item mb-2">
                        <label for="formFile" class="form-label col-2"><b>My height</b></label>
                        <input class="form-control" type="text" id="my-height" name="my-height">
                    </div>
                    <div class="card-item">
                        <label for="formFile" class="form-label col-2"><b>My weight</b></label>
                        <input class="form-control" type="text" id="my-weight" name="my-weight">
                    </div>
                    <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                        <button class="btn btn-cancel" type="submit" href="">Cancel</button>
                        <button class="btn btn-save" type="submit" value="add">Save</button>
                    </div>
                </form>
            </div>
        </aside>
    </main>
    @include('layouts.footer')
</body>

</html>