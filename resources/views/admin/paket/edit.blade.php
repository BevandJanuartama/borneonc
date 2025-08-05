<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>{{ isset($paket) ? 'Edit Paket' : 'Tambah Paket' }} - BNC CLOUD MANAGER</title>

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
  </style>
</head>
<body class="bg-gray-100 flex min-h-screen">

  <!-- Sidebar -->
  @include('layouts.adminbar')

  <!-- Main Content -->
  <main class="md:pl-72 pt-20 w-full p-8">
    <h1 class="text-2xl font-bold mb-6">{{ isset($paket) ? 'Edit Paket' : 'Tambah Paket' }}</h1>

    <form action="{{ isset($paket) ? route('paket.update', $paket->id) : route('paket.store') }}" method="POST">
      @csrf
      @if(isset($paket))
        @method('PUT')
      @endif

      <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
        <div>
          <label class="block mb-1 font-semibold">Nama Paket</label>
          <input type="text" name="nama" class="border p-2 w-full rounded" value="{{ old('nama', $paket->nama ?? '') }}">
        </div>
        <div>
          <label class="block mb-1 font-semibold">Harga Bulanan</label>
          <input type="number" name="harga_bulanan" class="border p-2 w-full rounded" value="{{ old('harga_bulanan', $paket->harga_bulanan ?? '') }}">
        </div>
        <div>
          <label class="block mb-1 font-semibold">Harga Tahunan</label>
          <input type="number" name="harga_tahunan" class="border p-2 w-full rounded" value="{{ old('harga_tahunan', $paket->harga_tahunan ?? '') }}">
        </div>
        <div>
          <label class="block mb-1 font-semibold">Mikrotik</label>
          <input type="number" name="mikrotik" class="border p-2 w-full rounded" value="{{ old('mikrotik', $paket->mikrotik ?? '') }}">
        </div>
        <div>
          <label class="block mb-1 font-semibold">Langganan</label>
          <input type="number" name="langganan" class="border p-2 w-full rounded" value="{{ old('langganan', $paket->langganan ?? '') }}">
        </div>
        <div>
          <label class="block mb-1 font-semibold">Voucher</label>
          <input type="number" name="voucher" class="border p-2 w-full rounded" value="{{ old('voucher', $paket->voucher ?? '') }}">
        </div>
        <div>
          <label class="block mb-1 font-semibold">User Online</label>
          <input type="number" name="user_online" class="border p-2 w-full rounded" value="{{ old('user_online', $paket->user_online ?? '') }}">
        </div>
      </div>

      <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4 mt-6">
        @php
          $checkboxes = [
            'vpn_tunnel' => 'VPN Tunnel',
            'vpn_remote' => 'VPN Remote',
            'whatsapp_gateway' => 'WhatsApp Gateway',
            'payment_gateway' => 'Payment Gateway',
            'custom_domain' => 'Custom Domain',
            'client_area' => 'Client Area',
          ];
        @endphp

        @foreach ($checkboxes as $key => $label)
          <label class="inline-flex items-center space-x-2">
            <input type="checkbox" name="{{ $key }}" value="1"
              {{ old($key, $paket->$key ?? false) ? 'checked' : '' }}>
            <span>{{ $label }}</span>
          </label>
        @endforeach
      </div>

      <div class="mt-6">
        <button class="bg-indigo-600 text-white px-6 py-2 rounded hover:bg-indigo-700 transition">
          {{ isset($paket) ? 'Update' : 'Simpan' }}
        </button>
      </div>
    </form>
  </main>

</body>
</html>
