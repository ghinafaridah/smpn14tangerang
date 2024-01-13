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


if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // ambil data dari formulir
    $nip = $_POST['nip'];
    $nama = $_POST['nama'];
    $jabatan = $_POST['jabatan'];
    $alamat = $_POST['alamat'];
    $pendidikanTerakhir = $_POST['pendidikanTerakhir'];
    $pengalamanMengajar = $_POST['pengalamanMengajar'];

    $date = date("Y-m-d H:i:s");


    // buat query

    if ($_POST['isEdit'] == "no") {
        $password = $_POST['password'];
        $sql = "INSERT INTO pegawai (nomor_induk_pegawai, nama, jabatan, alamat, pendidikan_terakhir, pengalaman_mengajar, password) VALUE ('$nip', '$nama', '$jabatan', '$alamat', '$pendidikanTerakhir', '$pengalamanMengajar', '$password')";
    } else {
        $sql = "UPDATE pegawai SET nama='$nama', jabatan='$jabatan', alamat='$alamat', pendidikan_terakhir='$pendidikanTerakhir', pengalaman_mengajar='$pengalamanMengajar', updated_date='$date' WHERE nomor_induk_pegawai=$nip";
    }

    $query = mysqli_query($conn, $sql);

    // apakah query simpan berhasil?
    if ($query) {
        // kalau berhasil alihkan ke halaman sebelumnya dengan status=success
        $status = $_POST['isEdit'] == "yes" ? "successEdit" : "success";
        header('Location: index.php?status=' . $status);
    } else {
        // kalau gagal alihkan ke halaman sebelumnya dengan status=gagal
        $status = $_POST['isEdit'] == "yes" ? "failedEdit" : "failed";
        header('Location: index.php?status=' . $status);
    }
}

$nip = isset($_GET['nip']) ? $_GET['nip'] : false;

if ($nip) {
    // buat query untuk ambil data dari database
    $sql = "SELECT * FROM pegawai WHERE nomor_induk_pegawai=$nip";
    $query = mysqli_query($conn, $sql);
    $pegawai = mysqli_fetch_assoc($query);

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
            <h2><?php echo isset($pegawai) ? 'Edit Pegawai' : 'Tambah Pegawai'; ?></h2>

            <form action="#" method="post" style="margin-bottom:100px">
                <label for="nip">NIP:</label>
                <input type="number" id="nip" name="nip" value="<?php echo isset($pegawai) ? $pegawai['nomor_induk_pegawai'] . '" readonly ' : '';  ?>" required>

                <label for="nama">Nama:</label>
                <input type="text" id="nama" name="nama" value="<?php echo isset($pegawai) ? $pegawai['nama'] : ''; ?>" required>

                <?php if (!isset($pegawai)) { ?>
                    <label for="password">Password:</label>
                    <input type="password" id="password" name="password" required>
                <?php } ?>

                <label for="jabatan">Jabatan:</label>
                <select id="jabatan" name="jabatan" required>
                    <option value="kepala sekolah" <?php echo (isset($pegawai) && $pegawai['jabatan'] === 'kepala sekolah') ? 'selected' : ''; ?>>Kepala Sekolah</option>
                    <option value="wakil kepala sekolah" <?php echo (isset($pegawai) && $pegawai['jabatan'] === 'wakil kepala sekolah') ? 'selected' : ''; ?>>Wakil Kepala Sekolah</option>
                    <option value="guru" <?php echo (isset($pegawai) && $pegawai['jabatan'] === 'guru') ? 'selected' : ''; ?>>Guru</option>
                    <option value="tenaga pendidik" <?php echo (isset($pegawai) && $pegawai['jabatan'] === 'tenaga pendidik') ? 'selected' : ''; ?>>Tenaga Pendidik</option>
                    <option value="staf" <?php echo (isset($pegawai) && $pegawai['jabatan'] === 'staf') ? 'selected' : ''; ?>>Staf</option>
                    <!-- Add more options as needed -->
                </select>

                <label for="alamat">Alamat:</label>
                <input type="text" id="alamat" name="alamat" value="<?php echo isset($pegawai) ? $pegawai['alamat'] : ''; ?>" required>

                <label for="pendidikanTerakhir">Pendidikan Terakhir:</label>
                <input type="text" id="pendidikanTerakhir" name="pendidikanTerakhir" value="<?php echo isset($pegawai) ? $pegawai['pendidikan_terakhir'] : ''; ?>" required>

                <label for="pengalamanMengajar">Pengalaman Mengajar:</label>
                <input type="text" id="pengalamanMengajar" name="pengalamanMengajar" value="<?php echo isset($pegawai) ? $pegawai['pengalaman_mengajar'] : ''; ?>" required>

                <input type="hidden" id="isEdit" name="isEdit" value="<?php echo isset($pegawai) ? 'yes' : 'no'; ?>" hidden>

                <button type="submit"><?php echo isset($pegawai) ? 'Edit Pegawai' : 'Tambah Pegawai'; ?></button>
            </form>



        </div>
    </section>



    <footer>
        <p>SMP Negeri 14 Tangerang &copy; 2024 | Jalan P.B. Sudirman No. 31, Kabupaten Jember. | Phone: 123-456-789 | Email: admin@smpn2jember.sch.id</p>
    </footer>

</body>

</html>