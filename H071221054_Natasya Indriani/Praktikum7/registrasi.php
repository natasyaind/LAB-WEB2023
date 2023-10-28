<!-- form registrasi -->
<?php
$regisberhasil = "";
$regisgagal = "";
$regis_terdaftar = "";

$servername = "localhost";
$username = "root";
$password = "";
$database = "db_praktikum7";

$conn = new mysqli($servername, $username, $password, $database);
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
} // else {
//     // echo "koneksi berhasil";
// }

if (isset($_POST['simpan'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $role = $_POST['role'];

    // Periksa apakah username sudah terdaftar
    $check_query = "SELECT * FROM users WHERE username='$username'";
    $check_result = $conn->query($check_query);

    $query = "INSERT INTO users (username, password, role) VALUES ('$username', '$password', '$role')";

    if ($check_result->num_rows > 0) {
        $regis_terdaftar = "Registrasi gagal. Username sudah terdaftar. Silakan gunakan username lain.";
    } else {
        // Jika username belum terdaftar, lakukan registrasi
        $query = "INSERT INTO users (username, password, role) VALUES ('$username', '$password', '$role')";

        if ($conn->query($query) === TRUE) {
            $regisberhasil = "Registrasi berhasil.";
        } else {
            $regisgagal = "Registrasi gagal. Coba lagi.";
        }
    }
}
?>
<!DOCTYPE html>
<html>

<head>
    <title>Registrasi</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

    <style>
        body {
            background: url(bg1.jpg);
        }

        .mx-auto {
            width: 600px;
        }

        .card {
            margin-top: 130px;
            height: auto;
        }

        .register p {
            margin-left: 20px;
        }

        .register a:hover {
            text-decoration: underline;
        }

        .form-control {
            border-color: white;
            border-radius: 20px;
        }
    </style>
</head>

<body>
    <div class="mx-auto">
        <div class="card bg-transparent">
            <div class="card-header bg-gradient text-white">
                <strong>Halaman Registrasi</strong>
            </div>
            <div class="card-body">
                <?php
                if ($regisgagal) {
                ?>
                    <div class="alert alert-danger" role="alert">
                        <?php echo $regisgagal ?>
                    </div>
                <?php
                }
                ?>

                <?php
                if ($regisberhasil) {
                ?>
                    <div class="alert alert-success" role="alert">
                        <?php echo $regisberhasil ?>
                    </div>
                <?php
                }
                ?>
                
                <?php
                if ($regis_terdaftar) {
                ?>
                    <div class="alert alert-warning" role="alert">
                        <?php echo $regis_terdaftar ?>
                    </div>
                <?php
                }
                ?>
                <form method="post">
                    <div class="mb-3 text-white">
                        <label for="username" class="form-label" required>Username</label>
                        <input type="text" class="form-control bg-transparent text-white" id="username" name="username">
                    </div>
                    <div class="mb-3 text-white">
                        <label for="password" class="form-label" required>Password</label>
                        <input type="password" class="form-control bg-transparent text-white" id="password" name="password">
                    </div>
                    <div class="mb-3 text-white">
                        <select class="form-control bg-transparent text-white" id="role" name="role">
                            <option value="">-- Pilih Role --</option>
                            <option value="Admin"  class="text-black">Admin</option>
                            <option value="Mahasiswa" class="text-black">Mahasiswa</option>
                        </select>
                    </div>
                    <div class="col-12">
                        <input type="submit" name="simpan" value="Registrasi" class="btn btn-primary">
                    </div>
                </form>
            </div>

            <div class="register text-white">
                <p>Sudah punya akun?
                    <a href="login.php">Login Disini</a>
                </p>
            </div>
        </div>
</body>

</html>