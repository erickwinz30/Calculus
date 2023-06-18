<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}" />
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
                <div id="search">
                    <input placeholder="Search Foods..." id="searchElement" name="search" type="search"
                        class="form-control">
                    <button id="searchButtonElement" class="search-btn" type="submit">Search</button>
                </div>
            </section>
            <a href="{{ url('add-food') }}" class="add">Add New Food <i class="fa-solid fa-circle-plus fa-lg"
                    style="color: #76dfb7;"></i></a>
            <section class="card d-none" id="food-list">

            </section>
        </div>


        <!-- CALORIE SUMMARY -->
        <aside>
            <div class="card">
                <h4 class="calorie-summary">Calorie Summary</h4>
                <div id="calorie-summary-form">
                    {{-- {{ csrf_field() }} --}}
                    <input type="hidden" id="_token" name="_token" value="{{ csrf_token() }}" />
                    <div id="calorie-summary-list"></div>
                    <button class="add-btn d-md-flex justify-content-md-center" type="submit"
                        id="submitSummary">Add</button>
                </div>
            </div>
        </aside>
    </main>
    @include('layouts.footer')

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous">
    </script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>

    <script>
        //search
        const searchInput = document.getElementById('searchElement');
        const buttonSearch = document.querySelector('#searchButtonElement')

        buttonSearch.addEventListener('click', function(event) {
            event.preventDefault(); // Prevent form submission
            const parent = document.querySelector('#food-list')
            parent.innerHTML = ``
            foodName = searchInput.value
            if (foodName == "") {
                document.querySelector('#food-list').classList.add('d-none')
                return
            }
            $.ajax({
                url: 'addBreakfast/search/' + foodName,
                method: "GET",
                async: false,
                success: function(response) {
                    result = response.searchResult
                    console.log(result)
                    if (result.length > 0) {
                        document.querySelector('#food-list').classList.remove('d-none')
                    } else {
                        document.querySelector('#food-list').classList.add('d-none')
                    }
                    for (var i = 0; i < result.length; i++) {
                        element = document.createElement('div')
                        element.classList.add(...['food', 'mb-3', 'w-100'])
                        const item = `
                        <div class="col-10 d-flex justify-content-between w-100">
                            <label class="input-name-list" data-name="` + result[i].food_name + `"
                                    data-id="` + result[i].id_list_food + `">
                                        ` + result[i].food_name + `
                                    <button class="food-btn" onclick=addFoodSummary(this.parentElement.parentElement)>
                                        <i class="fa-solid fa-circle-plus fa-lg" style="color: #76dfb7;"></i>
                                    </button>
                            </label>
                            <div class="td-input-main">
                                <label class="input-data-gram"
                                    data-gram="` + Math.round(result[i].weight) + `">` + Math.round(result[i].weight) + ` gr</label>
                                <label class="input-data-calorie"
                                    data-calorie="` + Math.round(result[i].food_calories) + `">` + Math.round(result[i]
                            .food_calories) + `
                                    Cals</label>
                            </div>
                        </div>
                        `
                        element.innerHTML = item
                        parent.insertAdjacentElement('beforeend', element)
                    }
                },
                error: function(xhr, status, error) {
                    if (error == "Not Found") {
                        document.querySelector('#food-list').classList.add('d-none')
                    }
                }
            });
        });

        //food container
        const calorieSummaryList = document.querySelector('#calorie-summary-list');
        const foodList = document.querySelector('#food-list');

        function addFoodSummary(elem) {
            const parentElement = elem;
            const foodId = parentElement.querySelector('.input-name-list').dataset.id;
            const foodName = parentElement.querySelector('.input-name-list').dataset.name;
            const foodGram = parentElement.querySelector('.input-data-gram').dataset.gram;
            const foodCalorie = parentElement.querySelector('.input-data-calorie').dataset.calorie;

            const calorieSummaryItem = `
                    <div class="summary m-3 d-flex justify-content-between">
                        <label class="input-id" id="input-id" name="input-id" data-id="${foodId}">${foodName}</label>
                        <div class="nominal">
                            <input type="text" class="input-gram" id="input-gram" name="input-gram" value="${foodGram}">gr
                            <label class="input-calorie" id="input-calorie" name="input-calorie">${foodCalorie} Cals</label>
                            <button class="delete-button" onclick="deleteFoodSummary(this.parentElement.parentElement)">Delete</button>
                        </div>
                    </div>
            `;

            calorieSummaryList.innerHTML += calorieSummaryItem;
        }

        function deleteFoodSummary(elem) {
            console.log(elem)
            const row = elem;
            deleteRow(row);
        }
        function deleteRow(row) {
            row.remove();
        };

        const btnSubmitCalorie = document.getElementById('submitSummary');

        btnSubmitCalorie.addEventListener('click', function(e) {
            e.preventDefault()
            const foodSubmitId = document.querySelectorAll('.input-id')
            const foodGram = document.querySelectorAll('.input-gram')
            const token = document.querySelector('#_token').value

            for (i = 0; i < foodSubmitId.length; i++) {
                food_id = foodSubmitId[i].dataset.id
                food_gram = foodGram[i].value
                $.ajax({
                    url: "/addBreakfast/save",
                    method: "POST",
                    headers: {
                        'X-CSRF-TOKEN': token
                    },
                    data: {
                        input_id: food_id,
                        input_gram: food_gram
                    },
                    async: false,
                    success: function(response) {
                        console.log('Payload send!')
                    },
                    error: function(xhr, status, error) {
                        console.log('Payload error!')
                    }
                });
            }
            console.log('oke') //Kalau ajax udah kepanggil, tulisanya dibawah sini
            window.location.href = '/'
        });
    </script>
    @include('layouts.footer')
</body>

</html>