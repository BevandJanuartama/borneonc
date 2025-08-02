<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Instances - BNC CLOUD MANAGER</title>

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
      box-shadow: 0 20px 25px -5px rgba(0, 0, 0, 0.1), 0 10px 10px -5px rgba(0, 0, 0, 0.04);
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
  @include('layouts.sidebar')

  <!-- Harga Section -->
  <section id="harga" class="py-20 pl-72 w-full">
    <div class="container mx-auto px-4">
      <header class="text-center mb-14">
        <h2 class="text-4xl font-bold text-gray-800 mb-2">Harga Berlangganan</h2>
        <p class="text-lg text-gray-600">Pilih paket yang sesuai dengan kebutuhan bisnis Anda</p>
      </header>

      <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
        <!-- Repeatable Card Template Start -->
        @foreach (['BASIC' => ['color' => 'blue', 'price' => '100.000', 'router' => '2', 'subs' => '200', 'voucher' => '5.000', 'online' => '250', 'vpn' => true, 'remote' => false, 'wa' => false, 'pg' => false, 'app' => false, 'domain' => false, 'annual' => ['1.200.000', '1.000.000']],
                  'PREMIUM' => ['color' => 'blue', 'price' => '290.000', 'router' => '10', 'subs' => '500', 'voucher' => '30.000', 'online' => '600', 'vpn' => true, 'remote' => true, 'wa' => true, 'pg' => true, 'app' => true, 'domain' => true, 'annual' => ['3.540.000', '3.000.000']],
                  'ULTIMATE' => ['color' => 'purple', 'price' => '475.000', 'router' => '15', 'subs' => '700', 'voucher' => '50.000', 'online' => '850', 'vpn' => true, 'remote' => true, 'wa' => true, 'pg' => true, 'app' => true, 'domain' => true, 'annual' => ['5.700.000', '4.500.000']]] as $name => $data)
        <div class="bg-white rounded-2xl shadow-md hover:shadow-xl hover:-translate-y-1 transition-all p-8 flex flex-col justify-between border-2 border-{{ $data['color'] }}-600">
          <div>
            <h3 class="text-xl font-bold text-{{ $data['color'] }}-600 mb-2 text-center">BNC CLOUD {{ $name }}</h3>
            <div class="text-center text-3xl font-extrabold text-{{ $data['color'] }}-600 mb-4">
              <sup class="text-base font-medium">Rp</sup>{{ $data['price'] }}<span class="text-base font-normal"> / bln</span>
            </div>
            <img src="https://cdn-icons-png.flaticon.com/512/2082/2082812.png" class="w-20 mx-auto mb-6" alt="Cloud Icon">
            <ul class="text-gray-700 space-y-3 mb-6 text-sm">
              <li class="flex items-center justify-center"><i class="ri-check-line text-green-500 mt-1 mr-2"></i> {{ $data['router'] }} Router MikroTik</li>
              <li class="flex items-center justify-center"><i class="ri-check-line text-green-500 mt-1 mr-2"></i> {{ $data['subs'] }} Langganan</li>
              <li class="flex items-center justify-center"><i class="ri-check-line text-green-500 mt-1 mr-2"></i> {{ $data['voucher'] }} Voucher</li>
              <li class="flex items-center justify-center"><i class="ri-check-line text-green-500 mt-1 mr-2"></i> <span class="font-semibold text-red-500">{{ $data['online'] }} User Online</span></li>
              @foreach (['vpn' => 'Free VPN Radius', 'remote' => 'Free VPN Remote', 'wa' => 'WhatsApp notifikasi', 'pg' => 'Payment Gateway', 'app' => 'Aplikasi client area', 'domain' => 'Custom Domain'] as $key => $label)
              <li class="flex items-center justify-center">
                <i class="{{ $data[$key] ? 'ri-check-line text-green-500' : 'ri-close-line text-gray-400' }} mt-1 mr-2"></i>
                <span class="{{ $data[$key] ? '' : 'text-gray-400 line-through' }}">{{ $label }}</span>
              </li>
              @endforeach
            </ul>
          </div>
          <div class="text-center text-sm mb-4">
            <p class="text-gray-400 line-through">Rp{{ $data['annual'][0] }} / 12 Bln</p>
            <p class="text-green-600 font-bold">Rp{{ $data['annual'][1] }} / 12 Bln</p>
          </div>
          <a href="https://wa.me/6281349335089?text={{ urlencode('Halo Admin, saya ' . Auth::user()->name . ' dengan email ' . Auth::user()->email . ' ingin berlangganan paket ' . $name . '. Bagaimana saya bisa melanjutkan proses transaksinya?') }}" 
            target="_blank"
            class="block w-full text-center px-4 py-3 rounded-lg border border-{{ $data['color'] }}-600 text-{{ $data['color'] }}-600 hover:bg-{{ $data['color'] }}-50 font-semibold transition">
            Berlangganan
          </a>
        </div>
        @endforeach
        <!-- Repeatable Card Template End -->
      </div>
    </div>
  </section>

</body>
</html>
