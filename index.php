<?php
include 'config.php';

session_start();

if (isset($_SESSION['admin'])) {
    $session_login = "admin";
} else if (isset($_SESSION['siswa'])) {
    $session_login = "siswa";
} else if (isset($_SESSION['pegawai'])) {
    $session_login = "pegawai";
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>School Homepage</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f2f2f2;
        }

        header {
            background-color: #4CAF50;
            padding: 10px;
            text-align: center;
        }

        nav {
            background-color: #333;
            overflow: hidden;
        }

        nav a {
            float: left;
            display: block;
            color: white;
            text-align: center;
            padding: 14px 16px;
            text-decoration: none;
        }

        nav a:hover {
            background-color: #ddd;
            color: black;
        }

        section {
            padding: 20px;
        }

        footer {
            background-color: #4CAF50;
            padding: 10px;
            text-align: center;
            color: white;
            position: fixed;
            bottom: 0;
            width: 100%;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        th,
        td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }

        th {
            background-color: #4CAF50;
            color: white;
        }

        tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        .card {
            border: 1px solid #ddd;
            /* Add a border for better visibility */
            border-radius: 8px;
            /* Add rounded corners */
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            /* Add a subtle shadow for depth */
        }

        .card-header {
            background-color: #007BFF;
            /* Header background color */
            color: #fff;
            /* Header text color */
            font-size: 1.2rem;
            /* Header text size */
            font-weight: bold;
            /* Header text bold */
            padding: 10px;
            /* Header padding */
            border-bottom: 1px solid #ddd;
            /* Border between header and body */
        }

        .card-body {
            padding: 15px;
            /* Body padding */
        }

        .card-text {
            color: #333;
            /* Body text color */
            font-size: 1rem;
            /* Body text size */
        }
    </style>
</head>

