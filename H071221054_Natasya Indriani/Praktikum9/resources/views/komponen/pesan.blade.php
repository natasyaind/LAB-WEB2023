
@if (Session::has('success'))
    <div class="pt-1" id="success">
        <div class="alert alert-success">
            {{ Session::get('success') }}
        </div>
    </div>
@endif

@if ($errors->any())
<div class="pt-1" id="error">
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $item)
                <li>{{ $item }}</li>
            @endforeach
        </ul>
    </div>
</div>    
@endif

<script>
    // Tampilkan pesan sukses
    var successMessage = document.getElementById('success');
    if (successMessage) {
        successMessage.style.display = 'block';

        // Sembunyikan pesan sukses setelah 2 detik
        setTimeout(function() {
            successMessage.style.display = 'none';
        }, 2000); // 2000 milidetik = 2 detik
    }

    // Tampilkan pesan kesalahan
    var errorMessage = document.getElementById('error');
    if (errorMessage) {
        errorMessage.style.display = 'block';

        // Sembunyikan pesan kesalahan setelah 2 detik
        setTimeout(function() {
            errorMessage.style.display = 'none';
        }, 2000); // 2000 milidetik = 2 detik
    }
</script>