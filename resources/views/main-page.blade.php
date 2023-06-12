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
    <title>Calculus | Main Page</title>
</head>

<body>
    <header>
        @include('layouts.navbar')
    </header>

    <main>
        <div id="content">
            <div class="container">
                <section class="card">
                    <div class="change-date">
                        <label for="date_of_birth" class="col-sm-5 col-form-label">Change Date</label>
                        <input type="date" class="form-control" id="change-date" name="change-date">
                        <button class="btn-change" type="submit" name="change-date">Change</button>
                    </div>
                </section>

                <section class="card">
                    <div class="calorie-info">
                        <label class="col-11 py-2">Today's calorie</label>
                        <label class="py-2">2000/2500</label>
                    </div>
                </section>

                <section class="card foodtime">
                    <div class="card-header">
                        <a href="" class="col-11">Breakfast <i class="bi bi-plus-circle"></i></a>
                        <label for="total-calories" class="col-1">500 Cals</label>
                    </div>
                    <div class="card-body">
                        <div class="food-detail">
                            @foreach ($breakfast as $row)
                                <label for="food" class="col-11">{{ $row->food_name }} <span>({{ round($row->weight, 1) }} gr)</span></label>
                                <label for="amount-of-calories" class="col-1">{{ round($row->food_calories, 1) }} Cals</label>
                            @endforeach
                        </div>
                    </div>
                </section>

                <section class="card foodtime">
                    <div class="card-header">
                        <a href="" class="col-11">Lunch <i class="bi bi-plus-circle"></i></a>
                        <label for="total-calories" class="col-1">500 Cals</label>
                    </div>
                    <div class="card-body">
                        @foreach ($lunch as $row)
                        <div class="food-detail">
                            <label for="food" class="col-11">{{ $row->food_name }} <span>({{ round($row->weight, 1) }} gr)</span></label>
                            <label for="amount-of-calories" class="col-1">{{ round($row->food_calories, 1) }} Cals</label>
                        </div>
                        @endforeach
                    </div>
                </section>

                <section class="card foodtime">
                    <div class="card-header">
                        <a href="" class="col-11">Dinner <i class="bi bi-plus-circle"></i></a>
                        <label for="total-calories" class="col-1">500 Cals</label>
                    </div>
                    <div class="card-body">
                        @foreach ($dinner as $row)
                        <div class="food-detail">
                            <label for="food" class="col-11">{{ $row->food_name }} <span>({{ round($row->weight, 1) }} gr)</span></label>
                            <label for="amount-of-calories" class="col-1">{{ round($row->food_calories, 1) }} Cals</label>
                        </div>
                        @endforeach
                    </div>
                </section>

                <section class="card foodtime">
                    <div class="card-header">
                        <a href="" class="col-11">Snack <i class="bi bi-plus-circle"></i></a>
                        <label for="total-calories" class="col-1">500 Cals</label>
                    </div>
                    <div class="card-body">
                        @foreach ($snack as $row)
                        <div class="food-detail">
                            <label for="food" class="col-11">{{ $row->food_name }} <span>({{ round($row->weight, 1) }} gr)</span></label>
                            <label for="amount-of-calories" class="col-1">{{ round($row->food_calories, 1) }} Cals</label>
                        </div>
                        @endforeach
                    </div>
                </section>
            </div>
        </div>

        <aside>
            <div class="card nutrition">
                <p><b>Today's nutrition</b></p>
                <table class="table">
                    <tr>
                        <td>Fat</td>
                        <td>{{ round($totalNutrition->total_fat, 2) }} g</td>
                    </tr>
                    <tr>
                        <td>Cholesterol</td>
                        <td>{{ round($totalNutrition->total_cholesterol, 2) }} mg</td>
                    </tr>
                    <tr>
                        <td>Protein</td>
                        <td>{{ round($totalNutrition->total_protein, 2) }} g</td>
                    </tr>
                    <tr>
                        <td>Carbohydrate</td>
                        <td>{{ round($totalNutrition->total_carbohydrate, 2) }} g</td>
                    </tr>
                    <tr>
                        <td>Sodium</td>
                        <td>{{ round($totalNutrition->total_sodium, 2) }} mg</td>
                    </tr>
                    <tr>
                        <td>Sugar</td>
                        <td>{{ round($totalNutrition->total_sugar, 2) }} g</td>
                    </tr>
                </table>
            </div>
        </aside>
    </main>
    @include('layouts.footer')
</body>

</html>
