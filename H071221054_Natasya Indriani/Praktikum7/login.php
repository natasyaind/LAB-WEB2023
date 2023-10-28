<!-- form login -->
<?php

$gagallogin = "";


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

session_start();

if (isset($_POST['simpan'])) {
    $username = ($_POST['username']);
    $password = ($_POST['password']);

    $query = "SELECT * FROM users WHERE username='$username' AND password='$password'";
    $result = $conn->query($query);

    if ($result->num_rows > 0) {
        $user = $result->fetch_assoc();
        $_SESSION['user_role'] = $user['role'];
        echo $user['role'];
        if ($user['role'] == 'admin') {
            header("Location: admin.php");
        } elseif ($user['role'] == 'mahasiswa') {
            header("Location: mahasiswa.php");
        }
    } else {
        $gagallogin =  "Login gagal. Periksa username dan password Anda.";
    }
}
?>

<!DOCTYPE html>
<html>

<head>
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

    <style>
        body {
            background: url(bg1.jpg);
        }

        .mx-auto {
            width: 600px;
        }

        .card {
            margin-top: 150px;
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
                <strong>Halaman Login</strong>
            </div>
            <div class="card-body">
                <?php
                if ($gagallogin) {
                ?>
                    <div class="alert alert-danger" role="alert">
                        <?php echo $gagallogin?>
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
                    <div class="col-12">
                        <input type="submit" name="simpan" value="Login" class="btn btn-primary">
                    </div>
                </form>
            </div>

            <div class="register text-white">
                <p>Belum punya akun?
                    <a href="registrasi.php">Register Disini</a>
                </p>
            </div>
        </div>
</body>

</html>