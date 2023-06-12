<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/add-calorie.css') }}">
    <title>Document</title>
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
                            <h2 class="input-data-list" data-gram="" data-calorie=""> 50gr 400Cals </h2>
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
        window.addEventListener('load', function() {
            const calorieSummaryList = document.querySelector('#calorie-summary-list');
            const foodList = document.querySelector('#food-list');

            const foodButtons = document.querySelector('.food-btn');
            foodButtons.forEach((foodButton) => {
                foodButton.addEventListener('click', function() {
                    const foodName = foodButton.parentElement.dataset.name;
                    const foodGram = foodButton.parentElement.dataset.gram;
                    const foodCalorie = foodButton.parentElement.dataset.calorie;

                    const calorieSummaryItem = `
                        <tr class="tr-aside">
                            <td>
                                <h2 class="input" id="input-name">${foodName}</h2>
                            </td>
                            <td class="td-button-delete">
                            <h2 class="input" id="input-gram">${foodGram}</h2>
                            <h2 class="input" id="input-calorie">${foodGram}</h2>
                            <button class="delete-button">Delete</button>
                            </td>
                        </tr>
                    `;

                    calorieSummaryList.innerHTML += calorieSummaryItem;
                });
            });

            const deleteButtons = document.querySelectorAll('.delete-button');
            deleteButtons.forEach((deleteButton) => {
                deleteButton.addEventListener('click', function() {
                    const row = deleteButton.closest('.tr-aside');
                    row.remove();
                });
            });
        });
    </script>
</body>

</html>