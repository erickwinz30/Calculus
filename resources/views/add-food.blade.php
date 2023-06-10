<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('css/add-food.css') }}">
    <title>Calculus | Add Food</title>
</head>

<body>
    <header>
        <nav class="navbar">
            <div class="container">
                <a class="navbar-brand" href="home">
                    <img src="{{ asset('img/logo.png') }}" alt="logo">
                </a>
                <ul class="nav nav-pills">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="home">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="health-tips">Health Tips</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="about">About Us</a>
                    </li>
                    <a class="avatar" href="">
                        <img src="{{ asset('img/avatar.png') }}" alt="Profile picture" />
                    </a>
                </ul>
            </div>
        </nav>
    </header>
    <main>
        <h3 class="title">Add New Food/Drink</h3>
        <form id="add-food">
            <p class="instruction">*Isi dalam satuan berat makanan gram (ex: 10 gr)</p>
            <div class="row mb-2">
                <label for="food-name" class="col-sm-4 col-form-label"><b>Nama Makanan/Minuman</b></label>
                <div class="col-sm-8">
                    <input type="text" class="form-control" id="food-name">
                </div>
            </div>
            <div class="row mb-2">
                <label for="calories" class="col-sm-4 col-form-label">Calories</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control" id="calories">
                </div>
            </div>
            <div class="row mb-2">
                <label for="cholesterol" class="col-sm-4 col-form-label">Cholesterol</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control" id="cholesterol">
                </div>
            </div>
            <div class="row mb-2">
                <label for="protein" class="col-sm-4 col-form-label">Protein</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control" id="protein">
                </div>
            </div>
            <div class="row mb-2">
                <label for="carbohydrate" class="col-sm-4 col-form-label">Carbohydrate</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control" id="carbohydrate">
                </div>
            </div>
            <div class="row mb-2">
                <label for="sodium" class="col-sm-4 col-form-label">Sodium</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control" id="sodium">
                </div>
            </div>
            <div class="row mb-2">
                <label for="sugar" class="col-sm-4 col-form-label">Sugar</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control" id="sugar">
                </div>
            </div>
            <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                <button class="btn btn-cancel" type="button">Cancel</button>
                <button class="btn btn-save" type="submit">Save</button>
            </div>
        </form>
    </main>
    <footer>
        Copyright © 2023 - Calculus by C23-M4047
    </footer>
</body>

</html>