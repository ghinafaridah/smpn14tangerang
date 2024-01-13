<?php
include 'config.php';

session_start();
$session_login;
// periksa apakah sudah ada session login
if (isset($_SESSION['admin'])) {
    $session_login = "admin";
} else if (isset($_SESSION['siswa'])) {
    $session_login = "siswa";
} else if (isset($_SESSION['pegawai'])) {
    $session_login = "pegawai";
}

$data = $_SESSION[$session_login];
$nama = $data['nama'];


if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // ambil data dari formulir
    $pesanKesan = $_POST['pesanKesan'];
    $createdDate = date("Y-m-d H:i:s");

    // ambil data dari session
    $data = $_SESSION[$session_login];
    if ($session_login == 'siswa') {
        $nis = $data['nomor_induk_siswa'];

        // buat query
        $sql = "INSERT INTO pesan_kesan (nomor_induk, is_siswa, pesan_kesan) VALUE ('$nis', 1, '$pesanKesan')";
    } else if ($session_login == 'pegawai') {
        $nip = $data['nomor_induk_pegawai'];

        // buat query
        $sql = "INSERT INTO pesan_kesan (nomor_induk, is_siswa, pesan_kesan) VALUE ('$nip', 0, '$pesanKesan')";
    }


    $query = mysqli_query($conn, $sql);

    // apakah query simpan berhasil?
    if ($query) {
        // kalau berhasil alihkan ke halaman sebelumnya dengan status=sukses
        header('Location: index.php#kesan-dan-pesan');
    } else {
        // kalau gagal alihkan ke halaman sebelumnya dengan status=gagal
        header('Location: index.php?status=failed');
    }
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

        /* Add the existing styles here */
        .form-content {
            background-color: #fff;
            /* White */
            color: #333;
            /* Dark text on light background */
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .form-content h2 {
            text-align: center;
            margin-bottom: 20px;
        }

        .form-content form {
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        .form-content label {
            margin: 10px 0;
            font-size: 16px;
        }

        .form-content input {
            padding: 10px;
            margin-bottom: 15px;
            width: 50%;
            box-sizing: border-box;
            border: 1px solid #333;
            /* Dark border on light background */
            border-radius: 5px;
            font-size: 14px;
        }

        .form-content button {
            background-color: #2ecc71;
            /* Green */
            color: #fff;
            padding: 12px;
            border: none;
            cursor: pointer;
            border-radius: 5px;
            font-size: 16px;
            transition: background-color 0.3s ease;
        }

        .form-content button:hover {
            background-color: #27ae60;
            /* Darker Green on Hover */
        }
    </style>
</head>

<body>

    <header>
        <h1>SMP Negeri 14 Tangerang</h1>
    </header>

    <nav>
        <a href="index.php#homepage">Homepage</a>
        <?php
        if (isset($session_login)) {
        ?>
            <a href="#daftar-siswa">Daftar Siswa</a>
            <a href="#daftar-pegawai">Daftar Pegawai</a>

        <?php
        }
        ?>
        <a href="index.php#kesan-dan-pesan">Kesan dan Pesan</a>
        <a href="index.php#fasilitas">Fasilitas</a>

        <?php
        if (isset($session_login)) {
            echo '<i class="fa-solid fa-right-to-bracket"></i>';
            echo '<a class="link-danger" href="logout.php">Logout</a>';
        } else {
            echo '<a class="link-success" href="login.php">Login</a>';
        }
        ?>

    </nav>


    <section class="body-section">
        <div id="add-siswa-form" class="content form-content">
            <h2>Tambah pesan dan kesan</h2>

            <form action="#" method="post" style="margin-bottom:100px">

                <label for="pesan_kesan">Pesan dan Kesan:</label>
                <textarea id="pesan_kesan" name="pesanKesan" required></textarea>

                <button type="submit">Tambah pesan dan kesan</button>
            </form>



        </div>
    </section>



    <footer>
        <p>SMP Negeri 14 Tangerang &copy; 2024 | Jalan P.B. Sudirman No. 31, Kabupaten Jember. | Phone: 123-456-789 | Email: admin@smpn2jember.sch.id</p>
    </footer>

</body>

</html>