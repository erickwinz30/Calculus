<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('css/add-food.css') }}">
    <title>Calculus | {{ $title }}</title>
</head>

<body>
    <header>
        @include('layouts.navbar')
    </header>
    <main>
        <h3 class="title">Add New Food/Drink</h3>
        <form action="{{ url()->current() }}/add" method="post" id="add-food">
            <p class="instruction">*Isi dalam satuan berat makanan gram (ex: 10 gr)</p>
            {{ csrf_field() }}
            <div class="row mb-1">
                <label for="food_name" class="col-sm-4 col-form-label"><b>Nama Makanan/Minuman</b></label>
                <div class="col-sm-8">
                    <input type="text" class="form-control" id="food_name" name="food_name">
                </div>
            </div>
            <div class="row mb-1">
                <label for="food_calories" class="col-sm-4 col-form-label">Calories</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control" id="food_calories" name="food_calories">
                </div>
            </div>
            <div class="row mb-1">
                <label for="cholesterol" class="col-sm-4 col-form-label">Cholesterol</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control" id="cholesterol" name="cholesterol">
                </div>
            </div>
            <div class="row mb-1">
                <label for="fat" class="col-sm-4 col-form-label">Fat</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control" id="fat" name="fat">
                </div>
            </div>
            <div class="row mb-1">
                <label for="protein" class="col-sm-4 col-form-label">Protein</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control" id="protein" name="protein">
                </div>
            </div>
            <div class="row mb-1">
                <label for="carbohydrate" class="col-sm-4 col-form-label">Carbohydrate</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control" id="carbohydrate" name="carbohydrate">
                </div>
            </div>
            <div class="row mb-1">
                <label for="sodium" class="col-sm-4 col-form-label">Sodium</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control" id="sodium" name="sodium">
                </div>
            </div>
            <div class="row mb-1">
                <label for="sugar" class="col-sm-4 col-form-label">Sugar</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control" id="sugar" name="sugar">
                </div>
            </div>
            <div class="row mb-2">
                <label for="sugar" class="col-sm-4 col-form-label">Berat</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control" id="weight" name="weight">
                </div>
            </div>
            <div class="gap-2 d-flex justify-content-md-end button">
                <button class="btn btn-cancel" type="button" href="home">Cancel</button>
                <button class="btn btn-save" type="submit" value="add">Save</button>
            </div>
        </form>
    </main>
    @include('layouts.footer')
</body>

</html>