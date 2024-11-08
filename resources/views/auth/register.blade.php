<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Registrasi Pengguna Baru</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{ asset('style/plugins/fontawesome-free/css/all.min.css')}}">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="{{ asset('style/plugins/icheck-bootstrap/icheck-bootstrap.min.css')}}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{ asset('style/dist/css/adminlte.min.css')}}">
</head>
<body class="hold-transition register-page">
<div class="register-box">
  <div class="card card-outline card-primary">
    <div class="card-header text-center">
      <a href="../../index2.html" class="h1">
        <img src="{{ asset('style/dist/img/laravel_logo.jpg') }}" alt="Chis Logo" style="width: 300px; height: 200px;"/>
    </a>
    </div>
    <div class="card-body">
      <p class="login-box-msg">Daftar Pengguna Baru</p>

      <form action="{{ route('register') }}" method="post">
        @csrf
        <div class="input-group mb-3">
            <input type="text" class="form-control" name="name" placeholder="Nama Lengkap">
            <div class="input-group-append">
                <div class="input-group-text">
                <span class="fas fa-bars"></span>
                </div>
            </div>
        </div>
        <div class="input-group mb-3">
          <input type="text" class="form-control" name="alamat" placeholder="Alamat">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-address-card"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
            <input type="text" class="form-control" name="kelurahan" placeholder="Kelurahan">
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-solid fa-phone"></span>
              </div>
            </div>
          </div>
          <div class="input-group mb-3">
            <input type="text" class="form-control" name="kecamatan" placeholder="Kecamatan">
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-id-card"></span>
              </div>
            </div>
          </div>
          <div class="input-group mb-3">
            <input type="text" class="form-control" name="kab_kota" placeholder="Kabupaten/Kota">
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-id-card"></span>
              </div>
            </div>
          </div>
          <div class="input-group mb-3">
            <select class="form-control" name="provinsi" placeholder="Provinsi">
                <option value="Aceh">Aceh</option>
                <option value="Bali">Bali</option>
                <option value="Banten">Banten</option>
                <option value="Bengkulu">Bengkulu</option>
                <option value="Daerah Istimewa Yogyakarta">Daerah Istimewa Yogyakarta</option>
                <option value="DKI Jakarta">DKI Jakarta</option>
                <option value="Gorontalo">Gorontalo</option>
                <option value="Jambi">Jambi</option>
                <option value="Jawa Barat">Jawa Barat</option>
                <option value="Jawa Tengah">Jawa Tengah</option>
                <option value="Jawa Timur">Jawa Timur</option>
                <option value="Kalimantan Barat">Kalimantan Barat</option>
                <option value="Kalimantan Tengah">Kalimantan Tengah</option>
                <option value="Kalimantan Timur">Kalimantan Timur</option>
                <option value="Kalimantan Selatan">Kalimantan Selatan</option>
                <option value="Kalimantan Utara">Kalimantan Utara</option>
                <option value="Kepulauan Bangka Belitung">Kepulauan Bangka Belitung</option>
                <option value="Kepulauan Riau">Kepulauan Riau</option>
                <option value="Lampung">Lampung</option>
                <option value="Maluku">Maluku</option>
                <option value="Maluku Tengah">Maluku Tengah</option>
                <option value="Nusa Tenggara Barat">Nusa Tenggara Barat</option>
                <option value="Nusa Tenggara Timur">Nusa Tenggara Timur</option>
                <option value="Papua">Papua</option>
                <option value="Papua Barat">Papua Barat</option>
                <option value="Papua Pegunungan">Papua Pegunungan</option>
                <option value="Papua Selatan">Papua Selatan</option>
                <option value="Papua Selatan">Papua Selatan</option>
                <option value="Papua Tengah">Kalimantan Tengah</option>
                <option value="Riau">Riau</option>
                <option value="Sulawesi Barat">Sulawesi Barat</option>
                <option value="Sulawesi Selatan">Sulawesi Selatan</option>
                <option value="Sulawesi Tengah">Sulawesi Tengah</option>
                <option value="Sulawesi Tenggara">Sulawesi Tenggara</option>
                <option value="Sulawesi Utara">Sulawesi Utara</option>
                <option value="Sumatera Barat">Sumatera Barat</option>
                <option value="Sumatera Selatan">Sumatera Selatan</option>
                <option value="Sumatera Utara">Sumatera Utara</option>
            </select>
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-lock"></span>
              </div>
            </div>
          </div>
          <div class="input-group mb-3">
            <input type="text" class="form-control" name="kode_pos" placeholder="Kode Pos">
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-solid fa-phone"></span>
              </div>
            </div>
          </div>
          <div class="input-group mb-3">
            <input type="email" class="form-control" name="email" placeholder="Email">
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-envelope"></span>
              </div>
            </div>
          </div>
        <div class="input-group mb-3">
          <input type="password" class="form-control" name="password" placeholder="Password">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
            <label class="form-control">Jenis Pengguna</label>
            <select class="form-control" name="status" placeholder="Pilih Jenis Pengguna">
                <option value="Admin">Admin</option>
                <option value="Customer">Customer</option>
            </select>
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-lock"></span>
              </div>
            </div>
          </div>
          <div id="phoneField" class="input-group mb-3" style="display: none;">
            <input type="text" class="form-control" name="no_telp" placeholder="Nomor Telepon">
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-phone"></span>
              </div>
            </div>
          </div>
          <div class="input-group mb-3">
            <div id="birthdateField" class="input-group mb-3" style="display: none;">
              <input type="date" class="form-control" name="tgl_lahir" placeholder="Tanggal Lahir">
              <div class="input-group-append">
                <div class="input-group-text">
                  <span class="fas fa-calendar"></span>
                </div>
              </div>
            </div>
          </div>
        <div class="row">
          <div class="col-8">
            <div class="icheck-primary">
              <input type="checkbox" id="agreeTerms" name="terms" value="agree">
              <label for="agreeTerms">
               I agree to the <a href="agreeTerms">terms</a>
              </label>
            </div>
          </div>
          <!-- /.col -->
          <div class="col-4">
            <button type="submit" class="btn btn-primary btn-block">Daftar</button>
          </div>
          <!-- /.col -->
        </div>
      </form>

      <a href="{{ route('login')}}" class="text-center">Sudah memiliki akun? Login disini yuk!</a>
    </div>
    <!-- /.form-box -->
  </div><!-- /.card -->
</div>
<!-- /.register-box -->

<!-- jQuery -->
<script src="{{ asset('style/plugins/jquery/jquery.min.js')}}"></script>
<!-- Bootstrap 4 -->
<script src="{{ asset('style/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<!-- AdminLTE App -->
<script src="{{ asset('style/dist/js/adminlte.min.js')}}"></script>
<script>
  // JavaScript to show/hide fields based on user selection
  document.getElementById('statusSelect').addEventListener('change', function() {
    var selectedValue = this.value;
    var phoneField = document.getElementById('phoneField');
    var birthdateField = document.getElementById('birthdateField');
    
    if (selectedValue == 'Customer') {
      phoneField.style.display = 'block';
      birthdateField.style.display = 'block';
    } else {
      phoneField.style.display = 'none';
      birthdateField.style.display = 'none';
    }
  });
</script>
</body>
</html>
