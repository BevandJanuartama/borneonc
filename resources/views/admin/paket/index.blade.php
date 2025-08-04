<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>CRUD Paket - BNC CLOUD MANAGER</title>

  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" crossorigin="anonymous" referrerpolicy="no-referrer" />

  <!-- Tailwind CSS CDN -->
  <script src="https://cdn.tailwindcss.com"></script>

  <style>
    .sidebar-gradient {
      background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
    }
    .menu-item {
      transition: all 0.3s ease;
    }
    .menu-item:hover {
      background: rgba(255, 255, 255, 0.1);
      transform: translateX(5px);
    }
    .action-icon {
      @apply text-white px-3 py-1 rounded hover:opacity-80;
    }
  </style>
</head>
<body class="bg-gray-50 flex min-h-screen">

  <!-- Sidebar -->
  @include('layouts.adminbar')

  <!-- Harga Section -->
<section id="harga" class="py-20 pl-72 w-full">
  <div class="container mx-auto px-4">
    <header class="text-center mb-14 border-b pb-6 border-indigo-200">
      <h2 class="text-4xl font-bold text-gray-800">Halaman CRUD Paket Admin</h2>
    </header>

    <!-- Tombol Tambah Paket -->
    <div class="text-right mb-6">
      <a href="{{ route('paket.create') }}"
         class="inline-block bg-indigo-600 text-white px-6 py-2 rounded-lg shadow hover:bg-indigo-700 transition">
        <i class="fa fa-plus mr-2"></i>Tambah Paket
      </a>
    </div>

    <!-- Tabel Daftar Paket -->
<div class="overflow-x-auto">
  <div class="border-2 border-indigo-300 rounded-lg">
    <table class="min-w-full bg-white rounded-lg overflow-hidden border-collapse">
      <thead class="bg-indigo-600 text-white">
        <tr>
          <th class="py-3 px-6 text-text-center border">No</th>
          <th class="py-3 px-6 text-text-center border">Nama</th>
          <th class="py-3 px-6 text-text-center border">Harga Bulanan</th>
          <th class="py-3 px-6 text-text-center border">Harga Tahunan</th>
          <th class="py-3 px-6 text-center border">Mikrotik</th>
          <th class="py-3 px-6 text-center border">Aksi</th>
        </tr>
      </thead>
      <tbody>
        @forelse ($pakets as $index => $paket)
          <tr class="border-b hover:bg-gray-100 text-center">
            <td class="py-3 px-6 border">{{ $index + 1 }}</td>
            <td class="py-3 px-6 text-left border">{{ $paket->nama }}</td>
            <td class="py-3 px-6 text-left border">Rp {{ number_format((float) $paket->harga_bulanan, 0, ',', '.') }}</td>
            <td class="py-3 px-6 text-left border">Rp {{ number_format((float) $paket->harga_tahunan, 0, ',', '.') }}</td>
            <td class="py-3 px-6 text-center border">{{ $paket->mikrotik }}</td>
            <td class="py-3 px-6 text-center border">
              <div class="flex items-center justify-center space-x-2">
                <!-- Edit -->
                <a href="{{ route('paket.edit', $paket->id) }}"
                   class="bg-yellow-100 border border-yellow-300 rounded-full p-2 hover:bg-yellow-200 transition"
                   title="Edit Paket">
                  <img src="https://cdn-icons-png.flaticon.com/128/10337/10337572.png" alt="Edit" class="w-5 h-5">
                </a>

                <!-- Hapus -->
                <form action="{{ route('paket.destroy', $paket->id) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus paket ini?');">
                  @csrf
                  @method('DELETE')
                  <button type="submit"
                          class="bg-red-100 border border-red-300 rounded-full p-2 hover:bg-red-200 transition"
                          title="Hapus Paket">
                    <img src="https://cdn-icons-png.flaticon.com/128/9068/9068885.png" alt="Hapus" class="w-5 h-5">
                  </button>
                </form>
              </div>
            </td>
          </tr>
        @empty
          <tr>
            <td colspan="6" class="py-4 px-6 text-center text-gray-500 border">Tidak ada paket tersedia.</td>
          </tr>
        @endforelse
      </tbody>
    </table>
  </div>
</div>

  </div>
</section>


</body>
</html>
