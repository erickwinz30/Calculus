<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('css/nutrition-info.css') }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.19/dist/sweetalert2.min.css">
    <title>Calculus | {{ $title }}</title>
</head>

<body>
    <header>
        @include('layouts.navbar')
    </header>
    <main>
        <form id="nutrition-info" action="{{ url()->current() }}/update" method="POST">
            {{ csrf_field() }}
            <a class="back" href="{{ url('/') }}">
                < Kembali</a><br><br>
                @foreach ($foodInfo as $row)
                    <p class="food-name"><b>{{ $row->food_name }}</b></p>
                    <div class="row mb-2">
                        <label for="calories" class="col-sm-4 col-form-label">Calories</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" id="calories" disabled value="{{ round($row->food_calories) }}">
                        </div>
                    </div>
                    <div class="row mb-2">
                        <label for="cholesterol" class="col-sm-4 col-form-label">Cholesterol</label>
                        <div class="col-sm-7">
                            <input type="text" class="form-control" id="cholesterol" disabled value="{{ round($row->cholesterol) }}">
                        </div>
                        <p class="col-sm-1">gr</p>
                    </div>
                    <div class="row mb-2">
                        <label for="protein" class="col-sm-4 col-form-label">Protein</label>
                        <div class="col-sm-7">
                            <input type="text" class="form-control" id="protein" disabled value="{{ round($row->protein) }}">
                        </div>
                        <p class="col-sm-1">gr</p>
                    </div>
                    <div class="row mb-2">
                        <label for="carbohydrate" class="col-sm-4 col-form-label">Carbohydrate</label>
                        <div class="col-sm-7">
                            <input type="text" class="form-control" id="carbohydrate" disabled value="{{ round($row->carbohydrate) }}">
                        </div>
                        <p class="col-sm-1">gr</p>
                    </div>
                    <div class="row mb-2">
                        <label for="sodium" class="col-sm-4 col-form-label">Sodium</label>
                        <div class="col-sm-7">
                            <input type="text" class="form-control" id="sodium" disabled value="{{ round($row->sodium) }}">
                        </div>
                        <p class="col-sm-1">gr</p>
                    </div>
                    <div class="row mb-2">
                        <label for="sugar" class="col-sm-4 col-form-label">Sugar</label>
                        <div class="col-sm-7">
                            <input type="text" class="form-control" id="sugar" disabled value="{{ round($row->sugar) }}">
                        </div>
                        <p class="col-sm-1">gr</p>
                    </div>
                    <div class="row mb-2">
                        <label for="weight" class="col-sm-4 col-form-label">Weight</label>
                        <div class="col-sm-7">
                            <input type="text" class="form-control" id="weight" name="weight" value="{{ round($row->weight) }}">
                        </div>
                        <p class="col-sm-1">gr</p>
                    </div>
                    <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                        <button class="btn btn-remove" type="button">Remove</button>
                        <button class="btn btn-save" type="submit">Save</button>
                    </div>
                @endforeach
        </form>
    </main>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.19/dist/sweetalert2.min.js"></script>
    <script>
        function deleteItem(id) {
            Swal.fire({
                title: 'Confirmation',
                text: 'Anda yakin ingin menghapusnya?',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Ya, hapus!',
                cancelButtonText: 'Tidak, batal'
            }).then((result) => {
                if (result.isConfirmed) {
                    var form = document.getElementById('nutrition-info');
                    form.action = "{{ url('nutrition-info/snack') }}/" + id + "/delete";
                    form.submit();
                }
            });
        }
    </script>
    @include('layouts.footer')
</body>

</html>