<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('/public/css/about.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <title>Calculus | About Us</title>
</head>

<body>
    <header>
        <nav class="navbar">
            <div class="container">
                <a class="navbar-brand" href="">
                    <img src="{{ asset('public/img/logo.png') }}" alt="logo">
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
                </ul>
            </div>
        </nav>
    </header>
    <main>
        <h3 class="title">Tentang Kami</h3>
        <div class="about">
            <img src="{{ asset('/public/img/logo.png') }}" alt="logo">
            <p>Kesehatan menjadi semakin penting dalam kehidupan sehari-hari. Banyak sekali kondisi yang muncul akibat dari ketidaktahuan kita dalam memenuhi kebutuhan kalori kita sehari-hari, terkadang kita mengkonsumsi kalori dalam jumlah yang berlebihan sehingga dapat menyebabkan berat badan tubuh bertambah. Selain itu, kalori yang berlebih dapat menimbulkan penyakit seperti diabetes, kolesterol, kurang kalori protein (KKP), marasmus, dan sebagainya. Pola makan yang sehat dapat membantu menjaga kesehatan dan berat badan ideal. Salah satu cara mengontrol pola makan adalah dengan menghitung kalori yang dikonsumsi setiap harinya. Namun, tidak semua orang memiliki pengetahuan dan kemampuan untuk menghitung kalori dengan benar. <br><br> Berdasarkan pernyataan di atas, kami ingin membuat suatu website yang menyediakan fitur agar pengguna/user bisa mengetahui jumlah kalori yang harus masuk ke dalam tubuh mereka dan sudah seberapa banyak kalori yang mereka konsumsi di hari itu. Selain itu, kami juga memberikan edukasi mengenai makanan yang sehat dan pola hidup sehat. Kami menyadari bahwa banyak orang kesulitan untuk menghitung kalori dan mengontrol pola makan mereka. Oleh karena itu, kami ingin membuat sebuah website yang user-friendly dan mudah digunakan oleh pengguna. Kami yakin bahwa website ini dapat membantu banyak orang untuk meningkatkan kesehatan mereka dan hidup lebih sehat. Website ini kami beri nama CalCuLus (Calorie Counter Love ur Self).</p>
        </div>
        <hr>
        <h3 class="title">Founders</h3>
        <div class="founders">
            <div class="card">
                <img src="{{ asset('/public/img/erick.jpg') }}" class="card-img-top" alt="Erick Winata">
                <div class="card-body">
                    <h6>Erick Winata</h6><br>
                    <p>
                        Sistem Informasi<br>
                        Universitas Dinamika<br>
                        <i class="fa-regular fa-envelope"></i> erickwinz27@gmail.com
                    </p>
                </div>
                <ul>
                    <li><a href="https://www.linkedin.com/in/erick-winata-b59581235/"><i class="fa-brands fa-linkedin"></i></a></li>
                    <li><a href="https://github.com/erickwinz30"><i class="fa-brands fa-github"></i></a></li>
                    <li><a href="https://www.instagram.com/erickwinz30/"><i class="fa-brands fa-instagram"></i></a></li>
                </ul>
            </div>
            <div class="card">
                <img src="{{ asset('/public/img/fariz.jpeg') }}" class="card-img-top" alt="Fariz Purnama Aji">
                <div class="card-body">
                    <h6>Fariz Purnama Aji</h6><br>
                    <p>
                        Sistem Informasi<br>
                        Universitas Dinamika<br>
                        <i class="fa-regular fa-envelope"></i> f.purnamaaji@gmail.com
                    </p>
                </div>
                <ul>
                    <li><a href=""><i class="fa-brands fa-linkedin"></i></a></li>
                    <li><a href="https://github.com/Farchar"><i class="fa-brands fa-github"></i></a></li>
                    <li><a href="https://www.instagram.com/farizp.a/"><i class="fa-brands fa-instagram"></i></a></li>
                </ul>
            </div>
            <div class="card">
                <img src="{{ asset('/public/img/bilal.jpeg') }}" class="card-img-top" alt="Muhammad Bilal Al-Asy'ari">
                <div class="card-body">
                    <h6>Muhammad Bilal Al-Asy'ari</h6><br>
                    <p>
                        Teknik Informatika<br>
                        STT Terpadu Nurul Fikri<br>
                        <i class="fa-regular fa-envelope"></i> shiroe.kagamishi@gmail.com
                    </p>
                </div>
                <ul>
                    <li><a href="https://www.linkedin.com/in/muhammad-bilal-al-asy-ari-647b42214/"><i class="fa-brands fa-linkedin"></i></a></li>
                    <li><a href="https://github.com/shiroe2018"><i class="fa-brands fa-github"></i></a></li>
                    <li><a href="https://www.instagram.com/shiroe_shi/"><i class="fa-brands fa-instagram"></i></a></li>
                </ul>
            </div>
            <div class="card">
                <img src="{{ asset('/public/img/siti.jpg') }}" class="card-img-top" alt="Siti Khoiriati">
                <div class="card-body">
                    <h6>Siti Khoiriati</h6><br>
                    <p>
                        Manajemen Informatika<br>
                        Politeknik Negeri Sriwijaya<br>
                        <i class="fa-regular fa-envelope"></i> sitikhoiriati@gmail.com
                    </p>
                </div>
                <ul>
                    <li><a href="https://www.linkedin.com/in/siti-khoiriati-03691b260/"><i class="fa-brands fa-linkedin"></i></a></li>
                    <li><a href="https://github.com/Khoiriati"><i class="fa-brands fa-github"></i></a></li>
                    <li><a href="https://www.instagram.com/skhoiriati1102/"><i class="fa-brands fa-instagram"></i></a></li>
                </ul>
            </div>
        </div>
    </main>
    <footer>
        Copyright © 2023 - Calculus by C23-M4047
    </footer>
</body>

</html>