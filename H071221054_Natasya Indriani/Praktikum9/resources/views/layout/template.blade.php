<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Data Mahasiswa</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Lato&family=Poppins:wght@200;300&display=swap');
        * {
            font-family: 'Poppins', 'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana, sans-serif
        }
      </style>
</head>
<body style="background-color: #ffffff">
    <!-- Menggunakan navbar yang telah di-include dari file 'navbar.blade.php' -->
    @include('mahasiswa.partials.navbar')
    <main class="container">
        <!-- Menggunakan komponen pesan yang telah di-include -->
        @include('komponen.pesan')
        <!-- Menyediakan yield untuk konten halaman -->
        @yield('konten')
    </main>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous"></script>
    <script src="https://kit.fontawesome.com/eef377116d.js" crossorigin="anonymous"></script>
</body>
</html>
