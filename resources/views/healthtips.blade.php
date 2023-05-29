<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('/public/css/tips.css') }}">
    <title>Calculus | Health Tips</title>
</head>

<body>
    <header>
        <nav class="navbar">
            <div class="container">
                <a class="navbar-brand" href="">
                    <img src="{{ asset('/public/img/logo.png') }}" alt="logo">
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
        <h3 class="title">Calorie Information</h3>
        <p class="calorie-information">Kalori adalah salah satu kebutuhan pokok manusia agar bisa bertahan hidup dan menjalankan aktivitas sehari-hari. Kalori merupakan suatu nutrisi yang terkandung dalam makanan. Konsumsi energi berasal dari makanan yang diperlukan untuk menutupi pengeluaran energi seseorang. Kalori basal atau <i>Basal Metabolic Rate</i> (BMR) adalah kebutuhan kalori yang dibutuhkan oleh tubuh untuk melakukan aktivitas basalnya seperti mempertahankan fungsi alat pernapasan, sirkulasi darah, mempertahankan suhu tubuh, dan membuang racun dalam tubuh.</p>
        <table>
            <caption>Rata-Rata Kebutuhan Kalori</caption>
            <tr>
                <th>Jenis Kelamin</th>
                <th>Usia (tahun)</th>
                <th>Aktivitas Ringan (dalam kalori)</th>
                <th>Aktivitas Sedang (dalam kalori)</th>
                <th>Aktivitas Berat (dalam kalori)</th>
            </tr>
            <tr>
                <td>Anak-anak</td>
                <td>2-3</td>
                <td>1000</td>
                <td>1000-1400</td>
                <td>1000-1400</td>
            </tr>
            <tr>
                <td rowspan="6">Wanita</td>
                <td>4-8</td>
                <td>1200</td>
                <td>1400-1600</td>
                <td>1400-1800</td>
            </tr>
            <tr>
                <td>9-13</td>
                <td>1600</td>
                <td>1600-2000</td>
                <td>1800-2200</td>
            </tr>
            <tr>
                <td>14-18</td>
                <td>1800</td>
                <td>2000</td>
                <td>2400</td>
            </tr>
            <tr>
                <td>19-30</td>
                <td>2000</td>
                <td>2000-2200</td>
                <td>2400</td>
            </tr>
            <tr>
                <td>31-50</td>
                <td>2000</td>
                <td>2000</td>
                <td>2200</td>
            </tr>
            <tr>
                <td>51+</td>
                <td>1600</td>
                <td>1800</td>
                <td>2000-2200</td>
            </tr>
            <tr>
                <td rowspan="6">Pria</td>
                <td>4-8</td>
                <td>1400</td>
                <td>1400-1600</td>
                <td>1600-2000</td>
            </tr>
            <tr>
                <td>9-13</td>
                <td>1800</td>
                <td>1800-2200</td>
                <td>2000-2600</td>
            </tr>
            <tr>
                <td>14-18</td>
                <td>2200</td>
                <td>2400-2800</td>
                <td>2800-3200</td>
            </tr>
            <tr>
                <td>19-30</td>
                <td>2400</td>
                <td>2600-2800</td>
                <td>3000</td>
            </tr>
            <tr>
                <td>31-50</td>
                <td>2200</td>
                <td>2400-2600</td>
                <td>2800-3000</td>
            </tr>
            <tr>
                <td>51+</td>
                <td>2000</td>
                <td>2200-2400</td>
                <td>2400-2800</td>
            </tr>
        </table>
        <br>
        <h3 class="title">Health Tips</h3>
        <div class="tips">
            <div class="tips-item">
                <img class="tips-item__thumbnail" src="{{ asset('/public/img/tips1.jpg') }}" alt="Tips Pola Makan untuk Diet Sehat">
                <div class="tips-item__content">
                    <h5 class="tips-item__title">Tips Pola Makan untuk Diet Sehat</h5>
                    <p class="tips-item__description">Diet kerap digunakan sebagai cara untuk mendapatkan berat badan ideal. Namun, pola makan untuk diet sehat bukan dengan melewatkan waktu makan. Kunci diet sehat adalah menyeimbangkan jumlah kalori yang dikonsumsi dengan yang dikeluarkan dan memenuhi kebutuhan nutrisi tubuh, seperti protein, karbohidrat, lemak, serta aneka vitamin dan mineral.</p>
                    <a class="read-more__btn" href="http://www.alodokter.com/tips-pola-makan-untuk-diet-sehat" target="_blank" rel="noopener noreferrer"><b>Baca Selengkapnya</b></a>
                </div>
            </div>
            <div class="tips-item">
                <img class="tips-item__thumbnail" src="{{ asset('/public/img/tips2.jpg') }}" alt="Ingin Diet Alami Tanpa Obat, Ini Tipsnya">
                <div class="tips-item__content">
                    <h5 class="tips-item__title">Ingin Diet Alami Tanpa Obat, Ini Tipsnya</h5>
                    <p class="tips-item__description">Daripada menjalani program diet instan yang berisiko, kamu bisa mencoba diet alami tanpa obat untuk mendapatkan bentuk tubuh yang diimpikan. Selain lebih aman, diet alami tanpa obat dapat memberikan sejumlah manfaat lain untuk kesehatan, misalnya kamu dapat mencapai berat badan ideal yang ditargetkan serta mendapatkan bentuk tubuh langsing dan sehat.</p>
                    <a class="read-more__btn" href="https://www.alodokter.com/ingin-diet-alami-tanpa-obat-ini-tipsnya" target="_blank" rel="noopener noreferrer"><b>Baca Selengkapnya</b></a>
                </div>
            </div>
            <div class="tips-item">
                <img class="tips-item__thumbnail" src="{{ asset('/public/img/tips3.jpg') }}" alt="Tips Diet Rendah Garam yang Aman dan Tepat">
                <div class="tips-item__content">
                    <h5 class="tips-item__title">Tips Diet Rendah Garam yang Aman dan Tepat</h5>
                    <p class="tips-item__description">Diet rendah garam disarankan untuk penderita gagal jantung atau tekanan darah tinggi. Pola makan ini dapat membantu mengendalikan penyakit tersebut. Namun, cara melakukan diet ini harus tepat, agar kadar garam (natrium) dalam tubuh tetap seimbang dan manfaat pola makan ini benar-benar optimal.</p>
                    <a class="read-more__btn" href="https://www.alodokter.com/tips-sehat-untuk-diet-rendah-garam" target="_blank" rel="noopener noreferrer"><b>Baca Selengkapnya</b></a>
                </div>
            </div>
            <div class="tips-item">
                <img class="tips-item__thumbnail" src="{{ asset('/public/img/tips4.jpg') }}" alt="Cara Mengurangi Kolesterol dengan Beta Glucan dan Inulin">
                <div class="tips-item__content">
                    <h5 class="tips-item__title">Cara Mengurangi Kolesterol dengan Beta Glucan dan Inulin</h5>
                    <p class="tips-item__description">Kadar kolesterol yang terlalu tinggi dan tidak terkontrol bisa menimbulkan masalah kesehatan, mulai dari stroke hingga serangan jantung yang terkadang tidak menimbulkan gejala. Salah satu cara menurunkan kolesterol tinggi adalah dengan mengonsumsi makanan yang kaya serat, termasuk beta glucan dan inulin.</p>
                    <a class="read-more__btn" href="https://www.alodokter.com/cara-mengurangi-kolesterol-dengan-beta-glucan-dan-inulin" target="_blank" rel="noopener noreferrer"><b>Baca Selengkapnya</b></a>
                </div>
            </div>
            <div class="tips-item">
                <img class="tips-item__thumbnail" src="{{ asset('/public/img/tips5.jpg') }}" alt="Pola Makan Vegetarian yang Sehat">
                <div class="tips-item__content">
                    <h5 class="tips-item__title">Pola Makan Vegetarian yang Sehat</h5>
                    <p class="tips-item__description">Vegetarian bukan berarti tidak mengonsumsi daging dan produk hewani, seperti telur dan produk olahan susu. Pola makan vegetarian memiliki banyak manfaat jika memperhatikan keseimbangan kandungan nutrisi dari setiap makanan yang dikonsumsi, seperti mengontrol berat badan dan kadar kolesterol, menurunkan risiko penyakit jantung, dan diabetes tipe 2.</p>
                    <a class="read-more__btn" href="https://www.alodokter.com/pola-makan-vegetarian-yang-sehat" target="_blank" rel="noopener noreferrer"><b>Baca Selengkapnya</b></a>
                </div>
            </div>
            <div class="tips-item">
                <img class="tips-item__thumbnail" src="{{ asset('/public/img/manfaat1.jpg') }}" alt="Manfaat Gula Merah bagi Penderita Diabetes">
                <div class="tips-item__content">
                    <h5 class="tips-item__title">Manfaat Gula Merah bagi Penderita Diabetes</h5>
                    <p class="tips-item__description">Manfaat gula merah sebagai pemanis sudah lama dikenal masyarakat. Lebih dari itu, gula merah dianggap lebih baik dikonsumsi bagi penderita diabetes daripada gula putih. Gula merah berasal dari nira pohon kelapa dan memiliki kandungan gizi yang baik bagi kesehatan. Indeks glikemik (IG) gula merah juga lebih rendah dibandingkan dengan pemanis lainnya.</p>
                    <a class="read-more__btn" href="https://www.alodokter.com/Manfaat-Gula-Merah-VS-Gula-Putih-bagi-Penderita-Diabetes" target="_blank" rel="noopener noreferrer"><b>Baca Selengkapnya</b></a>
                </div>
            </div>
            <div class="tips-item">
                <img class="tips-item__thumbnail" src="{{ asset('/public/img/manfaat2.jpg') }}" alt="Garam Lososa, Garam Rendah Sodium yang Lebih Sehat bagi Tubuh">
                <div class="tips-item__content">
                    <h5 class="tips-item__title">Garam Lososa, Garam Rendah Sodium yang Lebih Sehat bagi Tubuh</h5>
                    <p class="tips-item__description">Garam lososa atau <i>low sodium salt</i> adalah garam rendah natrium (sodium), sebagian kandungan sodiumnya diganti dengan kalium klorida (senyawa garam alami yang sering ditemukan di laut atau tanah). Salah satu manfaatnya ialah menurunkan tekanan darah. Namun, tidak semua orang dapat mengonsumsi garam ini.</p>
                    <a class="read-more__btn" href="https://www.alodokter.com/garam-lososa-garam-rendah-sodium-yang-lebih-sehat-bagi-tubuh" target="_blank" rel="noopener noreferrer"><b>Baca Selengkapnya</b></a>
                </div>
            </div>
            <div class="tips-item">
                <img class="tips-item__thumbnail" src="{{ asset('/public/img/manfaat3.jpg') }}" alt="Yoga untuk Pemula, Ketahui Manfaat dan Tips Melakukannya">
                <div class="tips-item__content">
                    <h5 class="tips-item__title">Yoga untuk Pemula, Ketahui Manfaat dan Tips Melakukannya</h5>
                    <p class="tips-item__description">Yoga untuk pemula perlu dilakukan dengan mengikuti beberapa tips, termasuk memilih gerakan yang mudah dilakukan terlebih dahulu hingga tubuh terbiasa. Jika dilakukan dengan rutin dan benar, olahraga satu ini dapat mendatangkan banyak manfaat untuk kesehatan, salah satunya adalah menjaga kesehatan jantung.</p>
                    <a class="read-more__btn" href="https://www.alodokter.com/tidak-perlu-bertubuh-lentur-untuk-ikut-yoga" target="_blank" rel="noopener noreferrer"><b>Baca Selengkapnya</b></a>
                </div>
            </div>
            <div class="tips-item">
                <img class="tips-item__thumbnail" src="{{ asset('/public/img/manfaat4.jpg') }}" alt="Minuman Isotonik, Teman yang Tepat Saat Berolahraga">
                <div class="tips-item__content">
                    <h5 class="tips-item__title">Minuman Isotonik, Teman yang Tepat Saat Berolahraga</h5>
                    <p class="tips-item__description">Minuman isotonik merupakan salah satu jenis minuman yang kerap dikonsumsi saat berolahraga. Ini karena minuman isotonik dapat mengganti elektrolit yang hilang ketika seseorang banyak berkeringat. Selain itu, sebagian minuman isotonik juga mengandung gula yang dapat menjadi sumber energi tambahan. Itulah sebabnya minuman isotonik sangat populer dikalangan para atlet atau olahragawan.</p>
                    <a class="read-more__btn" href="https://www.alodokter.com/minuman-isotonik-teman-yang-tepat-saat-berolahraga" target="_blank" rel="noopener noreferrer"><b>Baca Selengkapnya</b></a>
                </div>
            </div>
            <div class="tips-item">
                <img class="tips-item__thumbnail" src="{{ asset('/public/img/manfaat5.jpg') }}" alt="7 Manfaat Mandi Air Hangat bagi Kesehatan">
                <div class="tips-item__content">
                    <h5 class="tips-item__title">7 Manfaat Mandi Air Hangat bagi Kesehatan</h5>
                    <p class="tips-item__description">Manfaat mandi air hangat tidak hanya untuk mengatasi dinginnya udara di pagi hari, tetapi juga dapat meredakan keluhan tertentu dan bahkan baik bagi kesehatan mental. Mandi air hangat juga dapat melancarkan peredaran darah. Anda akan merasa lebih rileks setelah mandi air hangat karena saat kulit bersentuhan dengan air hangat, tubuh akan melepaskan hormon endorfin, yaitu zat kimia yang dapat memberikan rasa nyaman dan bahagia.</p>
                    <a class="read-more__btn" href="https://www.alodokter.com/beragam-manfaat-mandi-air-hangat" target="_blank" rel="noopener noreferrer"><b>Baca Selengkapnya</b></a>
                </div>
            </div>
            <div class="tips-item">
                <img class="tips-item__thumbnail" src="{{ asset('/public/img/manfaat6.jpg') }}" alt="Mengenal Daun Stevia, Pemanis Alami Pengganti Gula">
                <div class="tips-item__content">
                    <h5 class="tips-item__title">Mengenal Daun Stevia, Pemanis Alami Pengganti Gula</h5>
                    <p class="tips-item__description">Daun stevia adalah pemanis alami pengganti gula yang digadang-gadang baik jika digunakan oleh penderita diabetes. Rasa manis yang dijadikan pengganti gula ini merupakan hasil ekstraksi glikosida steviol dari daun stevia yang diketahui 200-300 kali lebih manis dibanding gula pasir dan hampir tidak mengandung kalori. Namun, tetap perhatikan jumlah maksimal konsumsi hariannya supaya tetap aman digunakan.</p>
                    <a class="read-more__btn" href="https://www.alodokter.com/mengenal-daun-stevia-pemanis-alami-pengganti-gula" target="_blank" rel="noopener noreferrer"><b>Baca Selengkapnya</b></a>
                </div>
            </div>
            <div class="tips-item">
                <img class="tips-item__thumbnail" src="{{ asset('/public/img/manfaat7.jpg') }}" alt="Ini Pentingnya Meluangkan Waktu Sendiri">
                <div class="tips-item__content">
                    <h5 class="tips-item__title">Ini Pentingnya Meluangkan Waktu Sendiri</h5>
                    <p class="tips-item__description">Kata siapa, sih, meluangkan waktu sendiri itu membosankan dan tidak asyik? Menghabiskan waktu seorang diri justru memiliki banyak manfaat, mulai dari menggali kreativitas hingga menumbuhkan rasa empati. Meluangkan waktu sendiri berbeda dengan kesepian, ya. Waktu sendiri atau <i>me time</i> adalah keadaan di mana kamu menikmati momen sendiri dengan melakukan sesuatu yang kamu sukai.</p>
                    <a class="read-more__btn" href="https://www.alodokter.com/ini-pentingnya-meluangkan-waktu-sendiri" target="_blank" rel="noopener noreferrer"><b>Baca Selengkapnya</b></a>
                </div>
            </div>
        </div>
    </main>
    <footer>
        Copyright © 2023 - Calculus by C23-M4047
    </footer>
</body>

</html>