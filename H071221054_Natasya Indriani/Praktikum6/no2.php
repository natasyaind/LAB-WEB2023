<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>No 2</title>

</head>
<body>
    <h1>Form</h1>

    <form method="POST" action="no2.php">
        <label for="nama">Nama Lengkap :</label>
        <input type="text" name="nama" required><br><br>
        
        <label for="usia">Usia :</label>
        <input type="number" name="usia" required><br><br>
        
        <label for="email">Email :</label>
        <input type="email" name="email" required><br><br>
        
        <label for="tgl_lahir">Tanggal Lahir :</label>
        <input type="date" name="tgl_lahir" required><br><br>
        
        <label>Jenis Kelamin :</label>
        <input type="radio" name="jenis_kelamin" value="Laki-laki" >Laki-laki
        <input type="radio" name="jenis_kelamin" value="Perempuan" >Perempuan<br><br>
        
        <label for="bahasa">Bahasa yang dikuasai :</label>
        <input type="checkbox" name="bahasa[]" value="Java">Java
        <input type="checkbox" name="bahasa[]" value="Python">Python
        <input type="checkbox" name="bahasa[]" value="HTML">HTML
        <input type="checkbox" name="bahasa[]" value="CSS">CSS
        <input type="checkbox" name="bahasa[]" value="PHP">PHP<br><br>
        
        <input type="submit" value="Submit">
    </form>
    

    <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $nama = $_POST["nama"];
            $usia = $_POST["usia"];
            $email = $_POST["email"];
            $tgl_lahir = $_POST["tgl_lahir"];
            $jenis_kelamin = $_POST["jenis_kelamin"];
            
   
            // Mengonversi tanggal lahir ke format yang diinginkan
            $tanggal_lahir = date('d F Y', strtotime($tgl_lahir));
            
            if (isset($_POST["bahasa"]) && !empty($_POST["bahasa"])) {
                $bahasa = $_POST["bahasa"];
                $bahasa_str = implode(", ", $bahasa);  // untuk mengubah array jadi string (fungsi implode)
                $perkenalan = "Halo! Perkenalkan nama saya $nama. Saya berumur $usia tahun. Saya lahir pada tanggal $tanggal_lahir. Saya berjenis kelamin $jenis_kelamin. Saat ini saya menguasai bahasa pemrograman $bahasa_str";
            } else {
                $perkenalan = "Halo! Perkenalkan nama saya $nama. Saya berumur $usia tahun. Saya lahir pada tanggal $tanggal_lahir. Saya berjenis kelamin $jenis_kelamin. Saat ini saya belum menguasai bahasa pemrograman apapun.";
            }
        
            echo "<pre>$perkenalan</pre>";
        }  
    ?>
        
</body>
</html>