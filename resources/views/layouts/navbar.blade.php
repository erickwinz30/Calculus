<link rel="stylesheet" href="{{ asset( 'css/navbar.css' ) }}">

<nav class="navbar">
    <div class="container">
        <a class="navbar-brand" href="home">
            <img src="{{ asset('img/logo.png') }}" alt="logo">
        </a>
        <ul class="nav nav-pills">
            <li class="nav-item">
                <a class="nav-link {{ ($title === 'Home') ? 'active' : '' }}" href="home">Home</a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ ($title === 'Health Tips') ? 'active' : '' }}" href="health-tips">Health Tips</a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ ($title === 'About Us') ? 'active' : '' }}" href="about">About Us</a>
            </li>
            <a class="avatar" href="">
                <img src="{{ asset('profilePic/erickwinz30-jiwoni.jpg') }}" alt="Profile picture" />
            </a>
        </ul>
    </div>
</nav>