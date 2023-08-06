<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Document</title>
</head>
<body>

<h1>Pilih Provinsi dan Kota</h1>


  <form method="POST" action="{{ route('daftar') }}">
    @csrf
    <label for="provinsi">Pilih Provinsi:</label>
    <select id="provinsi" name="provinsi_id">
        <option value="">Pilih Provinsi</option>
        @foreach ($data as $provinsi)
            <option value="{{ $provinsi['id'] }}">{{ $provinsi['name'] }}</option>
        @endforeach
    </select>

    <label for="kota">Pilih Kota:</label>
    <select id="kota" name="kota_id">
        <option value="">Pilih Provinsi terlebih dahulu</option>
    </select>

    <label for="kecamatan">Pilih Kecamatan:</label>
    <select id="kecamatan" name="kecamatan_id">
        <option value="">Pilih Kota terlebih dahulu</option>
    </select>

    <label for="kelurahan">Pilih Kelurahan:</label>
    <select id="kelurahan" name="kelurahan_id">
        <option value="">Pilih Kecamatan terlebih dahulu</option>
    </select>

    <button type="submit">Daftar</button>
  </form>

<script>
    // Event listener untuk menangani perubahan pilihan provinsi
    document.getElementById('provinsi').addEventListener('change', function() {
        var provinsiId = this.value;
        var kotaSelect = document.getElementById('kota');
        console.log(kotaSelect);

        // Jika pengguna memilih "Pilih Provinsi", reset daftar kota
        if (!provinsiId) {
            kotaSelect.innerHTML = '<option value="">Pilih Provinsi terlebih dahulu</option>';
            return;
        }

        // Kirim permintaan ke server untuk mendapatkan daftar kota berdasarkan provinsiId
        var url = '/kota/' + provinsiId;
        fetch(url)
            .then(function(response) {
                return response.json();
            })
            .then(function(data) {
                var options = '<option value="">Pilih Kota</option>';
                data.forEach(function(kota) {
                    options += '<option value="' + kota.id + '">' + kota.name + '</option>';
                });
                kotaSelect.innerHTML = options;
            });
    });

    // Event listener untuk menangani perubahan pilihan kota
    document.getElementById('kota').addEventListener('change', function() {
    var kotaId = this.value;
    var kecamatanSelect = document.getElementById('kecamatan');
    console.log(kecamatanSelect);

    // Jika pengguna memilih "Pilih Kecamatan", reset daftar kecamatan
    if (!kotaId) {
        kecamatanSelect.innerHTML = '<option value="">Pilih Kota terlebih dahulu</option>';
        return;
    }

    // Kirim permintaan ke server untuk mendapatkan daftar kecamatan berdasarkan kotaId
    var url = '/kecamatan/' + kotaId;
    fetch(url)
        .then(function(response) {
            return response.json();
        })
        .then(function(data) {
            var options = '<option value="">Pilih Kecamatan</option>';
            data.forEach(function(kecamatan) {
                options += '<option value="' + kecamatan.id + '">' + kecamatan.name + '</option>';
            });
            kecamatanSelect.innerHTML = options;
        });
    });

    // Event listener untuk menangani perubahan pilihan kecamatan
    document.getElementById('kecamatan').addEventListener('change', function() {
    var kecamatanId = this.value;
    var kelurahanSelect = document.getElementById('kelurahan');
    console.log(kelurahanSelect);

    // Jika pengguna memilih "Pilih Kelurahan", reset daftar kelurahan
    if (!kecamatanId) {
        kelurahanSelect.innerHTML = '<option value="">Pilih Kecamatan terlebih dahulu</option>';
        return;
    }

    // Kirim permintaan ke server untuk mendapatkan daftar kelurahan berdasarkan kecamatanId
    var url = '/kelurahan/' + kecamatanId;
    fetch(url)
        .then(function(response) {
            return response.json();
        })
        .then(function(data) {
            var options = '<option value="">Pilih Kelurahan</option>';
            data.forEach(function(kelurahan) {
                options += '<option value="' + kelurahan.id + '">' + kelurahan.name + '</option>';
            });
            kelurahanSelect.innerHTML = options;
        });
    });
</script>



</body>
</html>