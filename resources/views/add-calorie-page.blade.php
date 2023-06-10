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
        <nav class="navbar">
            <div class="container">
                <a class="navbar-brand" href="home">
                    <img src="{{ asset('/public/img/logo.png') }}" alt="logo">
                </a>
                <ul class="nav nav-pills">
                    <li class="nav-item">
                        <a class="nav-link" href="home">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="health-tips">Health Tips</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="about">About Us</a>
                    </li>
                    <li class="avatar">
                        <img src="{{ asset('/public/img/avatar.png') }}" alt="Profile picture">
                    </li>
                </ul>
            </div>
        </nav>
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

    <footer>
        Copyright © 2023 - Calculus by C23-M4047
    </footer>
    <script type="text/javascript" src="../test-aja/script.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
</body>
</html>