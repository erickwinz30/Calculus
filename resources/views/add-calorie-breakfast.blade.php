<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/add-calorie.css') }}">
    <title>Calculus | Add Calorie</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" />
</head>

<body>
    <header>
        @include('layouts.navbar')
    </header>

    <main>
        <!-- SEARCH BAR & MAIN LIST -->
        <div id="content">
            <section id="search-container" class="card">
                <form action="{{ url()->current() }}/search" id="search">
                    <input placeholder="Search Foods..." id="searchElement" name="search" type="search" class="form-control">
                    <button id="searchButtonElement" class="search-btn" type="submit">Search</button>
                </form>
            </section>
            <section class="card">
                <a href="{{ url('add-food') }}" class="add">Add New Food <i class="fa-solid fa-circle-plus fa-lg" style="color: #76dfb7;"></i></a>
            </section>
            @if (isset($searchResult))
            <section class="card" id="food-list">
                <div class="food mb-3">
                    @foreach ($searchResult as $row)
                    <div class="col-10">
                        <label class="input-name-list" data-name="{{ $row->food_name }}" data-id="{{ $row->id_list_food }}">
                            {{ $row->food_name }}
                            <button class="food-btn">
                                <i class="fa-solid fa-circle-plus fa-lg" style="color: #76dfb7;"></i>
                            </button>
                        </label>
                    </div>
                    <div class="td-input-main">
                        <label class="input-data-gram" data-gram="{{ round($row->weight) }}">{{ round($row->weight) }} gr</label>
                        <label class="input-data-calorie" data-calorie="{{ round($row->food_calories) }}">{{ round($row->food_calories) }}
                            Cals</label>
                    </div>
                    @endforeach
                </div>
            </section>
            @endif
        </div>


        <!-- CALORIE SUMMARY -->
        <aside>
            <div class="card">
                <h4 class="calorie-summary">Calorie Summary</h4>
                <form action="" method="POST" id="calorie-summary-form">
                    {{ csrf_field() }}
                    <div id="calorie-summary-list"></div>
                    <button class="add-btn d-md-flex justify-content-md-center" type="submit">Add</button>
                </form>
            </div>
        </aside>
    </main>
    @include('layouts.footer')

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous">
    </script>

    <script>
        window.addEventListener('DOMContentLoaded', function() {
            const searchForm = document.getElementById('search');
            const searchInput = document.getElementById('searchElement');

            searchForm.addEventListener('submit', function(event) {
                event.preventDefault(); // Prevent form submission

                const searchValue = searchInput.value;
                const baseUrl = '{{ url()->current() }}';
                const actionUrl = baseUrl.replace(/\/search\/[^\/]+$/, '/search') +
                    `/${encodeURIComponent(searchValue)}`;

                window.location.href = actionUrl;
            });
        });



        window.addEventListener('load', function() {
            const calorieSummaryList = document.querySelector('#calorie-summary-list');
            const foodList = document.querySelector('#food-list');

            /* Bagian Main List yang di pindahkan datanya ke Side Bar */
            const foodButtons = document.querySelectorAll('.food-btn');
            foodButtons.forEach((foodButton) => {
                foodButton.addEventListener('click', function() {
                    console.log(foodButton.parentElement);

                    /* Tangkap data dari induk class="food" */
                    const parentElement = foodButton.closest('.food');
                    const foodId = parentElement.querySelector('.input-name-list').dataset.id;
                    const foodName = parentElement.querySelector('.input-name-list').dataset.name;
                    const foodGram = parentElement.querySelector('.input-data-gram').dataset.gram;
                    const foodCalorie = parentElement.querySelector('.input-data-calorie').dataset
                        .calorie;

                    /* Input ke data class="summary" */
                    const calorieSummaryItem = `
                        <div class="summary m-3"
                            <label class="input-name-add" id="input-name" data-id="${foodId}">${foodName}</label>
                            <div class="nominal">
                                <input type="text" class="input-gram" id="input-gram" value="${foodGram}"> gr
                                <label class="input-calorie" id="input-calorie">${foodCalorie} Cals</label>
                                <button class="delete-button">Delete</button>
                            </div>
                        </div>
            `;

                    calorieSummaryList.innerHTML += calorieSummaryItem;

                    /* Tombol Delete menagkap data yang berada di dalam class="tr-aside" */
                    const deleteButtons = document.querySelectorAll('.delete-button');
                    console.log(deleteButtons)

                    deleteButtons.forEach((button) => {
                        button.addEventListener('click', function() {
                            const row = button.closest('.summary');
                            deleteRow(row);
                        });
                    });
                });
            });
            /* Tombol Delete menghapus seluruh data yang berada di dalam tombol Delete */
            function deleteRow(row) {
                row.remove();
            };
        });
    </script>
    @include('layouts.footer')
</body>

</html>