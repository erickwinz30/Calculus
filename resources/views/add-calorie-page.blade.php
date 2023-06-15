<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/add-calorie.css') }}">
    <title>Calculus | Add Calorie</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
</head>

<body>
    <header>
        @include('layouts.navbar')
    </header>

    <main>
        <!-- SEARCH BAR & MAIN LIST -->
        <div-list>
            <search-bar class="search_bar">
                <div id="search-container" class="search-container">
                    <input placeholder="Search Foods..." id="searchElement" type="search">
                    <button id="searchButtonElement" type="submit">Search</button>
                </div>
            </search-bar>
            <div class="main">
                <table class="table-main table-borderless" id="food-list">
                    <tr class="tr-main">
                        <td>
                            <h2 class="input-name-list" data-name="Nasi Goreng">
                                Nasi Goreng
                                <button class="food-btn">
                                    <i class="bi bi-plus-circle-fill"></i>
                                </button>
                            </h2>
                        </td>
                        <td class="td-input-main">
                            <h2 class="input-data-gram" data-gram="50gr">50gr</h2>
                            <h2 class="input-data-calorie" data-calorie="400Cals">400Cals</h2>
                        </td>
                    </tr>
                    <tr class="tr-main">
                        <td>
                            <h2 class="input-name-list" data-name="Nasi Goreng">
                                Nasi Goreng
                                <button class="food-btn">
                                    <i class="bi bi-plus-circle-fill"></i>
                                </button>
                            </h2>
                        </td>
                        <td class="td-input-main">
                            <h2 class="input-data-gram" data-gram="50gr">50gr</h2>
                            <h2 class="input-data-calorie" data-calorie="400Cals">400Cals</h2>
                        </td>
                    </tr>
                </table>
            </div>
        </div-list>


        <!-- CALORIE SUMMARY -->
        <aside>
            <div class="sidebar">
                <h2 class="calorie-summary"> Calorie Summary </h2>
                <table class="table-aside table-borderless" id="calorie-summary-list">

                </table>
                <button class="add">
                    <a>Add</a>
                </button>
            </div>
        </aside>
    </main>
    @include('layouts.footer')

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>

    <script>
        window.addEventListener('load', function(){
        const calorieSummaryList = document.querySelector('#calorie-summary-list');
        const foodList = document.querySelector('#food-list');
        const searchButton = document.querySelector('#searchButtonElement');
        const searchInput = document.querySelector('#searchElement');

        searchButton.addEventListener('click', function() {
            const searchTerm = searchInput.value.toLowerCase();
            const foodItems = foodList.querySelectorAll('.tr-main');

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
            foodButton.addEventListener('click', function(){
                console.log(foodButton.parentElement);

                /* Tangkap data dari induk class="tr-main" */
                const parentElement = foodButton.closest('.tr-main');
                const foodName = parentElement.querySelector('.input-name-list').dataset.name;
                const foodGram = parentElement.querySelector('.input-data-gram').dataset.gram;
                const foodCalorie = parentElement.querySelector('.input-data-calorie').dataset.calorie;           
                
                /* Input ke data class="tr-aside" */
                const calorieSummaryItem = `
                    <tr class="tr-aside">
                        <td>
                            <h2 class="input-name-add" id="input-name">${foodName}</h2>
                        </td>
                        <td class="td-add">
                            <h2 class="input-gram" id="input-gram">${foodGram}</h2>
                            <h2 class="input-calorie" id="input-calorie">${foodCalorie}</h2>
                            <button class="delete-button">Delete</button>
                        </td>
                    </tr>
                `;
        
                calorieSummaryList.innerHTML += calorieSummaryItem;

                /* Tombol Delete menagkap data yang berada di dalam class="tr-aside" */
                const deleteButtons = document.querySelectorAll('.delete-button');
                console.log(deleteButtons)
                
                deleteButtons.forEach((button) => {
                    button.addEventListener('click', function() {
                        const row = button.closest('.tr-aside');
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
</body>
</html>
