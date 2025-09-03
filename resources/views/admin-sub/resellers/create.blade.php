<!doctype html>
<html lang="id">
<head>
  <meta charset="utf-8">
  <title>Tambah Reseller</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 min-h-screen">

    <!-- Sidebar sesuai role -->
  @if(Auth::user()->level === 'administrator')
    @include('layouts.subadminbar')
  @elseif(Auth::user()->level === 'keuangan')
    @include('layouts.keuanganbar')
  @elseif(Auth::user()->level === 'operator')
    @include('layouts.operatorbar')
  @elseif(Auth::user()->level === 'teknisi')
    @include('layouts.teknisibar')
  @endif

<div class="p-6 sm:ml-64">
  <h3 class="text-2xl font-semibold mb-6"><i class="fas fa-user-plus"></i> Tambah Reseller</h3>

  <form class="grid grid-cols-1 md:grid-cols-2 gap-6" action="{{ route('resellers.store') }}" method="POST">
    @csrf
    <input type="hidden" name="level" value="11">

    <!-- Data Reseller -->
    <div class="bg-white p-4 rounded shadow">
      <h5 class="text-lg font-semibold mb-3">Data Reseller</h5>

      <div class="mb-3">
        <label class="block font-medium mb-1">Nama Lengkap</label>
        <input type="text" name="nama_lengkap" class="w-full border rounded px-3 py-2" required>
      </div>
      <div class="mb-3">
        <label class="block font-medium mb-1">No. Identitas</label>
        <input type="text" name="no_identitas" class="w-full border rounded px-3 py-2" required>
      </div>
      <div class="mb-3">
        <label class="block font-medium mb-1">Telepon</label>
        <input type="text" name="telepon" class="w-full border rounded px-3 py-2" required>
      </div>
      <div class="mb-3">
        <label class="block font-medium mb-1">Alamat Lengkap</label>
        <textarea name="alamat" class="w-full border rounded px-3 py-2" rows="3" required></textarea>
      </div>
      <div class="mb-3">
        <label class="block font-medium mb-1">Username Login</label>
        <input type="text" name="username" class="w-full border rounded px-3 py-2" required>
      </div>
      <div class="mb-3">
        <label class="block font-medium mb-1">Password Login</label>
        <input type="text" name="password" class="w-full border rounded px-3 py-2" value="0123456">
      </div>
      <div class="mb-3">
        <label class="block font-medium mb-1">Tanggal Bergabung</label>
        <input type="date" name="tgl_bergabung" class="w-full border rounded px-3 py-2" required>
      </div>
      <div class="mb-3">
        <label class="block font-medium mb-1">Limit Hutang</label>
        <input type="number" name="limit_hutang" class="w-full border rounded px-3 py-2" value="0">
      </div>
      <div class="mb-3">
        <label class="block font-medium mb-1">Kode Unik</label>
        <input type="number" name="kode_unik" class="w-full border rounded px-3 py-2" value="0" min="0" max="9999">
      </div>
    </div>

    <!-- Hak Akses -->
    <div class="bg-white p-4 rounded shadow">
      <h5 class="text-lg font-semibold mb-3">Hak Akses</h5>

      <div class="mb-4">
        <label class="font-medium block mb-1">Router</label>
        <label class="inline-flex items-center"><input type="checkbox" name="hak_akses_router[]" value="ALL" checked class="mr-2"> Semua Router</label><br>
        <label class="inline-flex items-center"><input type="checkbox" name="hak_akses_router[]" value="NONE" class="mr-2"> Tidak Ada</label><br>
        <label class="inline-flex items-center"><input type="checkbox" name="hak_akses_router[]" value="1" class="mr-2"> SERVER BNC</label>
      </div>

      <div class="mb-4">
        <label class="font-medium block mb-1">Server</label>
        <label class="inline-flex items-center"><input type="checkbox" name="hak_akses_server[]" value="ALL" checked class="mr-2"> Semua Server</label><br>
        <label class="inline-flex items-center"><input type="checkbox" name="hak_akses_server[]" value="NONE" class="mr-2"> Tidak Ada</label><br>
        <label class="inline-flex items-center"><input type="checkbox" name="hak_akses_server[]" value="1" class="mr-2"> hotspot1</label><br>
        <label class="inline-flex items-center"><input type="checkbox" name="hak_akses_server[]" value="2" class="mr-2"> server1</label>
      </div>

      <div class="mb-4">
        <label class="font-medium block mb-1">Profile</label>
        <label class="inline-flex items-center"><input type="checkbox" name="hak_akses_profile[]" value="ALL" checked class="mr-2"> Semua Profile</label><br>
        <label class="inline-flex items-center"><input type="checkbox" name="hak_akses_profile[]" value="NONE" class="mr-2"> Tidak Ada</label><br>
        <b>Profile Langganan</b><br>
        <label class="inline-flex items-center"><input type="checkbox" name="hak_akses_profile[]" value="2" class="mr-2"> 10Mbps</label><br>
        <b>Profile Voucher</b><br>
        <label class="inline-flex items-center"><input type="checkbox" name="hak_akses_profile[]" value="1" class="mr-2"> YYYYY</label><br>
        <label class="inline-flex items-center"><input type="checkbox" name="hak_akses_profile[]" value="3" class="mr-2"> vc1</label>
      </div>

    </div>

    <!-- Tombol -->
    <div class="col-span-1 md:col-span-2 flex gap-2 mt-4">
      <a href="/user/mitra" class="bg-gray-500 hover:bg-gray-600 text-white px-4 py-2 rounded">Kembali</a>
      <button type="reset" class="bg-yellow-400 hover:bg-yellow-500 text-white px-4 py-2 rounded">Reset</button>
      <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded">Simpan</button>
    </div>

  </form>
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/js/all.min.js"></script>
</body>
</html>
