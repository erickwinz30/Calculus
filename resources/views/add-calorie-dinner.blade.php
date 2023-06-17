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
                <form action="" id="search">
                    <input placeholder="Search Foods..." id="searchElement" type="search" class="form-control">
                    <button id="searchButtonElement" class="search-btn" type="submit">Search</button>
                </form>
            </section>
            <section class="card" id="food-list">
                <a href="" class="add">Add New Food <i class="fa-solid fa-circle-plus fa-lg" style="color: #76dfb7;"></i></a>
                <div class="food mb-3">
                    <div class="col-10">
                        <label class="input-name-list" data-name="Nasi Goreng">
                            Nasi Goreng
                            <button class="food-btn">
                                <i class="fa-solid fa-circle-plus fa-lg" style="color: #76dfb7;"></i>
                            </button>
                        </label>
                    </div>
                    <div class="td-input-main">
                        <label class="input-data-gram" data-gram="50gr">50gr</label>
                        <label class="input-data-calorie" data-calorie="400Cals">400Cals</label>
                    </div>
                </div>
                <div class="food mb-3">
                    <div class="col-10">
                        <label class="input-name-list" data-name="Nasi Goreng">
                            Nasi Goreng
                            <button class="food-btn">
                                <i class="fa-solid fa-circle-plus fa-lg" style="color: #76dfb7;"></i>
                            </button>
                        </label>
                    </div>
                    <div class="td-input-main">
                        <label class="input-data-gram" data-gram="50gr">50gr</label>
                        <label class="input-data-calorie" data-calorie="400Cals">400Cals</label>
                    </div>
                </div>
            </section>
        </div>


        <!-- CALORIE SUMMARY -->
        <aside>
            <div class="card">
                <h4 class="calorie-summary">Calorie Summary</h4>
                <div id="calorie-summary-list">

                </div>
                <button class="add-btn d-md-flex justify-content-md-center" type="submit">Add</button>
            </div>
        </aside>
    </main>
    @include('layouts.footer')

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>

    <script>
        window.addEventListener('load', function() {
            const calorieSummaryList = document.querySelector('#calorie-summary-list');
            const foodList = document.querySelector('#food-list');
            const searchButton = document.querySelector('#searchButtonElement');
            const searchInput = document.querySelector('#searchElement');

            searchButton.addEventListener('click', function() {
                const searchTerm = searchInput.value.toLowerCase();
                const foodItems = foodList.querySelectorAll('.food');

                foodItems.forEach((foodItem) => {
                    const foodName = foodItem.querySelector('.input-name-list').textContent.toLowerCase();

                    if (foodName.includes(searchTerm)) {
                        foodItem.style.display = 'table-row';
                    } else {
                        foodItem.style.display = 'none';
                    }
                });
            });


            /* Bagian Main List yang di pindahkan datanya ke Side Bar */
            const foodButtons = document.querySelectorAll('.food-btn');
            foodButtons.forEach((foodButton) => {
                foodButton.addEventListener('click', function() {
                    console.log(foodButton.parentElement);

                    /* Tangkap data dari induk class="food" */
                    const parentElement = foodButton.closest('.food');
                    const foodName = parentElement.querySelector('.input-name-list').dataset.name;
                    const foodGram = parentElement.querySelector('.input-data-gram').dataset.gram;
                    const foodCalorie = parentElement.querySelector('.input-data-calorie').dataset.calorie;

                    /* Input ke data class="summary" */
                    const calorieSummaryItem = `
                    <div class="summary m-3"
                        <label class="input-name-add" id="input-name">${foodName}</label>
                        <div class="nominal">
                            <input type="text" class="input-gram" id="input-gram" value="${foodGram}">
                            <label class="input-calorie" id="input-calorie">${foodCalorie}</label>
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