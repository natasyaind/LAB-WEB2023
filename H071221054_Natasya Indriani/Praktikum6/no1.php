<?php
$data = [
    [
        "nama_barang" => "HP",
        "harga" => 3000000,
        "stok" => 10,
        "jenis" => "Elektronik"
    ],
    [
        "nama_barang" => "Jeruk",
        "harga" => 5000,
        "stok" => 20,
        "jenis" => "Buah"
    ],
    [
        "nama_barang" => "Kemeja",
        "harga" => 5000,
        "stok" => 9,
        "jenis" => "Pakaian"
    ],
    [
        "nama_barang" => "Apel",
        "harga" => 5000,
        "stok" => 5,
        "jenis" => "Buah"
    ],
    [
        "nama_barang" => "Celana",
        "harga" => 5000,
        "stok" => 10,
        "jenis" => "Pakaian"
    ],
    [
        "nama_barang" => "Laptop",
        "harga" => 50000,
        "stok" => 30,
        "jenis" => "Elektronik"
    ],
    [
        "nama_barang" => "Semangka",
        "harga" => 5000,
        "stok" => 2,
        "jenis" => "Buah"
    ],
    [
        "nama_barang" => "Kaos",
        "harga" => 5000,
        "stok" => 1,
        "jenis" => "Pakaian"
    ],
    [
        "nama_barang" => "VGA",
        "harga" => 2000000,
        "stok" => 0,
        "jenis" => "Elektronik"
    ]
];
    ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>No 1</title>
    <style>
        table, th, td {
            border: 1px solid black;
        }
    </style>
</head>
<body>
    <form action="no1.php">
        <input type="text" placeholder="Masukkan Tipe" name="tipe">
        <button type="submit">Submit</button>
    </form>


    <table>
        <?php
        if ($_GET) {
            echo "<tr>"; // baris pertama dalam tabel
            foreach ($data[0] as $key => $value) {  // untuk mengambil judul kolom dari elemen pertama dari array
                echo "<th>". $key . "</th>";        // dan dicetak dalam tabel header
            }
            echo "</tr>";  // untuk cetak baris baru dalam html
            for ($i = 0; $i < sizeof($data); $i++) {  // perulangan untuk mengakses setiap elemen dalam array $data
                echo "<tr>";
                if (strtolower($_GET["tipe"]) == strtolower($data[$i]['jenis'])) {
                    foreach ($data[$i] as $key => $value) {
                        echo "<td>" . $value . "</td>";
                    }
                }
            echo "</tr>";
            }
        }
        ?>
    </table>
</body>
</html>