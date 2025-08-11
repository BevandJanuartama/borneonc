<!doctype html>
<html lang="id">
<head>
  <meta charset="utf-8">
  <title>Tambah Reseller</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

    <!-- Sidebar -->
    @include('layouts.subadminbar')

<div class="container py-4" style="margin-left: 250px;">
  <h3 class="mb-4"><i class="fas fa-user-plus"></i> Tambah Reseller</h3>

  <form class="row g-3" action="{{ route('resellers.store') }}" method="POST">
    @csrf
    <input type="hidden" name="level" value="11">

    <!-- Data Reseller -->
    <div class="col-md-6">
      <h5>Data Reseller</h5>
      <div class="mb-2">
        <label class="form-label">Nama Lengkap</label>
        <input type="text" name="nama_lengkap" class="form-control" required>
      </div>
      <div class="mb-2">
        <label class="form-label">No. Identitas</label>
        <input type="text" name="no_identitas" class="form-control" required>
      </div>
      <div class="mb-2">
        <label class="form-label">Telepon</label>
        <input type="text" name="telepon" class="form-control" required>
      </div>
      <div class="mb-2">
        <label class="form-label">Alamat Lengkap</label>
        <textarea name="alamat" class="form-control" rows="3" required></textarea>
      </div>
      <div class="mb-2">
        <label class="form-label">Username Login</label>
        <input type="text" name="username" class="form-control" required>
      </div>
      <div class="mb-2">
        <label class="form-label">Password Login</label>
        <input type="text" name="password" class="form-control" value="0123456">
      </div>
      <div class="mb-2">
        <label class="form-label">Tanggal Bergabung</label>
        <input type="date" name="tgl_bergabung" class="form-control" required>
      </div>
      <div class="mb-2">
        <label class="form-label">Limit Hutang</label>
        <input type="number" name="limit_hutang" class="form-control" value="0">
      </div>
      <div class="mb-2">
        <label class="form-label">Kode Unik</label>
        <input type="number" name="kode_unik" class="form-control" value="0" min="0" max="9999">
      </div>
    </div>

    <!-- Hak Akses -->
    <div class="col-md-6">
      <h5>Hak Akses</h5>
      <div class="mb-3">
        <label class="fw-bold">Router</label><br>
        <input type="checkbox" name="hak_akses_router[]" value="ALL" checked> Semua Router<br>
        <input type="checkbox" name="hak_akses_router[]" value="NONE"> Tidak Ada<br>
        <input type="checkbox" name="hak_akses_router[]" value="1"> SERVER BNC
      </div>
      <div class="mb-3">
        <label class="fw-bold">Server</label><br>
        <input type="checkbox" name="hak_akses_server[]" value="ALL" checked> Semua Server<br>
        <input type="checkbox" name="hak_akses_server[]" value="NONE"> Tidak Ada<br>
        <input type="checkbox" name="hak_akses_server[]" value="1"> hotspot1<br>
        <input type="checkbox" name="hak_akses_server[]" value="2"> server1
      </div>
      <div class="mb-3">
        <label class="fw-bold">Profile</label><br>
        <input type="checkbox" name="hak_akses_profile[]" value="ALL" checked> Semua Profile<br>
        <input type="checkbox" name="hak_akses_profile[]" value="NONE"> Tidak Ada<br>
        <b>Profile Langganan</b><br>
        <input type="checkbox" name="hak_akses_profile[]" value="2"> 10Mbps<br>
        <b>Profile Voucher</b><br>
        <input type="checkbox" name="hak_akses_profile[]" value="1"> YYYYY<br>
        <input type="checkbox" name="hak_akses_profile[]" value="3"> vc1
      </div>
    </div>

    <!-- Tombol -->
    <div class="col-12">
      <a href="/user/mitra" class="btn btn-secondary">Kembali</a>
      <button type="reset" class="btn btn-warning">Reset</button>
      <button type="submit" class="btn btn-primary">Simpan</button>
    </div>
  </form>
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/js/all.min.js"></script>
</body>
</html>
