<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous" />
    <link rel="stylesheet" href="{{ asset('css/Acc-page.css') }}" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.19/dist/sweetalert2.min.css">
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
                        Height : {{ $row->height }} cm<br>
                        Weight: {{ $row->weight }} kg
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
            <div class="card data">
                <form action="/account/update" method="post" enctype="multipart/form-data">
                    @foreach ($account as $row)
                    {{ csrf_field() }}
                    <div class="card-item">
                        <label class="col-2"><b>Username</b></label>
                        <input type="input" name='username' class="form-control" value="{{ $row->username }}" disabled>
                    </div>
                    <div class="card-item">
                        <label class="col-2"><b>Name</b></label>
                        <input type="input" class="form-control" name="name" value="{{ $row->name }}">
                    </div>
                    <div class="card-item">
                        <label for="formFile" class="form-label col-2"><b>Profile Photo</b></label>
                        <input class="form-control" type="file" id="profile_pic" name="profile_pic">
                    </div>
                    <div class="card-item">
                        <label class="col-2"><b>Gender</b></label>
                        <div class="gender">
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="sex" id="laki-laki" value="Laki-laki">
                                <label class="form-check-label">Laki-laki</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="sex" id="perempuan" value="Perempuan">
                                <label class="form-check-label">Perempuan</label>
                            </div>
                        </div>
                    </div>
                    <div class="card-item">
                        <label class="col-2"><b>Date of Birth</b></label>
                        <input type="date" class="form-control" name="date_of_birth" value="{{ $row->date_of_birth }}">
                    </div>
                    <div class="card-item">
                        <label class="col-2"><b>Email</b></label>
                        <input type="email" class="form-control" name="email" value="{{ $row->email }}">
                    </div>
                    <div class="card-item">
                        <label class="col-2"><b>Password</b></label>
                        <input type="password" class="form-control" name="password">
                    </div>
                    <div class="d-grid justify-content-md-end">
                        <button class="btn-save" type="submit" value="add" onclick="updateItem()">Save</button>
                    </div>
                    @endforeach
                </form>
                </ul>
            </div>
        </aside>
    </main>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.19/dist/sweetalert2.all.min.js"></script>
    <script>
        function updateItem() {
            event.preventDefault();
            Swal.fire({
                title: 'Confirmation',
                text: 'Anda yakin ingin update data?',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Ya, update!',
                cancelButtonText: 'Tidak, batal'
            }).then((result) => {
                if (result.isConfirmed) {
                    var form = document.querySelector('form[action="/account/update"]');
                    form.submit();
                }
            });
        }
    </script>
    @include('layouts.footer')
</body>

</html>