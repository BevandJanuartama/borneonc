<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Dashboard - BNC CLOUD MANAGER</title>

  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" crossorigin="anonymous" referrerpolicy="no-referrer" />

  <!-- Tailwind CSS CDN -->
  <script src="https://cdn.tailwindcss.com"></script>

  <style>
    .sidebar-gradient {
      background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
    }
    .card-hover {
      transition: all 0.3s ease;
    }
    .card-hover:hover {
      transform: translateY(-5px);
      box-shadow: 0 20px 25px -5px rgba(0, 0, 0, 0.1),
                  0 10px 10px -5px rgba(0, 0, 0, 0.04);
    }
    .menu-item {
      transition: all 0.3s ease;
    }
    .menu-item:hover {
      background: rgba(255, 255, 255, 0.1);
      transform: translateX(5px);
    }
  </style>
</head>
<body class="bg-gray-50 flex min-h-screen">

  <!-- Sidebar -->
  @include('layouts.subadminbar')

  <!-- Wrapper utama konten -->
  <main class="md:pl-72 w-full">
    
    <!-- Judul -->
    <section class="py-10 border-b border-indigo-200">
      <div class="container mx-auto px-6">
        <h2 class="text-3xl text-center font-bold text-gray-800">Info Log</h2>
      </div>
    </section>

    <!-- Konten -->
    <section class="py-6">
      <div class="container mx-auto px-6">

        <!-- Filter + Tombol -->
        <div class="flex flex-col md:flex-row md:items-center justify-between mb-6 gap-4">
          <form action="{{ route('info.destroyAll') }}" method="POST" 
                onsubmit="return confirm('Kosongkan semua log?')">
              @csrf
              @method('DELETE')
              <button type="submit" 
                      class="bg-red-600 hover:bg-red-700 text-white px-4 py-2 rounded-lg shadow">
                <i class="fa fa-trash"></i> Kosongkan Log
              </button>
          </form>

          <form action="{{ route('admin-sub.dashboard') }}" method="GET" class="flex items-center gap-2">
            <label class="text-sm text-gray-700">Filter Tanggal</label>
            <input type="date" name="tanggal" value="{{ request('tanggal') }}"
                   onchange="this.form.submit()"
                   class="border-gray-300 rounded-lg px-3 py-2 shadow-sm focus:ring-indigo-500 focus:border-indigo-500">
          </form>
        </div>

        <!-- Table -->
        <div class="overflow-x-auto bg-white rounded-xl shadow">
          <table class="min-w-full text-sm text-left text-gray-600">
            <thead class="bg-indigo-600 text-white uppercase text-xs">
              <tr>
                <th class="px-4 py-3">No</th>
                <th class="px-4 py-3">Nama Lengkap</th>
                <th class="px-4 py-3">Telepon</th>
                <th class="px-4 py-3">IP Address</th>
                <th class="px-4 py-3">Info Aktifitas</th>
                <th class="px-4 py-3">Tanggal Kejadian</th>
                <th class="px-4 py-3">Level</th>
              </tr>
            </thead>
            <tbody class="divide-y divide-gray-200">
              @forelse($infos as $info)
              <tr class="hover:bg-gray-50">
                <td class="px-4 py-3">{{ $loop->iteration }}</td>
                <td class="px-4 py-3 font-medium">{{ $info->nama_lengkap }}</td>
                <td class="px-4 py-3">{{ $info->telepon }}</td>
                <td class="px-4 py-3">{{ $info->ip_address }}</td>
                <td class="px-4 py-3">{{ $info->info_aktifitas }}</td>
                <td class="px-4 py-3">{{ $info->tanggal_kejadian }}</td>
                <td class="px-4 py-3">{{ $info->level }}</td>
              </tr>
              @empty
              <tr>
                <td colspan="7" class="px-4 py-6 text-center text-gray-400">
                  Belum ada data log
                </td>
              </tr>
              @endforelse
            </tbody>
          </table>
        </div>

        <!-- Pagination -->
        <div class="mt-6">
          {{ $infos->links('pagination::bootstrap-5') }}
        </div>

      </div>
    </section>

  </main>

</body>
</html>
