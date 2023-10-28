<?php
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

$id = null;
$nama = "";
$nim = "";
$prodi = "";
$sukses = "";
$gagal = "";

if ($_SESSION['user_role']) {

} else {
    header("Location: login.php");
}


// untuk create atau edit
if (isset($_POST['simpan'])) {
    $id = isset($_GET['id']) ? $_GET['id'] : null; // Ambil id dari URL jika ada
    $nama = $_POST['nama'];
    $nim = $_POST['nim'];
    $prodi = $_POST['prodi'];

    if ($nama && $nim && $prodi) {
        // Proses input data ke database (insert data atau edit data)
        if ($id) {
            // Ini adalah operasi edit, proses update data ke database
            $sql1 = "UPDATE mahasiswa SET nim = '$nim', nama = '$nama', prodi = '$prodi' where id = '$id'";
            $q1 = mysqli_query($conn, $sql1);
            if ($q1) {
                $sukses = "Data berhasil diupdate.";
            } else {
                $gagal = "Data gagal diupdate.";
            }
        } else {
            // Ini adalah operasi insert (tambah data)
            // dicek kalo NIM sudah ada dalam database ato blm
            $check_query = "SELECT * FROM mahasiswa WHERE nim='$nim'";
            $check_result = mysqli_query($conn, $check_query);
            if (mysqli_num_rows($check_result) > 0) {
                $gagal = "NIM sudah terdaftar.";
            } else {
                // Proses input data ke database
                $query = "INSERT INTO mahasiswa (nama, nim, prodi) VALUES ('$nama', '$nim', '$prodi')";
                $q1 = mysqli_query($conn, $query);
                if ($q1) {
                    $sukses = "Data berhasil disimpan.";
                } else {
                    $gagal = "Data gagal disimpan.";
                }
            }
        }
    } else {
        $gagal = "Silahkan Masukkan Semua Data! (Data tidak boleh kosong)";
    }
}


// untuk edit
if (isset($_GET['op'])) {
    $op = $_GET['op'];
} else {
    $op = "";
}

if ($op == 'edit') {
    $id = $_GET["id"];
    $sql1 = "SELECT * FROM mahasiswa where id = '$id'";
    $q1 = mysqli_query($conn, $sql1);
    $r1 = mysqli_fetch_array($q1);
    $nama = $r1['nama'];
    $nim = $r1['nim'];
    $prodi = $r1['prodi'];

    if ($nim == '') {
        $gagal = "Data Tidak Ditemukan!";
    }
}

if ($op == 'delete') {
    $id = $_GET['id'];
    $sql1 = "DELETE FROM mahasiswa where id = '$id'";
    $q1 = mysqli_query($conn, $sql1);

    if ($q1) {
        $sukses = "Berhasil Menghapus Data";
    } else {
        $gagal = "Gagal Melakukan Delete Data";
    }
}

// fitur logout
if (isset($_GET['op']) && $_GET['op'] == 'logout') {
    session_start();
    session_unset(); // untuk hapus semua variabel sesi
    session_destroy(); // untuk hancurkan sesi
    header("Location: login.php"); // trs diarahkan mi ke halaman login
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Mahasiswa</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

    <style>
        body {
            background: url(bg3.jpg);
        }

        .mx-auto {
            width: 700px;
        }

        .card {
            margin-top: 20px;
        }

        .register p {
            margin-left: 20px;
        }

        .register a:hover {
            text-decoration: underline;
        }

        .table {
            text-align: center;
        }

        .btn-logout {
            margin: 30px auto;
            text-align: center;
        }
    </style>

</head>

<body>
    <div class="mx-auto">
        <div class="card">
            <div class="card-header bg-dark text-white">
                <strong>Data Anda</strong>
            </div>
            <div class="card-body bg-dark bg-opacity-10">
                <?php
                if ($gagal) {
                ?>
                    <div class="alert alert-danger" role="alert">
                        <?php echo $gagal ?>
                    </div>
                <?php
                    header("refresh:3;url=admin.php"); //2 detik
                }
                ?>
                <?php
                if ($sukses) {
                ?>
                    <div class="alert alert-success" role="alert">
                        <?php echo $sukses ?>
                    </div>
                <?php
                    header("refresh:3;url=admin.php"); //2 detik
                }
                ?>
                <form action="" method="post">
                    <div class="mb-3">
                        <label for="nama" class="form-label" required>Nama</label>
                        <input type="text" class="form-control" id="nama" name="nama" value="<?php echo $nama ?>">
                    </div>
                    <div class="mb-3">
                        <label for="nim" class="form-label" required>NIM</label>
                        <input type="text" class="form-control" id="nim" name="nim" value="<?php echo $nim ?>">
                    </div>
                    <div class="mb-3">
                        <label for="prodi" class="form-label" required>Prodi</label>
                        <input type="text" class="form-control" id="prodi" name="prodi" value="<?php echo $prodi ?>">
                    </div>
                    <div class="col-12">
                        <input type="submit" name="simpan" value="Submit Data" class="btn btn-primary">
                    </div>
                </form>
            </div>
        </div>

        <!-- untuk menampilkan data -->
        <div class="card bg-dark bg-opacity-50">
            <div class="card-header bg-dark text-white">
                <strong>Data Mahasiswa</strong>
            </div>
            <div class="card-body">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col" class="bg-dark bg-opacity-50 text-white">No</th>
                            <th scope="col" class="bg-dark bg-opacity-50 text-white">Nama</th>
                            <th scope="col" class="bg-dark bg-opacity-50 text-white">NIM</th>
                            <th scope="col" class="bg-dark bg-opacity-50 text-white">Prodi</th>
                            <th scope="col" class="bg-dark bg-opacity-50 text-white">Aksi</th>
                        </tr>
                    <tbody>
                        <?php
                        $sql2 = "SELECT * FROM mahasiswa order by id";
                        $q2 = mysqli_query($conn, $sql2);
                        $urut = 1;

                        while ($r2 = mysqli_fetch_array($q2)) {
                            $id = $r2["id"];
                            $nama = $r2["nama"];
                            $nim = $r2["nim"];
                            $prodi = $r2["prodi"];

                        ?>
                            <tr>
                                <th scope="row" class="bg-dark bg-opacity-50 text-white"><?php echo $urut++ ?></th>
                                <td scope="row" class="bg-dark bg-opacity-50 text-white"><?php echo $nama ?></td>
                                <td scope="row" class="bg-dark bg-opacity-50 text-white"><?php echo $nim ?></td>
                                <td scope="row" class="bg-dark bg-opacity-50 text-white"><?php echo $prodi ?></td>
                                <td scope="row" class="bg-dark bg-opacity-50 text-white">
                                    <a href="admin.php?op=edit&id=<?php echo $id ?>"><button type="button" class="btn btn-warning">Edit</button></a>
                                    <a href="admin.php?op=delete&id=<?php echo $id ?>" onclick="return confirm('Anda yakin mau delete data ini?')"><button type="button" class="btn btn-danger">Delete</button></a>
                                </td>
                            </tr>
                        <?php
                        }
                        ?>
                    </tbody>
                    </thead>
                </table>
            </div>
        </div>
        <div class="btn-logout">
            <a href="admin.php?op=logout" onclick="return confirm('Anda yakin mau keluar?')"><button type="button" class="btn btn-danger">Logout</button></a>
        </div>
</body>

</html>