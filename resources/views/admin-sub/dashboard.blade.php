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

  <!-- Chart.js -->
  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
  <!-- Chart.js Doughnut Label Plugin -->
  <script src="https://cdn.jsdelivr.net/npm/chartjs-plugin-doughnutlabel-rebourne@3.0.0/dist/chartjs-plugin-doughnutlabel-rebourne.min.js"></script>

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

  <!-- Wrapper utama konten -->
  <main class="md:pl-72 w-full">
    
    <!-- Judul -->
    <section class="py-10 border-b border-indigo-200">
      <div class="container mx-auto px-6">
        <h2 class="text-3xl text-center font-bold text-gray-800">Dashboard</h2>
      </div>
    </section>

    <!-- Gauge Charts -->
    <section class="py-8">
      <div class="container mx-auto px-6">
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
          
          <!-- Gauge 1 -->
          <div class="bg-white rounded-xl shadow p-4 flex flex-col items-center">
            <h3 class="text-sm font-semibold text-gray-700 mb-2">Data 1</h3>
            <canvas id="gauge1" width="150" height="150"></canvas>
          </div>

          <!-- Gauge 2 -->
          <div class="bg-white rounded-xl shadow p-4 flex flex-col items-center">
            <h3 class="text-sm font-semibold text-gray-700 mb-2">Data 2</h3>
            <canvas id="gauge2" width="150" height="150"></canvas>
          </div>

          <!-- Gauge 3 -->
          <div class="bg-white rounded-xl shadow p-4 flex flex-col items-center">
            <h3 class="text-sm font-semibold text-gray-700 mb-2">Data 3</h3>
            <canvas id="gauge3" width="150" height="150"></canvas>
          </div>

          <!-- Gauge 4 -->
          <div class="bg-white rounded-xl shadow p-4 flex flex-col items-center">
            <h3 class="text-sm font-semibold text-gray-700 mb-2">data 4</h3>
            <canvas id="gauge4" width="150" height="150"></canvas>
          </div>

        </div>
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

  <script>
    function makeGauge(canvasId, value, color, label) {
      const ctx = document.getElementById(canvasId).getContext('2d');
      new Chart(ctx, {
        type: 'doughnut',
        data: {
          datasets: [{
            data: [value, 100 - value],
            backgroundColor: [color, '#e5e7eb'],
            borderWidth: 0
          }]
        },
        options: {
          cutout: '70%',
          rotation: -90,
          circumference: 180,
          plugins: {
            legend: { display: false },
            doughnutlabel: {
              labels: [
                {
                  text: value + '%',
                  font: { size: 20, weight: 'bold' },
                  color: '#374151'
                },
                {
                  text: label,
                  font: { size: 12 },
                  color: '#6b7280'
                }
              ]
            }
          }
        }
      });
    }

    // Dummy data
    makeGauge('gauge1', 80, '#4ade80', 'Sukses');   // hijau
    makeGauge('gauge2', 20, '#f87171', 'Gagal');    // merah
    makeGauge('gauge3', 65, '#60a5fa', 'Total');    // biru
    makeGauge('gauge4', 45, '#fbbf24', 'Aktif');    // kuning
  </script>

</body>
</html>