<body>

    <header>
        <h1>SMP Negeri 14 Tangerang</h1>
    </header>

    <nav>
        <a href="#homepage">Homepage</a>
        <?php
        if (isset($session_login)) {
        ?>
            <a href="#daftar-siswa">Daftar Siswa</a>
            <a href="#daftar-pegawai">Daftar Pegawai</a>

        <?php
        }
        ?>
        <a href="#kesan-dan-pesan">Kesan dan Pesan</a>
        <a href="#fasilitas">Fasilitas</a>

        <?php
        if (isset($session_login)) {
            echo '<i class="fa-solid fa-right-to-bracket"></i>';
            echo '<a class="link-danger" href="logout.php">Logout</a>';
        } else {
            echo '<a class="link-success" href="login.php">Login</a>';
        }
        ?>

    </nav>

    <section id="homepage">
        <div class="row mt-3" align="justify">
            <h3>Tentang SMP Negeri 14 Tangerang</h3>
            <hr>
            <p>Sambutan kepala sekolah</p>
            <p> Semangat pagi !</p>
            <p> Salam sehat dan Bahagia </p>

            <p> Bapak ibu dan ananda yang kami banggakan,</p>

            <p> Kami mengucapkan selamat datang di Website kami di Sekolah Menengah Pertama Negeri 14 Tangerang</p>

            <p> Website ini kami tujukan untuk seluruh guru, karyawan dan siswa serta masyarakat umum agar dapat mengakses seluruh informasi tentang profil, aktifitas/kegiatan serta fasilitas sekolah secara berkala dan update.</p>


            <p> Kami selaku pimpinan sekolah mengucapkan terima kasih kepada tim pengelola website ini yang telah berusaha memperkenalkan segala hal yang dimiliki oleh sekolah.</p>
            <p> Tentunya Website sekolah kami masih terdapat banyak kekurangan, oleh karena itu kepada sel</p>uruh civitas akademika dan masyarakat umum dapat memberikan saran dan kritik yang membangun demi kemajuan website ini lebih lanjut.</p>

            <p> SMPN 14 Tangerang</p>
            <p> Sekolahku Gudangnya Prestasi</p>
            <p> Siap Melayani, Mencetak Karakter Unggul dan Prestasi</p>
            <hr>
        </div>

        <div class="row mt-3" align="justify">
            <h3>Sejarah sekolah</h3>
            <hr>
            <p>SMP Negeri 14 Tangerang adalah salah satu sekolah Negeri di Tangerang yang dibangun pada tahun 1988. Sekolah ini beralamat di Jl. Perum Sekneg RI No.33 Cikokol, Tangerang. Awalnya Sekolah ini dibangun pemerintah kota Tangerang, diperuntukan kepada warga sekitar perumahan sekertariat negara.</p>

            <p>Hingga akhirnya, terhitung mulai tanggal 2 Januari 1988 SMP Negeri 14 Tangerang resmi dibuka berdasarkan SK Pendirian Sekolah nomor 052/O/1988. Penerimaan siswa baru dimulai pada bulan Februari tahun 1988, dengan menerima siswa kelas satu sebanyak tiga rombongan belajar.</p>

            <p>Letak sekolah yang berada pada daerah strategis dan terjangkau, membuat SMP Negeri 14 Tangerang menjelma menjadi sekolah favorit. Selain itu, SMP Negeri 14 Tangerang juga terletak pada lokasi perumahan yang dihuni oleh warga lokal maupun warga pendatang. Pendapatannya diatas rata-rata dan mempunyai latar belakang pendidikan yang cukup. Hal ini sangat membantu kemajuan sekolah, banyak orang tua siswa berpartisipasi dalam menciptakan suasana belajar yang kondusif, baik sumbangsih ide kreatif maupun sumbangan materi.</p>

            <p>Beberapa faktor pendukung di atas, membuat SMP Negeri 14 Tangerang berkembang dengan cepat, sehingga pada tahun 2007 dipercaya sebagai sekolah yang berstandar Nasional dan menjadi percontohan program Sekolah Standar Nasional (SSN). Bukan hanya itu, Pada tahun 2008 sekolah ini kembali dipercaya sebagai contoh sekolah berkarakter, melaksanakan 16 karakter yang terintegrasi pada semua mata pelajaran. SMP Negeri 14 Tangerang, saat itu terkenal dengan program unggulan 5 S (Senyum, Salam, Sapa, Sopan, dan Santun).</p>

            <p>Dengan perkembangan belajar yang sangat baik, mulai pada tahun 2011. SMP Negeri 14 Tangerang dipercaya menerapkan kelas khusus, yaitu kelas olah raga. Dengan adanya kelas olah raga, siswa SMP Negeri 14 Tangerang banyak menorehkan prestasi, baik pada event kejuaraan tingkat Provinsi maupun tingkat Nasional. Sebuah kebanggan yang luar biasa, segudang prestasi membuat SMP Negeri 14 Tangerang, bukan hanya dikenal oleh warga Kota Tangerang, warga luar kota Tangerang pun mengakui pencapaian sekolah yang terletak di jalan Perum Sekneg RI ini.</p>

            <p>Ukiran prestasi terus ditorehkan, penerapan proses belajar mengajar yang mengacu pada pendidikan berkarakter. SMP Negeri 14 Tangerang mencapai Adiwiyata Nasional pada tahun 2O13. Tahun 2016 dipercaya sebagai sekolah dengan program Penguatan Pendidikan Karakter (PPK). Gerakan ini bertujuan untuk memperkuat karakter siswa, melalui harmonisasi dengan dukungan pelibatan publik dan kerja sama antar sekolah, keluarga, dan masyarakat. Program selanjutnya yaitu sekolah ramah anak. Satuan pendidikan yang memiliki karakteristik mampu melindungi hak-hak anak serta menjadi garda terdepan dalam melaksanakan kegiatan belajar mengajar yang berorientasi pada anak.</p>

            <hr>
        </div>

    </section>

    <?php
    if (isset($session_login)) {
    ?>
        <section id="daftar-siswa">
            <h2>Daftar Siswa</h2>

            <?php
            if (isset($session_login)) {
                if ($session_login == 'admin') {
                    $nama = $_SESSION['admin'];
            ?>

                    <nav class="mt-5" style="width:fit-content">
                        <a href="siswa.php" class="link-warning">[+] Tambah Baru</a>
                    </nav>

            <?php
                }
            }
            ?>

            <br>

            <table class="table" border="1">
                <thead class="table-warning">
                    <tr>
                        <th>No</th>
                        <th>NIS</th>
                        <th>Nama</th>
                        <th>Alamat</th>
                        <th>Tahun Masuk</th>
                        <th>Asal Sekolah</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody class="table-light">

                    <?php
                    $sql = "SELECT * FROM siswa";
                    $query = mysqli_query($conn, $sql);
                    $number = 1;
                    while ($siswa = mysqli_fetch_array($query)) {
                        echo "<tr>";

                        echo "<td>" . $number . "</td>";
                        echo "<td>" . $siswa['nomor_induk_siswa'] . "</td>";
                        echo "<td>" . $siswa['nama'] . "</td>";
                        echo "<td>" . $siswa['alamat'] . "</td>";
                        echo "<td>" . $siswa['tahun_masuk'] . "</td>";
                        echo "<td>" . $siswa['asal_sekolah'] . "</td>";

                        echo "<td>";
                        if (isset($session_login) && $session_login == 'admin') {
                            $nama = $_SESSION['admin'];
                            echo "<a href='siswa.php?nis=" . $siswa['nomor_induk_siswa'] . "' class=\"link-warning\">Edit</a>";
                        }
                        echo "</td>";

                        echo "</tr>";
                        $number++;
                    }
                    ?>

                </tbody>
            </table>
        </section>

    <?php
    }
    ?>
    <?php
    if (isset($session_login)) {
    ?>
        <section id="daftar-pegawai">
            <h2>Daftar Pegawai</h2>

            <?php
            if (isset($session_login)) {
                if ($session_login == 'admin') {
                    $nama = $_SESSION['admin'];
            ?>

                    <nav class="mt-5" style="width:fit-content">
                        <a href="pegawai.php" class="link-warning">[+] Tambah Baru</a>
                    </nav>

            <?php
                }
            }
            ?>
            <br>
            <table class="table" border="1">
                <thead class="table-warning">
                    <tr>
                        <th>No</th>
                        <th>NIP</th>
                        <th>Nama</th>
                        <th>Jabatan</th>
                        <th>Alamat</th>
                        <th>Pendidikan Terakhir</th>
                        <th>Pengalaman Mengajar</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody class="table-light">

                    <?php
                    $sql = "SELECT * FROM pegawai";
                    $query = mysqli_query($conn, $sql);
                    $number = 1;
                    while ($pegawai = mysqli_fetch_array($query)) {
                        echo "<tr>";

                        echo "<td>" . $number . "</td>";
                        echo "<td>" . $pegawai['nomor_induk_pegawai'] . "</td>";
                        echo "<td>" . $pegawai['nama'] . "</td>";
                        echo "<td>" . $pegawai['jabatan'] . "</td>";
                        echo "<td>" . $pegawai['alamat'] . "</td>";
                        echo "<td>" . $pegawai['pendidikan_terakhir'] . "</td>";
                        echo "<td>" . $pegawai['pengalaman_mengajar'] . "</td>";

                        echo "<td>";
                        if (isset($session_login) && $session_login == 'admin') {
                            $nama = $_SESSION['admin'];
                            echo "<a href='pegawai.php?nip=" . $pegawai['nomor_induk_pegawai'] . "' class=\"link-warning\">Edit</a>";
                        }
                        echo "</td>";

                        echo "</tr>";
                        $number++;
                    }
                    ?>

                </tbody>
            </table>
        </section>

    <?php
    }
    ?>

    <section id="kesan-dan-pesan" style="margin-bottom:200px">
        <h2>Kesan dan Pesan</h2>

        <?php
        if (isset($session_login)) {
            if ($session_login !== 'admin') { ?>
                <nav class="mt-5" style="width:fit-content">
                    <a href="pesan_kesan.php" class="link-warning">[+] Tambah Baru</a>
                </nav>
        <?php
            }
        }
        ?>
        <br>

        <div style="display:flex">
            <?php
            $sql = "SELECT 
            tpk.pesan_kesan,
            CASE 
                WHEN ms.NAMA IS NOT NULL THEN
                    ms.nama
                ELSE
                    mp.nama
            END AS nama
            FROM pesan_kesan tpk LEFT JOIN siswa ms ON ms.nomor_induk_siswa = tpk.nomor_induk LEFT JOIN pegawai mp ON mp.nomor_induk_pegawai = tpk.nomor_induk";
            $query = mysqli_query($conn, $sql);
            while ($pesanKesan = mysqli_fetch_array($query)) {
                echo '
                    <div class="card text-bg-light m-3 col-md-3" style="max-width: 18rem; margin-left: 15px">
                        <h6 class="card-header">' . $pesanKesan['nama'] . '</h6>
                        <div class="card-body">
                            <div class="card-text">
                                <p>' . $pesanKesan['pesan_kesan'] . '</p>
                            </div>
                        </div>
                    </div>
                    ';
            }
            ?>
        </div>
    </section>

    <section id="fasilitas">
        <h3>Fasilitas Sekolah</h3>
        <br>

        <div style="display:flex">
            <ul>
                <li>Kelas</li>
                <img src="img/fasilitas/kelas.jpg" height="300" class="mb-3" />
                <li>Lab</li>
                <img src="img/fasilitas/Lab.jpg" height="300" class="mb-3" />
                <li>Masjid</li>
                <img src="img/fasilitas/masjid.jpg" height="300" class="mb-3" />
                <li>Lapangan Sekolah</li>
                <img src="img/fasilitas/lapangan basket.jpg" height="300" class="mb-3" />
                <li>Perpustakaan</li>
                <img src="img/fasilitas/perpustakaan.jpg" height="300" class="mb-3" />
                <li>Taman</li>
                <img src="img/fasilitas/taman.jpg" height="300" class="mb-3" />
                
            </ul>
        </div>
    </section>

    <section class="body-section">
        <h3> Maps </h3>
        <div style="width: 100%; margin-bottom:200px"><iframe width="100%" height="600" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://maps.google.com/maps?width=100%25&amp;height=600&amp;hl=en&amp;q=SMPN%2014%20Tangerang+(SMP%20Negeri%2014%20Tangerang%20)&amp;t=&amp;z=17&amp;ie=UTF8&amp;iwloc=B&amp;output=embed"><a href="https://www.maps.ie/population/">Population calculator map</a></iframe></div>
    </section>

    <footer>
        <p>SMP Negeri 14 Tangerang &copy; 2024 | Perum SekNeg RI No.33, RT.004/RW.015, Cikokol,Tangerang | Phone: (021) 5545847 | Email: admin@smpn14tangerang.sch.id
</p>
    </footer>

</body>

</html>