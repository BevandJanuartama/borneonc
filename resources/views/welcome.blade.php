<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>BNC</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <link href="https://cdn.jsdelivr.net/npm/remixicon@3.5.0/fonts/remixicon.css" rel="stylesheet">
  <style>
    @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap');
    
    body {
      font-family: 'Poppins', sans-serif;
      scroll-behavior: smooth;
    }
    
    /* Custom styles for smooth fade-in effect */
    .fade-element {
      opacity: 0;
      transform: translateY(20px);
      transition: opacity 0.6s ease-out, transform 0.6s ease-out;
    }
    .fade-element.visible {
      opacity: 1;
      transform: translateY(0);
    }
    
    /* Gradient background */
    .gradient-bg {
      background: linear-gradient(135deg, #3F8EFC 0%, #6B46C1 100%);
    }
    
    /* Card hover effect */
    .card-hover {
      transition: all 0.3s ease;
      box-shadow: 0 4px 6px rgba(0, 0, 0, 0.05);
    }
    .card-hover:hover {
      transform: translateY(-5px);
      box-shadow: 0 20px 25px -5px rgba(0, 0, 0, 0.1), 0 10px 10px -5px rgba(0, 0, 0, 0.04);
    }
    
    /* Modern menu item */
    .menu-item {
      position: relative;
      transition: all 0.3s ease;
    }
    .menu-item:after {
      content: '';
      position: absolute;
      bottom: -2px;
      left: 0;
      width: 0;
      height: 2px;
      background: #3F8EFC;
      transition: width 0.3s ease;
    }
    .menu-item:hover:after {
      width: 100%;
    }
    
    /* Modern pricing card */
    .pricing-card {
      transition: all 0.3s cubic-bezier(0.25, 0.8, 0.25, 1);
      border: 1px solid rgba(0, 0, 0, 0.05);
    }
    .pricing-card:hover {
      transform: translateY(-8px);
      box-shadow: 0 14px 28px rgba(0, 0, 0, 0.1), 0 10px 10px rgba(0, 0, 0, 0.05);
    }
    
    /* FAQ accordion */
    .accordion-item {
      border-radius: 8px;
      overflow: hidden;
      margin-bottom: 12px;
      box-shadow: 0 1px 3px rgba(0, 0, 0, 0.1);
    }
    .accordion-button {
      background: white;
      color: #3F8EFC;
      font-weight: 500;
      padding: 16px;
      width: 100%;
      text-align: left;
      border: none;
      outline: none;
      cursor: pointer;
      transition: all 0.3s ease;
    }
    .accordion-button:hover {
      background: #f8fafc;
    }
    .accordion-button:after {
      content: '▲';
      float: right;
      font-weight: bold;
    }
    .accordion-button.collapsed:after {
      content: '▼';
    }
    .accordion-body {
      padding: 0 16px;
      max-height: 0;
      overflow: hidden;
      transition: max-height 0.3s ease-out;
      background: white;
    }
    .accordion-body.show {
      padding: 16px;
      max-height: 500px;
    }
    
    /* Subtle floating animation */
    @keyframes float {
      0% { transform: translateY(0px); }
      50% { transform: translateY(-10px); }
      100% { transform: translateY(0px); }
    }
    .floating {
      animation: float 6s ease-in-out infinite;
    }
  </style>
</head>
<body class="bg-gray-50 text-gray-800">

  <!-- HEADER -->
  <header id="mainHeader" class="fixed top-0 left-0 w-full z-50 bg-white shadow-md transition-all duration-300">
    <div class="max-w-7xl mx-auto flex items-center justify-between px-6 py-3">
      <h1 class="text-xl font-bold text-[#3F8EFC] flex items-center">
        <i class="ri-global-line mr-2"></i> BORNEO NETWORK CENTER
      </h1>
      <button id="burgerBtn" class="text-2xl md:hidden text-gray-700">
        <i class="ri-menu-line"></i>
      </button>
      <nav class="hidden md:flex gap-6 font-medium text-gray-700 items-center">
        <a href="#beranda" class="menu-item hover:text-[#3F8EFC]">Beranda</a>
        <a href="#tentang" class="menu-item hover:text-[#3F8EFC]">Tentang Kami</a>
        <a href="#fitur" class="menu-item hover:text-[#3F8EFC]">Fitur</a>
        <a href="#harga" class="menu-item hover:text-[#3F8EFC]">Harga</a>
        <a href="#footer" class="menu-item hover:text-[#3F8EFC]">Kontak</a>
        <a href="{{ route('login') }}" class="px-4 py-2 gradient-bg text-white rounded-lg hover:opacity-90 transition shadow hover:shadow-md">Login</a>
        <a href="{{ route('register') }}" class="px-4 py-2 border border-[#3F8EFC] text-[#3F8EFC] rounded-lg hover:bg-blue-50 transition">Register</a>
      </nav>
    </div>
  </header>

  <!-- OVERLAY & SIDEBAR -->
  <div id="overlay" class="fixed inset-0 bg-black bg-opacity-40 z-40 hidden"></div>
  <div id="sidebar" class="fixed top-0 right-0 w-64 h-full bg-white shadow-lg z-50 transform translate-x-full transition-transform duration-300">
    <div class="p-6 space-y-4 font-medium text-gray-700 mt-16">
      <a href="#beranda" class="block menu-item hover:text-[#3F8EFC]">Beranda</a>
      <a href="#tentang" class="block menu-item hover:text-[#3F8EFC]">Tentang Kami</a>
      <a href="#fitur" class="block menu-item hover:text-[#3F8EFC]">Fitur</a>
      <a href="#harga" class="block menu-item hover:text-[#3F8EFC]">Harga</a>
      <a href="#footer" class="block menu-item hover:text-[#3F8EFC]">Kontak</a>
      <div class="pt-4 border-t border-gray-200">
        <a href="{{ route('login') }}" class="block w-full text-center px-4 py-2 gradient-bg text-white rounded-lg mb-3 hover:opacity-90 transition shadow hover:shadow-md">Login</a>
        <a href="{{ route('register') }}" class="block w-full text-center px-4 py-2 border border-[#3F8EFC] text-[#3F8EFC] rounded-lg hover:bg-blue-50 transition">Register</a>
      </div>
    </div>
  </div> 

  <!-- HERO SECTION -->
  <section id="beranda" class="pt-32 pb-20 bg-gradient-to-b from-white to-blue-50">
    <div class="container mx-auto px-6 lg:flex lg:items-center lg:gap-12">
      <div class="lg:w-1/2 mb-10 lg:mb-0 fade-element text-center md:text-left">
        <h1 class="text-4xl md:text-5xl font-bold mb-4 text-gray-800 leading-tight">
          BILLING MIKROTIK <br> <span class="gradient-text bg-clip-text text-transparent bg-gradient-to-r from-[#3F8EFC] to-[#6B46C1]">PPPoE DAN HOTSPOT</span>
        </h1>
        <h2 class="text-2xl md:text-3xl mb-6 text-gray-600">
          Aplikasi billing dan server radius yang powerfull
        </h2>
        <div class="flex flex-col md:flex-row justify-center md:justify-start gap-4">
          <a href="#harga" class="px-6 py-3 gradient-bg text-white rounded-lg font-medium hover:opacity-90 transition shadow hover:shadow-md">
            Mulai Berlangganan
          </a>
          <a href="#fitur" class="px-6 py-3 border border-gray-300 text-gray-700 rounded-lg font-medium hover:bg-gray-100 transition">
            Lihat Fitur
          </a>
        </div>
      </div>
      <div class="lg:w-1/2 fade-element">
        <img src="https://cdn-icons-png.flaticon.com/512/3598/3598180.png" class="w-full max-w-lg mx-auto rounded-xl shadow-lg floating" alt="logo bnc radius">
      </div>
    </div>
  </section>

  <!-- VALUES SECTION -->
  <section id="tentang" class="py-16 bg-white">
    <div class="container mx-auto px-6">
      <header class="text-center mb-12 fade-element">
        <h2 class="text-3xl md:text-4xl font-bold text-gray-800 mb-3">Kenapa memilih kami?</h2>
        <p class="text-lg text-gray-600 max-w-2xl mx-auto">Solusi lengkap untuk manajemen jaringan ISP Anda dengan fitur terbaik di kelasnya</p>
      </header>

      <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
        <div class="text-center bg-white p-8 rounded-xl shadow-sm card-hover transition-all duration-300 fade-element">
          <div class="w-16 h-16 gradient-bg rounded-full flex items-center justify-center mx-auto mb-6">
            <i class="ri-cloud-fill text-3xl text-white"></i>
          </div>
          <h3 class="text-xl font-bold mb-3 text-gray-800">Easy to use</h3>
          <p class="text-gray-600">Fitur aplikasi lengkap serta mudah digunakan, desain aplikasi simpel, support multi platform serta berbasis cloud yang dapat diakses darimana saja dan kapan saja.</p>
        </div>

        <div class="text-center bg-white p-8 rounded-xl shadow-sm card-hover transition-all duration-300 fade-element">
          <div class="w-16 h-16 gradient-bg rounded-full flex items-center justify-center mx-auto mb-6">
            <i class="ri-cpu-fill text-3xl text-white"></i>
          </div>
          <h3 class="text-xl font-bold mb-3 text-gray-800">Sistem Otomatis</h3>
          <p class="text-gray-600">Tagihan, notifikasi, isolir dan pelunasan tagihan secara otomatis dengan berbagai macam metode pembayaran yang sangat lengkap dan mudah digunakan.</p>
        </div>

        <div class="text-center bg-white p-8 rounded-xl shadow-sm card-hover transition-all duration-300 fade-element">
          <div class="w-16 h-16 gradient-bg rounded-full flex items-center justify-center mx-auto mb-6">
            <i class="ri-database-2-fill text-3xl text-white"></i>
          </div>
          <h3 class="text-xl font-bold mb-3 text-gray-800">Data Terpusat</h3>
          <p class="text-gray-600">Satu Aplikasi untuk banyak MikroTik. Klien Anda dapat terhubung ke jaringan dengan 1 akun dari mana saja, asalkan router sudah tersambung ke server Cloud BNC Radius.</p>
        </div>
      </div>
    </div>
  </section>

  <!-- FULL SUPPORT SECTION -->
  <section id="counts" class="py-16 bg-gradient-to-r from-blue-50 to-indigo-50">
    <div class="container mx-auto px-6 max-w-4xl text-center fade-element">
      <div class="bg-white p-8 md:p-10 rounded-xl shadow-sm">
        <div class="w-20 h-20 gradient-bg rounded-full flex items-center justify-center mx-auto mb-6">
          <i class="ri-customer-service-fill text-4xl text-white"></i>
        </div>
        <h3 class="text-2xl font-bold text-gray-800 mb-4">100% Gratis Support</h3>
        <p class="text-gray-600">Pelanggan akan dilayani langsung oleh teknisi, yang sudah bertahun tahun berkecimpung di dunia jaringan internet dalam menangani berbagai macam permasalahan, support yang kami berikan bersifat gratis selama permasalahan berkaitan dengan aplikasi BNC Radius</p>
      </div>
    </div>
  </section>

  <!-- FEATURES SECTION -->
  <section id="fitur" class="py-16 bg-gray-50">
    <div class="container mx-auto px-6">
      <header class="text-center mb-12 fade-element">
        <h2 class="text-3xl md:text-4xl font-bold text-gray-800 mb-3">Fitur Unggulan Kami</h2>
        <p class="text-lg text-gray-600 max-w-2xl mx-auto">Berbagai fitur canggih yang akan memudahkan pengelolaan jaringan Anda</p>
      </header>

      <div class="flex flex-wrap items-center">
        <div class="w-full xl:w-1/3 text-center xl:text-left -mt16 fade-element">
          <img src="assets/img/svg/fitur.svg" class="mx-auto xl:mx-0 w-full max-w-[600px] p-2 floating" alt="fitur billing mikrotik bnc radius">
        </div>

        <div class="w-full xl:w-2/3 fade-element">
          <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <!-- Fitur 1 -->
            <div class="flex items-start p-5 bg-white rounded-xl shadow-sm hover:shadow-md transition-all duration-300">
              <div class="w-12 h-12 gradient-bg rounded-lg flex items-center justify-center mr-4 flex-shrink-0">
                <i class="ri-award-fill text-xl text-white"></i>
              </div>
              <div>
                <h4 class="font-semibold text-gray-800 mb-1">Terpercaya dan teruji</h4>
                <p class="text-gray-600 text-sm">Sudah digunakan oleh berbagai skala usaha di seluruh Indonesia.</p>
              </div>
            </div>

            <!-- Fitur 2 -->
            <div class="flex items-start p-5 bg-white rounded-xl shadow-sm hover:shadow-md transition-all duration-300">
              <div class="w-12 h-12 gradient-bg rounded-lg flex items-center justify-center mr-4 flex-shrink-0">
                <i class="ri-cpu-line text-xl text-white"></i>
              </div>
              <div>
                <h4 class="font-semibold text-gray-800 mb-1">Resource Mikrotik Ringan</h4>
                <p class="text-gray-600 text-sm">Data tersimpan di Cloud Radius sehingga tidak membebani Mikrotik.</p>
              </div>
            </div>

            <!-- Fitur 5 -->
            <div class="flex items-start p-5 bg-white rounded-xl shadow-sm hover:shadow-md transition-all duration-300">
              <div class="w-12 h-12 gradient-bg rounded-lg flex items-center justify-center mr-4 flex-shrink-0">
                <i class="ri-database-2-line text-xl text-white"></i>
              </div>
              <div>
                <h4 class="font-semibold text-gray-800 mb-1">Data lebih Aman</h4>
                <p class="text-gray-600 text-sm">Data tetap aman walau perangkat Mikrotik rusak atau diganti.</p>
              </div>
            </div>

            <!-- Fitur 9 -->
            <div class="flex items-start p-5 bg-white rounded-xl shadow-sm hover:shadow-md transition-all duration-300">
              <div class="w-12 h-12 gradient-bg rounded-lg flex items-center justify-center mr-4 flex-shrink-0">
                <i class="ri-team-line text-xl text-white"></i>
              </div>
              <div>
                <h4 class="font-semibold text-gray-800 mb-1">Sistem Kemitraan</h4>
                <p class="text-gray-600 text-sm">Mitra mengelola pelanggannya sendiri & bisa topup otomatis.</p>
              </div>
            </div>

            <!-- Fitur 11 -->
            <div class="flex items-start p-5 bg-white rounded-xl shadow-sm hover:shadow-md transition-all duration-300">
              <div class="w-12 h-12 gradient-bg rounded-lg flex items-center justify-center mr-4 flex-shrink-0">
                <i class="ri-file-chart-line text-xl text-white"></i>
              </div>
              <div>
                <h4 class="font-semibold text-gray-800 mb-1">Laporan Transaksi</h4>
                <p class="text-gray-600 text-sm">Rekap lengkap: penjualan, komisi mitra, pemasukan & pengeluaran.</p>
              </div>
            </div>

            <!-- Fitur 12 -->
            <div class="flex items-start p-5 bg-white rounded-xl shadow-sm hover:shadow-md transition-all duration-300">
              <div class="w-12 h-12 gradient-bg rounded-lg flex items-center justify-center mr-4 flex-shrink-0">
                <i class="ri-file-excel-2-line text-xl text-white"></i>
              </div>
              <div>
                <h4 class="font-semibold text-gray-800 mb-1">Export & Import</h4>
                <p class="text-gray-600 text-sm">Mendukung Excel untuk ekspor & impor data ke aplikasi lain.</p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- SERVICES SECTION -->
  <section id="services" class="py-16 bg-white">
    <div class="container mx-auto px-6">
      <header class="text-center mb-12 fade-element">
        <h2 class="text-3xl md:text-4xl font-bold text-gray-800 mb-3">Fasilitas Pendukung</h2>
        <p class="text-lg text-gray-600 max-w-2xl mx-auto">Dukungan lengkap untuk memastikan jaringan Anda berjalan optimal</p>
      </header>

      <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
        <div class="bg-gradient-to-br from-blue-50 to-indigo-50 p-8 rounded-xl shadow-sm card-hover transition-all duration-300 fade-element">
          <div class="w-16 h-16 gradient-bg rounded-full flex items-center justify-center mb-6 mx-auto">
            <i class="ri-server-fill text-3xl text-white"></i>
          </div>
          <h3 class="font-semibold text-xl mb-3 text-gray-800">VPN Server</h3>
          <p class="text-gray-600">Kami menyediakan banyak server VPN yang sudah saling terkoneksi satu sama lainnya, untuk menghubungkan router pelanggan ke server utama di datacenter, server VPN pilihan dengan latency dan rute terbaik.</p>
        </div>

        <div class="bg-gradient-to-br from-orange-50 to-pink-50 p-8 rounded-xl shadow-sm card-hover transition-all duration-300 fade-element">
          <div class="w-16 h-16 gradient-bg rounded-full flex items-center justify-center mb-6 mx-auto">
            <i class="ri-database-fill text-3xl text-white"></i>
          </div>
          <h3 class="font-semibold text-xl mb-3 text-gray-800">Server Handal</h3>
          <p class="text-gray-600">Kami memiliki server sendiri yang belokasi di Data Center Indonesia, dengan spesifikasi yang handal dan mumpuni, didukung dengan koneksi yang stabil serta sistem keamanan yang terpercaya.</p>
        </div>

        <div class="bg-gradient-to-br from-green-50 to-teal-50 p-8 rounded-xl shadow-sm card-hover transition-all duration-300 fade-element">
          <div class="w-16 h-16 gradient-bg rounded-full flex items-center justify-center mb-6 mx-auto">
            <i class="ri-install-fill text-3xl text-white"></i>
          </div>
          <h3 class="font-semibold text-xl mb-3 text-gray-800">Backup Otomatis</h3>
          <p class="text-gray-600">Server kami dilengkapi dengan Multi Storage Skala Enterprise dengan sistem RAID dan Mirror, backup otomatis mesin container, dan sistem recovery yang cepat untuk memastikan data Anda selalu aman.</p>
        </div>
      </div>
    </div>
  </section>

  <!-- PRICING SECTION -->
<section id="harga" class="py-16 bg-gray-50">
  <div class="container mx-auto px-6">
    <header class="text-center mb-12 fade-element">
      <h2 class="text-3xl md:text-4xl font-bold text-gray-800 mb-3">Harga Berlangganan</h2>
      <p class="text-lg text-gray-600 max-w-2xl mx-auto">Pilih paket yang sesuai dengan kebutuhan bisnis Anda</p>
    </header>

    <!-- Alert Informasi -->
    <div class="bg-red-50 border-l-4 border-red-500 p-4 mb-8 rounded-r fade-element">
      <div class="flex items-start">
        <div class="flex-shrink-0">
          <i class="ri-alert-fill text-red-500 text-xl"></i>
        </div>
        <div class="ml-3">
          <ol class="text-sm text-red-700 space-y-1">
            <li>1. User Online lebih dari 10.000 tersedia paket Platinum.</li>
            <li>2. Langganan = PPPoE, DHCP & Hotspot berlangganan.</li>
            <li>3. User Online = jumlah client aktif di Mikrotik (R).</li>
            <li>4. Harga dapat berubah sewaktu-waktu tanpa pemberitahuan.</li>
          </ol>
        </div>
      </div>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
        @foreach ($pakets as $paket)
        <div class="bg-white rounded-2xl shadow-md pricing-card p-8 flex flex-col justify-between border-2 border-indigo-600">
          <div>
            <h3 class="text-xl font-bold text-indigo-600 mb-2 text-center">BNC CLOUD {{ strtoupper($paket->nama) }}</h3>
            <div class="text-center text-3xl font-extrabold text-indigo-600 mb-4">
              <sup class="text-base font-medium">Rp</sup>{{ number_format($paket->harga_bulanan, 0, ',', '.') }}<span class="text-base font-normal"> / bln</span>
            </div>
            <img src="https://cdn-icons-png.flaticon.com/512/2082/2082812.png" class="w-20 mx-auto mb-6" alt="Cloud Icon">
            <ul class="text-gray-700 space-y-3 mb-6 text-sm">
              <li class="flex items-center justify-center"><i class="ri-check-line text-green-500 mt-1 mr-2"></i> {{ $paket->mikrotik }} Router MikroTik</li>
              <li class="flex items-center justify-center"><i class="ri-check-line text-green-500 mt-1 mr-2"></i> {{ number_format($paket->langganan, 0, ',', '.') }} Langganan</li>
              <li class="flex items-center justify-center"><i class="ri-check-line text-green-500 mt-1 mr-2"></i> {{ number_format($paket->voucher, 0, ',', '.') }} Voucher</li>
              <li class="flex items-center justify-center"><i class="ri-check-line text-green-500 mt-1 mr-2"></i> <span class="font-semibold text-indigo-600">{{ number_format($paket->user_online, 0, ',', '.') }} User Online</span></li>

              @php
                $fiturTambahan = [
                  'vpn_tunnel' => 'Free VPN Radius',
                  'vpn_remote' => 'Free VPN Remote',
                  'whatsapp_gateway' => 'WhatsApp notifikasi',
                  'payment_gateway' => 'Payment Gateway',
                  'client_area' => 'Aplikasi client area',
                  'custom_domain' => 'Custom Domain',
                ];
              @endphp

              @foreach ($fiturTambahan as $key => $label)
              <li class="flex items-center justify-center">
                <i class="{{ $paket->$key ? 'ri-check-line text-green-500' : 'ri-close-line text-gray-400' }} mt-1 mr-2"></i>
                <span class="{{ $paket->$key ? '' : 'text-gray-400 line-through' }}">{{ $label }}</span>
              </li>
              @endforeach
            </ul>
          </div>
          <div class="text-center text-sm mb-4">
            <p class="text-gray-400 line-through">Rp{{ number_format((int)$paket->harga_bulanan * 12, 0, ',', '.') }} / 12 Bln</p>
            <p class="text-green-600 font-bold">Rp{{ number_format($paket->harga_tahunan, 0, ',', '.') }} / 12 Bln</p>
          </div>
          <a href="{{ route('login') }}" class="block w-full text-center px-4 py-3 border border-{{ $loop->index == 2 ? 'purple-600' : '[#3F8EFC]' }} text-{{ $loop->index == 2 ? 'purple-600' : '[#3F8EFC]' }} font-medium rounded-lg hover:bg-{{ $loop->index == 2 ? 'purple-50' : 'blue-50' }} transition">Berlangganan</a>
        </div>
        @endforeach
      </div>
  </div>
</section>

<!-- FAQ SECTION -->
<section id="faq" class="py-16 bg-white">
  <div class="container mx-auto px-6 max-w-6xl">
    <header class="text-center mb-12 fade-element">
      <span class="inline-block px-3 py-1 text-xs font-semibold text-[#3F8EFC] bg-blue-100 rounded-full mb-3">
        PERTANYAAN UMUM
      </span>
      <h2 class="text-3xl md:text-4xl font-bold text-gray-800 mb-3">FAQ</h2>
      <p class="text-lg text-gray-600 max-w-2xl mx-auto">Pertanyaan yang Sering Diajukan</p>
    </header>

    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
      <!-- Item FAQ -->
      <div class="bg-white rounded-xl shadow-sm overflow-hidden border border-gray-100">
        <button class="accordion-button collapsed w-full flex justify-between items-center p-5 text-left hover:bg-gray-50 transition" type="button">
          <span>Apa yang dimaksud dengan RL Radius?</span>
          <i class="text-[#3F8EFC] transition-transform duration-300"></i>
        </button>
        <div class="accordion-body px-5">
          <div class="pb-5 text-gray-600">
            RL Radius merupakan aplikasi billing untuk Mikrotik (PPPoE, DHCP, dan Hotspot) yang dikembangkan menggunakan PHP dan sistem Radius.
          </div>
        </div>
      </div>

      <div class="bg-white rounded-xl shadow-sm overflow-hidden border border-gray-100">
        <button class="accordion-button collapsed w-full flex justify-between items-center p-5 text-left hover:bg-gray-50 transition" type="button">
          <span>Apakah dapat digabungkan dengan aplikasi lain?</span>
          <i class="text-[#3F8EFC] transition-transform duration-300"></i>
        </button>
        <div class="accordion-body px-5">
          <div class="pb-5 text-gray-600">
            Ya, RL Radius dapat digabungkan dengan aplikasi lain yang bukan berbasis radius, seperti Mikhmon atau Mikrostator.
          </div>
        </div>
      </div>

      <div class="bg-white rounded-xl shadow-sm overflow-hidden border border-gray-100">
        <button class="accordion-button collapsed w-full flex justify-between items-center p-5 text-left hover:bg-gray-50 transition" type="button">
          <span>Apakah perlu menyetel ulang perangkat Mikrotik?</span>
          <i class="text-[#3F8EFC] transition-transform duration-300"></i>
        </button>
        <div class="accordion-body px-5">
          <div class="pb-5 text-gray-600">
            Tidak perlu. Cukup menambahkan konfigurasi tambahan untuk menghubungkan Mikrotik ke server RL Radius.
          </div>
        </div>
      </div>

      <div class="bg-white rounded-xl shadow-sm overflow-hidden border border-gray-100">
        <button class="accordion-button collapsed w-full flex justify-between items-center p-5 text-left hover:bg-gray-50 transition" type="button">
          <span>Apakah layanan VPN dapat digunakan untuk keperluan remote?</span>
          <i class="text-[#3F8EFC] transition-transform duration-300"></i>
        </button>
        <div class="accordion-body px-5">
          <div class="pb-5 text-gray-600">
            Ya, layanan VPN dapat digunakan untuk keperluan remote perangkat, minimal menggunakan paket Cloud Premium.
          </div>
        </div>
      </div>

      <div class="bg-white rounded-xl shadow-sm overflow-hidden border border-gray-100">
        <button class="accordion-button collapsed w-full flex justify-between items-center p-5 text-left hover:bg-gray-50 transition" type="button">
          <span>Apakah pelanggan memperoleh source code aplikasi?</span>
          <i class="text-[#3F8EFC] transition-transform duration-300"></i>
        </button>
        <div class="accordion-body px-5">
          <div class="pb-5 text-gray-600">
            Tidak. Layanan yang disediakan bersifat sewa penggunaan aplikasi, tidak termasuk kepemilikan atas source code.
          </div>
        </div>
      </div>

      <div class="bg-white rounded-xl shadow-sm overflow-hidden border border-gray-100">
        <button class="accordion-button collapsed w-full flex justify-between items-center p-5 text-left hover:bg-gray-50 transition" type="button">
          <span>Apakah dana akan dikembalikan apabila saya berhenti berlangganan?</span>
          <i class="text-[#3F8EFC] transition-transform duration-300"></i>
        </button>
        <div class="accordion-body px-5">
          <div class="pb-5 text-gray-600">
            Mohon maaf, seluruh transaksi yang telah dilakukan bersifat final dan tidak dapat dikembalikan.
          </div>
        </div>
      </div>
    </div>
  </div>
</section>


  <!-- CTA SECTION -->
  <section class="py-16 gradient-bg relative overflow-hidden">
    <div class="absolute inset-0 opacity-10 bg-[url('https://grainy-gradients.vercel.app/noise.svg')]"></div>
    
    <div class="container mx-auto px-6 text-center fade-element">
      <h2 class="text-3xl md:text-4xl font-bold text-white mb-6">Siap meningkatkan bisnis ISP Anda?</h2>
      <p class="text-lg text-white/90 max-w-2xl mx-auto mb-8">Bergabunglah dengan ratusan ISP yang telah mempercayakan manajemen jaringan mereka pada BNC Radius</p>
      <div class="flex flex-col md:flex-row justify-center gap-4">
        <a href="{{ route('register') }}" class="px-6 py-3 bg-white text-[#3F8EFC] rounded-lg font-medium hover:bg-gray-100 transition shadow-lg hover:shadow-xl flex items-center justify-center gap-2">
          <i class="ri-user-add-line"></i> Daftar Sekarang
        </a>
        <a href="#footer" class="px-6 py-3 border border-white text-white rounded-lg font-medium hover:bg-white/10 transition flex items-center justify-center gap-2">
          <i class="ri-customer-service-line"></i> Hubungi Kami
        </a>
      </div>
    </div>
  </section>

  <!-- Footer -->
<footer id="footer" class="bg-gray-900 text-gray-300 pt-16 pb-8">
  <div class="container mx-auto px-6">
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8 mb-12">
      
      <!-- Kolom 1: Alamat & Kontak -->
      <div>
        <h2 class="text-xl font-bold text-white mb-4 flex items-center">
          <span class="gradient-text bg-gradient-to-r">PT BORNEO NETWORK CENTER</span>
        </h2>
        <p class="mb-4">
          Jl. Palm Raya, Ruko No. 6, RT 50 RW 07, Kel. Guntung Manggis, Landasan Ulin, Banjarbaru, Kalimantan Selatan, Indonesia
        </p>
        <div class="flex space-x-4">
          <a href="#" class="w-10 h-10 bg-gray-800 rounded-full flex items-center justify-center hover:bg-[#3F8EFC] hover:text-white transition">
            <i class="ri-phone-fill"></i>
          </a>
          <a href="#" class="w-10 h-10 bg-gray-800 rounded-full flex items-center justify-center hover:bg-[#6B46C1] hover:text-white transition">
            <i class="ri-mail-fill"></i>
          </a>
        </div>
      </div>

      <!-- Kolom 2: Navigasi Perusahaan -->
      <div>
        <h3 class="text-lg font-semibold text-white mb-4">Perusahaan</h3>
        <ul class="space-y-2">
          <li><a href="#tentang" class="hover:text-white transition">Tentang Kami</a></li>
          <li><a href="#fitur" class="hover:text-white transition">Fitur</a></li>
          <li><a href="#harga" class="hover:text-white transition">Harga</a></li>
        </ul>
      </div>

      <!-- Kolom 3 (Opsional Dukungan, nonaktif sementara) -->
      <!--
      <div>
        <h3 class="text-lg font-semibold text-white mb-4">Dukungan</h3>
        <ul class="space-y-2">
          <li><a href="#" class="hover:text-white transition">Dokumentasi</a></li>
          <li><a href="#" class="hover:text-white transition">Panduan</a></li>
          <li><a href="#" class="hover:text-white transition">FAQ</a></li>
          <li><a href="#" class="hover:text-white transition">Bantuan</a></li>
        </ul>
      </div>
      -->

      <!-- Kolom 4: Sosial Media -->
      <div>
        <h3 class="text-lg font-semibold text-white mb-4">Sosial Media</h3>
        <div class="flex space-x-3">
          <a href="#" class="w-10 h-10 bg-gray-800 rounded-full flex items-center justify-center hover:bg-[#1DA1F2] hover:text-white transition">
            <i class="ri-twitter-fill"></i>
          </a>
          <a href="https://www.facebook.com/groups/rlradius" target="_blank" class="w-10 h-10 bg-gray-800 rounded-full flex items-center justify-center hover:bg-[#1877F2] hover:text-white transition">
            <i class="ri-facebook-fill"></i>
          </a>
          <a href="#" class="w-10 h-10 bg-gray-800 rounded-full flex items-center justify-center hover:bg-gradient-to-r from-[#F58529] via-[#DD2A7B] to-[#8134AF] hover:text-white transition">
            <i class="ri-instagram-line"></i>
          </a>
          <a href="https://www.youtube.com/watch?v=jnuILVPfKPg&list=PLVA91M9nFgixqwiNllm6CT9IPb8iFyFFl" target="_blank" class="w-10 h-10 bg-gray-800 rounded-full flex items-center justify-center hover:bg-[#FF0000] hover:text-white transition">
            <i class="ri-youtube-fill"></i>
          </a>
        </div>
      </div>

    </div>

    <!-- Footer Bawah -->
    <div class="border-t border-gray-800 pt-6 flex flex-col md:flex-row justify-between items-center">
      <div class="text-center md:text-left mb-4 md:mb-0">
        &copy; 2025 <strong class="text-white">PT BORNEO NETWORK CENTER</strong>. All Rights Reserved.
      </div>
      <div class="flex space-x-6">
        <button onclick="openModal('terms')" class="text-sm hover:text-white transition">Terms</button>
        <button onclick="openModal('privacy')" class="text-sm hover:text-white transition">Privacy</button>
        <button onclick="openModal('cookies')" class="text-sm hover:text-white transition">Cookies</button>
      </div>
    </div>
  </div>
</footer>



<!-- Modal -->
<div id="modalOverlay" class="fixed inset-0 bg-black bg-opacity-50 z-50 hidden justify-center items-center">
  <div class="bg-white w-[90%] md:w-1/2 lg:w-1/3 p-6 rounded-xl shadow-xl relative" onclick="event.stopPropagation()">
    
    <!-- Tombol Close -->
    <button onclick="closeModal()" class="absolute top-3 right-3 text-gray-600 hover:text-red-500 text-xl font-bold">&times;</button>

    <!-- Konten Modal Dinamis -->
    <div id="modalContent" class="text-gray-800 space-y-4 text-sm leading-relaxed">
      <!-- Akan diisi via JavaScript -->
    </div>

    <!-- Tombol Aksi -->
    <div class="mt-6 text-right">
      <button onclick="closeModal()" class="px-4 py-2 bg-gray-300 rounded hover:bg-gray-400 mr-2">Tutup</button>
    </div>
  </div>
</div>


  <!-- Back to top button -->
  <a href="#beranda" id="backToTop" class="fixed bottom-8 right-8 w-12 h-12 gradient-bg text-white rounded-full flex items-center justify-center shadow-lg opacity-0 invisible transition-all duration-300 hover:shadow-xl hover:scale-105">
    <i class="ri-arrow-up-line text-xl"></i>
  </a>

  <!-- JAVASCRIPT -->
<script>
  // Sticky Header on Scroll
  let lastScrollTop = 0;
  const header = document.getElementById('mainHeader');
  window.addEventListener("scroll", () => {
    const scrollTop = window.pageYOffset || document.documentElement.scrollTop;
    header.style.transform = "translateY(0)";
    lastScrollTop = scrollTop <= 0 ? 0 : scrollTop;
    
    // Show/hide back to top button
    const backToTop = document.getElementById('backToTop');
    if (scrollTop > 300) {
      backToTop.classList.remove('opacity-0', 'invisible');
      backToTop.classList.add('opacity-100', 'visible');
    } else {
      backToTop.classList.remove('opacity-100', 'visible');
      backToTop.classList.add('opacity-0', 'invisible');
    }
  });

  // Burger Menu Toggle
  const burgerBtn = document.getElementById('burgerBtn');
  const sidebar = document.getElementById('sidebar');
  const overlay = document.getElementById('overlay');

  burgerBtn.addEventListener('click', () => {
    sidebar.classList.remove('translate-x-full');
    overlay.classList.remove('hidden');
    document.body.style.overflow = 'hidden';
  });

  overlay.addEventListener('click', () => {
    sidebar.classList.add('translate-x-full');
    overlay.classList.add('hidden');
    document.body.style.overflow = '';
  });

  // Close sidebar when clicking on links
  const sidebarLinks = document.querySelectorAll('#sidebar a');
  sidebarLinks.forEach(link => {
    link.addEventListener('click', () => {
      sidebar.classList.add('translate-x-full');
      overlay.classList.add('hidden');
      document.body.style.overflow = '';
    });
  });

  // Fade-in animation on scroll
  const fadeElements = document.querySelectorAll('.fade-element');
  
  const fadeInOnScroll = () => {
    fadeElements.forEach(element => {
      const elementTop = element.getBoundingClientRect().top;
      const windowHeight = window.innerHeight;
      
      if (elementTop < windowHeight - 100) {
        element.classList.add('visible');
      }
    });
  };
  
  // Run once on page load
  window.addEventListener('load', fadeInOnScroll);
  // Run on scroll
  window.addEventListener('scroll', fadeInOnScroll);
  
  // Smooth scrolling for anchor links
  document.querySelectorAll('a[href^="#"]').forEach(anchor => {
    anchor.addEventListener('click', function(e) {
      e.preventDefault();
      
      const targetId = this.getAttribute('href');
      if (targetId === '#') return;
      
      const targetElement = document.querySelector(targetId);
      if (targetElement) {
        const headerHeight = document.getElementById('mainHeader').offsetHeight;
        const targetPosition = targetElement.getBoundingClientRect().top + window.pageYOffset - headerHeight;
        
        window.scrollTo({
          top: targetPosition,
          behavior: 'smooth'
        });
      }
    });
  });

  // FAQ Accordion
  const accordionButtons = document.querySelectorAll('.accordion-button');
  accordionButtons.forEach(button => {
    button.addEventListener('click', () => {
      const accordionItem = button.parentElement;
      const accordionBody = button.nextElementSibling;
      
      // Toggle collapsed class on button
      button.classList.toggle('collapsed');
      
      // Toggle accordion body
      if (button.classList.contains('collapsed')) {
        accordionBody.style.maxHeight = '0';
      } else {
        accordionBody.style.maxHeight = accordionBody.scrollHeight + 'px';
      }
    });
  });

  const modalOverlay = document.getElementById('modalOverlay');
  const modalContent = document.getElementById('modalContent');   

  const content = {
    terms: `<h2 class="text-lg font-bold">Syarat & Ketentuan</h2>
            <p>Dengan menggunakan layanan ini, Anda setuju untuk mematuhi semua aturan yang berlaku.</p>`,
    privacy: `<h2 class="text-lg font-bold">Kebijakan Privasi</h2>
              <p>Kami menghormati privasi Anda dan hanya mengumpulkan data seperlunya.</p>`,
    cookies: `<h2 class="text-lg font-bold">Kebijakan Cookies</h2>
              <p>Website ini menggunakan cookies untuk meningkatkan pengalaman pengguna.</p>`
  };

  function openModal(type) {
    modalContent.innerHTML = content[type];
    modalOverlay.classList.remove('hidden');
    modalOverlay.classList.add('flex');
  }

  function closeModal() {
    modalOverlay.classList.add('hidden');
    modalOverlay.classList.remove('flex');
  }

  // Klik di luar modal akan menutupnya
  modalOverlay.addEventListener('click', function(e) {
    if (e.target === modalOverlay) closeModal();
  });
</script>
</body>
</html>