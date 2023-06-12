<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous" />
    <link rel="stylesheet" href="{{ asset('css/main-page.css') }}" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" />
    <title>Calculus | Home Page</title>
</head>

<body>
    <header>
        <nav class="navbar">
            <div class="container">
                <a class="navbar-brand" href="">
                    <img src="{{ asset('img/logo.png') }}" alt="logo" />
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
                    <a href="account">
                        <img src="{{ asset('profilePic/' . Auth::user()->profile_pic) }}" alt="" />
                    </a>
                </ul>
            </div>
        </nav>
    </header>

    <main>
        <div id="content">
            <section class="card">
                <div class="row">
                    <div class="col-6">
                        <li>Today calorie</li>
                    </div>
                    <div class="col-6">
                        <div class="row">
                            <div class="row">
                                <div class="col text-start">
                                    <p class="text-end px-2" style="margin-bottom: 0;">1000/2500</p>
                                </div>
                                <div class="col text-start">
                                    <div class="calorie-btn">
                                        <a class="btn btn-primary py-1" href="detail-page" role="button">Detail</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
            </section>

            <section class="card">
                <div class="">
                    <li style="text-align: center">Today</li>
                </div>
            </section>

            <section class="card foodtime">
                <div>
                    <div class="card-header">
                        <li>Breakfast</li>

                        <a href="add-calorie-page">
                            <img class="btn-img" src="img/add-button.png" alt="tambah" />
                        </a>
                    </div>
                    <table class="table_breakfast">
                        @foreach ($breakfast as $row)
                            <tr>
                                <td>{{ $row->food_name }}</td>
                                <td>{{ $row->food_calories }}</td>
                            </tr>
                        @endforeach
                    </table>
                </div>
            </section>

            <section class="card foodtime">
                <div>
                    <div class="card-header">
                        <li>Lunch</li>
                        <a href="add-calorie-page">
                            <img class="btn-img" src="asset/public/img/add-button.png" alt="tambah" />
                        </a>
                    </div>
                    <table class="table_lunch">
                        @foreach ($lunch as $row)
                            <tr>
                                <td>{{ $row->food_name }}</td>
                                <td>{{ $row->food_calories }}</td>
                            </tr>
                        @endforeach
                    </table>
                </div>
            </section>

            <section class="card foodtime">
                <div>
                    <div class="card-header">
                        <li>Dinner</li>
                        <a href="add-calorie-page">
                            <img class="btn-img" src="asset/public/img/add-button.png" alt="tambah" />
                        </a>
                    </div>
                    <table class="table_dinner">
                        @foreach ($dinner as $row)
                            <tr>
                                <td>{{ $row->food_name }}</td>
                                <td>{{ $row->food_calories }}</td>
                            </tr>
                        @endforeach
                    </table>
                </div>
            </section>

            <section class="card foodtime">
                <div>
                    <div class="card-header">
                        <li>Snack</li>
                        <a href="add-calorie-page">
                            <img class="btn-img" src="asset/public/img/add-button.png" alt="tambah" />
                        </a>
                    </div>
                    <table class="table_snack">
                        @foreach ($snack as $row)
                            <tr>
                                <td>{{ $row->food_name }}</td>
                                <td>{{ $row->food_calories }}</td>
                            </tr>
                        @endforeach
                    </table>
                </div>
            </section>
        </div>

        <aside>
            <div class="card nutrition">
                <li>Today nutrition</li>
                <table class="table">
                    <tr>
                        <td>Fat</td>
                        <td>{{ round($totalNutrition->total_fat, 2) }}</td>
                    </tr>
                    <tr>
                        <td>Cholesterol</td>
                        <td>{{ round($totalNutrition->total_cholesterol, 2) }}</td>
                    </tr>
                    <tr>
                        <td>Protein</td>
                        <td>{{ round($totalNutrition->total_protein, 2) }}</td>
                    </tr>
                    <tr>
                        <td>Carbohydrate</td>
                        <td>{{ round($totalNutrition->total_carbohydrate, 2) }}</td>
                    </tr>
                    <tr>
                        <td>Sodium</td>
                        <td>{{ round($totalNutrition->total_sodium, 2) }}</td>
                    </tr>
                    <tr>
                        <td>Sugar</td>
                        <td>{{ round($totalNutrition->total_sugar, 2) }}</td>
                    </tr>
                </table>
            </div>
        </aside>
    </main>
</body>

</html>
