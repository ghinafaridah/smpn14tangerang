<?php
include 'config.php';

session_start();

// cek $session_login

if (isset($_SESSION['admin'])) {
    $session_login = "admin";
} else if (isset($_SESSION['siswa'])) {
    $session_login = "siswa";
} else if (isset($_SESSION['pegawai'])) {
    $session_login = "pegawai";
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {


    $nis = $_POST['nis'];
    $nama = $_POST['nama'];
    $alamat = $_POST['alamat'];
    $tahunMasuk = $_POST['tahunMasuk'];
    $asalSekolah = $_POST['asalSekolah'];
    $date = date("Y-m-d H:i:s");
    $password = $_POST['password'];

    // buat query
    if ($_POST['isEdit'] == "no") {
        $sql = "INSERT INTO siswa (nomor_induk_siswa, nama, alamat, tahun_masuk, asal_sekolah, password) VALUE ('$nis', '$nama', '$alamat', '$tahunMasuk', '$asalSekolah', '$password')";
    } else {
        $sql = "UPDATE siswa SET nama='$nama', alamat='$alamat', tahun_masuk='$tahunMasuk', asal_sekolah='$asalSekolah', updated_date='$date' WHERE nomor_induk_siswa=$nis";
    }
    //     var_dump($sql);
    // exit;
    $query = mysqli_query($conn, $sql);

    // is query success
    if ($query) {
        $status = $_POST['isEdit'] == "yes" ? "successEdit" : "success";
        header('Location: index.php?status=' . $status);
    } else {
        $status = $_POST['isEdit'] == "yes" ? "failedEdit" : "failed";
        header('Location: index.php?status=failed');
    }
}

$nis = isset($_GET['nis']) ? $_GET['nis'] : false;

if ($nis) {
    // buat query untuk ambil data dari database
    $sql = "SELECT * FROM siswa WHERE nomor_induk_siswa=$nis";
    $query = mysqli_query($conn, $sql);
    $siswa = mysqli_fetch_assoc($query);

    // jika data yang di-edit tidak ditemukan
    if (mysqli_num_rows($query) < 1) {
        die("data tidak ditemukan...");
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
        ?>
            <i class="fa-solid fa-right-to-bracket"></i>
            <a class="link-danger" href="logout.php">Logout</a>
        <?php
        } else {
        ?>
            <a class="link-success" href="login.php">Login</a>
        <?php
        }
        ?>

    </nav>


    <section class="body-section">
        <div id="add-siswa-form" class="content form-content">
            <h2><?php echo isset($siswa) ? "Edit Siswa" : "Tambah siswa"; ?></h2>

            <form action="#" method="post" style="margin-bottom:100px">
                <label for="nis">NIS:</label>
                <input type="number" id="nis" name="nis" value="<?php echo isset($siswa) ? $siswa['nomor_induk_siswa'] . '" readonly ' : ''; ?>" required>

                <label for="nama">Nama:</label>
                <input type="text" id="nama" name="nama" value="<?php echo isset($siswa) ? $siswa['nama'] : ''; ?>" required>


                <label for="password" <?php echo isset($siswa) ? "hidden" : ''; ?>>Password:</label>
                <input type="password" id="password" name="password" value="<?php echo isset($siswa) ? $siswa['password'] : ''; ?>" required <?php echo isset($siswa) ? "hidden" : ''; ?>>

                <label for="alamat">Alamat:</label>
                <input type="text" id="alamat" name="alamat" value="<?php echo isset($siswa) ? $siswa['alamat'] : ''; ?>" required>

                <label for="tahunMasuk">Tahun Masuk:</label>
                <input type="number" id="tahunMasuk" name="tahunMasuk" value="<?php echo isset($siswa) ? $siswa['tahun_masuk'] : ''; ?>" required>

                <label for="asalSekolah">Asal Sekolah:</label>
                <input type="text" id="asalSekolah" name="asalSekolah" value="<?php echo isset($siswa) ? $siswa['asal_sekolah'] : ''; ?>" required>

                <input type="text" id="isEdit" name="isEdit" value="<?php echo isset($siswa) ? "yes" : "no"; ?>" hidden>

                <button type="submit"><?php echo isset($siswa) ? "Edit Siswa" : "Tambah siswa"; ?></button>
            </form>


        </div>
    </section>



    <footer>
        <p>SMP Negeri 14 Tangerang &copy; 2024 | Jalan P.B. Sudirman No. 31, Kabupaten Jember. | Phone: 123-456-789 | Email: admin@smpn2jember.sch.id</p>
    </footer>

</body>

</html>