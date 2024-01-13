<?php
include 'config.php';

session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $admin_id = "admin";
    $admin_password = "admin";

    $nis = $_POST['nis'];
    $input_password = $_POST['password'];

    if ($nis === $admin_id && $input_password === $admin_password) {
        $_SESSION['admin'] = $admin_id;
        exit(header("Location: index.php"));
    } else {
        $role = $_POST['role'];
        if ($role == 'siswa') {
            $sql = "SELECT * FROM siswa WHERE nomor_induk_siswa='$nis' AND password = '$input_password'";
            $query = mysqli_query($conn, $sql);
            $siswa = mysqli_fetch_assoc($query);
            $siswa_count = mysqli_num_rows($query);

            if ($siswa_count > 0) {
                $_SESSION['siswa'] = $siswa;
                header("Location: index.php");
                exit();
            } else {
                echo '<script language="javascript"> alert("Nomor induk atau password salah!");</script>';
            }
        } else if ($role == 'pegawai') {
            $sql = "SELECT * FROM pegawai WHERE nomor_induk_pegawai='$nis' AND password = '$input_password'";
            $query = mysqli_query($conn, $sql);
            $pegawai = mysqli_fetch_assoc($query);
            $pegawai_count = mysqli_num_rows($query);

            if ($pegawai_count > 0) {
                $_SESSION['pegawai'] = $pegawai;
                header("Location: index.php");
                exit();
            } else {
                echo '<script language="javascript"> alert("Nomor induk atau password salah!");</script>';
            }
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - SMPN 14 Tangerang</title>
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

        form {
            max-width: 400px;
            margin: 20px auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        label {
            display: block;
            margin-bottom: 8px;
        }

        input {
            width: 100%;
            padding: 8px;
            margin-bottom: 15px;
            box-sizing: border-box;
        }

        input[type="radio"] {
            margin-right: 5px;
        }

        button {
            background-color: #4CAF50;
            color: white;
            padding: 10px 15px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        button:hover {
            background-color: #45a049;
        }

        .radio-group {
            display: flex;
            align-items: center;
            margin-bottom: 20px;
        }

        .radio-group label {
            margin-right: 15px;
        }

        input[type="radio"] {
            margin-right: 15px;
            width: fit-content;
        }
    </style>
</head>

<body>

    <header>
        <h1>SMP Negeri 14 Tangerang</h1>
    </header>

    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
        <label for="nis">NIS:</label>
        <input type="text" id="nis" name="nis" required>

        <label for="password">Password:</label>
        <input type="password" id="password" name="password" required>

        <label>Login as:</label>
        <div class="radio-group">
            <input type="radio" id="siswa" name="role" value="siswa" checked="">
            <label for="siswa">Siswa</label>
            <input type="radio" id="pegawai" name="role" value="pegawai">
            <label for="pegawai">Pegawai</label>
        </div>

        <button type="submit">Login</button>
    </form>

</body>

</html>