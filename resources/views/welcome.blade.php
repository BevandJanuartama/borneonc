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
    .card-hover:hover {
      transform: translateY(-5px);
      box-shadow: 0 10px 25px rgba(0, 0, 0, 0.1);
    }
    
    /* Pricing card highlight */
    .pricing-highlight {
      position: relative;
      border: 2px solid #3F8EFC;
    }
    .pricing-highlight::before {
      content: "POPULER";
      position: absolute;
      top: -12px;
      right: 20px;
      background: #3F8EFC;
      color: white;
      padding: 2px 10px;
      border-radius: 20px;
      font-size: 12px;
      font-weight: bold;
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
        <a href="#beranda" class="hover:text-[#3F8EFC] transition">Beranda</a>
        <a href="#tentang" class="hover:text-[#3F8EFC] transition">Tentang Kami</a>
        <a href="#fitur" class="hover:text-[#3F8EFC] transition">Fitur</a>
        <a href="#harga" class="hover:text-[#3F8EFC] transition">Harga</a>
        <a href="#footer" class="hover:text-[#3F8EFC] transition">Kontak</a>
        <a href="{{ route('login') }}" class="px-4 py-2 gradient-bg text-white rounded-lg hover:opacity-90 transition">Login</a>
        <a href="{{ route('register') }}" class="px-4 py-2 border border-[#3F8EFC] text-[#3F8EFC] rounded-lg hover:bg-blue-50 transition">Register</a>
      </nav>
    </div>
  </header>

  <!-- OVERLAY & SIDEBAR -->
  <div id="overlay" class="fixed inset-0 bg-black bg-opacity-40 z-40 hidden"></div>
  <div id="sidebar" class="fixed top-0 right-0 w-64 h-full bg-white shadow-lg z-50 transform translate-x-full transition-transform duration-300">
    <div class="p-6 space-y-4 font-medium text-gray-700 mt-16">
      <a href="#beranda" class="block hover:text-[#3F8EFC] transition">Beranda</a>
      <a href="#tentang" class="block hover:text-[#3F8EFC] transition">Tentang Kami</a>
      <a href="#fitur" class="block hover:text-[#3F8EFC] transition">Fitur</a>
      <a href="#harga" class="block hover:text-[#3F8EFC] transition">Harga</a>
      <a href="#footer" class="block hover:text-[#3F8EFC] transition">Kontak</a>
      <div class="pt-4 border-t border-gray-200">
        <a href="{{ route('login') }}" class="block w-full text-center px-4 py-2 gradient-bg text-white rounded-lg mb-3 hover:opacity-90 transition">Login</a>
        <a href="{{ route('register') }}" class="block w-full text-center px-4 py-2 border border-[#3F8EFC] text-[#3F8EFC] rounded-lg hover:bg-blue-50 transition">Register</a>
      </div>
    </div>
  </div>

  <!-- HERO SECTION -->
  <section id="beranda" class="pt-32 pb-20 bg-white">
    <div class="container mx-auto px-6 lg:flex lg:items-center lg:gap-12">
      <div class="lg:w-1/2 mb-10 lg:mb-0 fade-element">
        <h1 class="text-4xl md:text-5xl font-bold mb-4 text-gray-800 leading-tight">BILLING MIKROTIK <br> PPPoE DAN HOTSPOT</h1>
        <h2 class="text-2xl md:text-3xl mb-6 text-gray-600">Aplikasi billing dan server radius yang powerfull</h2>
        <div class="flex flex-wrap gap-4">
          <a href="#harga" class="px-6 py-3 gradient-bg text-white rounded-lg font-medium hover:opacity-90 transition">Mulai Berlangganan</a>
          <a href="#fitur" class="px-6 py-3 border border-gray-300 text-gray-700 rounded-lg font-medium hover:bg-gray-100 transition">Lihat Fitur</a>
        </div>
      </div>
      <div class="lg:w-1/2 fade-element">
        <img src="assets/img/logotelkom.jpeg" class="w-full max-w-lg mx-auto rounded-xl shadow-lg" alt="logo rl radius">
      </div>
    </div>
  </section>

  <!-- VALUES SECTION -->
  <section id="tentang" class="py-16 bg-gradient-to-b from-white to-gray-50">
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
            <i class="ri-cpu-fill text-3xl text-white"></i> <!-- Ganti dengan CPU untuk kesan otomatis -->
          </div>
          <h3 class="text-xl font-bold mb-3 text-gray-800">Sistem Otomatis</h3>
          <p class="text-gray-600">Tagihan, notifikasi, isolir dan pelunasan tagihan secara otomatis dengan berbagai macam metode pembayaran yang sangat lengkap dan mudah digunakan.</p>
        </div>

        <div class="text-center bg-white p-8 rounded-xl shadow-sm card-hover transition-all duration-300 fade-element">
          <div class="w-16 h-16 gradient-bg rounded-full flex items-center justify-center mx-auto mb-6">
            <i class="ri-database-2-fill text-3xl text-white"></i> <!-- Ganti dengan cloud untuk kesan data terpusat -->
          </div>
          <h3 class="text-xl font-bold mb-3 text-gray-800">Data Terpusat</h3>
          <p class="text-gray-600">Satu Aplikasi untuk banyak MikroTik. Klien Anda dapat terhubung ke jaringan dengan 1 akun dari mana saja, asalkan router sudah tersambung ke server Cloud RL Radius.</p>
        </div>
      </div>
    </div>
  </section>

  <!-- FULL SUPPORT SECTION -->
  <section id="counts" class="py-16 bg-white">
    <div class="container mx-auto px-6 max-w-4xl text-center fade-element">
      <div class="bg-blue-50 p-8 md:p-10 rounded-xl">
        <div class="w-20 h-20 gradient-bg rounded-full flex items-center justify-center mx-auto mb-6">
          <i class="ri-customer-service-fill text-4xl text-white"></i>
        </div>
        <h3 class="text-2xl font-bold text-gray-800 mb-4">100% Gratis Support</h3>
        <p class="text-gray-600">Pelanggan akan dilayani langsung oleh teknisi, yang sudah bertahun tahun berkecimpung di dunia jaringan internet dalam menangani berbagai macam permasalahan, support yang kami berikan bersifat gratis selama permasalahan berkaitan dengan aplikasi RL Radius</p>
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
  <img src="assets/img/svg/fitur.svg" class="mx-auto xl:mx-0 w-full max-w-[420px] p-2" alt="fitur billing mikrotik rl radius">
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

            <!-- Fitur 3 -->
            <div class="flex items-start p-5 bg-white rounded-xl shadow-sm hover:shadow-md transition-all duration-300">
              <div class="w-12 h-12 gradient-bg rounded-lg flex items-center justify-center mr-4 flex-shrink-0">
                <i class="ri-grid-fill text-xl text-white"></i>
              </div>
              <div>
                <h4 class="font-semibold text-gray-800 mb-1">Integrasi OLT</h4>
                <p class="text-gray-600 text-sm">Dukungan berbagai merek OLT seperti ZTE, V-SOL, GLOBAL, dan lainnya.</p>
              </div>
            </div>

            <!-- Fitur 4 -->
            <div class="flex items-start p-5 bg-white rounded-xl shadow-sm hover:shadow-md transition-all duration-300">
              <div class="w-12 h-12 gradient-bg rounded-lg flex items-center justify-center mr-4 flex-shrink-0">
                <i class="ri-ticket-2-line text-xl text-white"></i>
              </div>
              <div>
                <h4 class="font-semibold text-gray-800 mb-1">Tiket</h4>
                <p class="text-gray-600 text-sm">Proses pemasangan dan support terpantau otomatis via WhatsApp.</p>
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

            <!-- Fitur 6 -->
            <div class="flex items-start p-5 bg-white rounded-xl shadow-sm hover:shadow-md transition-all duration-300">
              <div class="w-12 h-12 gradient-bg rounded-lg flex items-center justify-center mr-4 flex-shrink-0">
                <i class="ri-file-list-line text-xl text-white"></i>
              </div>
              <div>
                <h4 class="font-semibold text-gray-800 mb-1">Invoice</h4>
                <p class="text-gray-600 text-sm">Dukungan invoice otomatis/manual untuk pelanggan PPPoE & Hotspot.</p>
              </div>
            </div>

            <!-- Fitur 7 -->
            <div class="flex items-start p-5 bg-white rounded-xl shadow-sm hover:shadow-md transition-all duration-300">
              <div class="w-12 h-12 gradient-bg rounded-lg flex items-center justify-center mr-4 flex-shrink-0">
                <i class="ri-bank-card-line text-xl text-white"></i>
              </div>
              <div>
                <h4 class="font-semibold text-gray-800 mb-1">Payment Gateway</h4>
                <p class="text-gray-600 text-sm">Dukungan pembayaran otomatis via QRIS, OVO, Gopay, VA, dan lainnya.</p>
              </div>
            </div>

            <!-- Fitur 8 -->
            <div class="flex items-start p-5 bg-white rounded-xl shadow-sm hover:shadow-md transition-all duration-300">
              <div class="w-12 h-12 gradient-bg rounded-lg flex items-center justify-center mr-4 flex-shrink-0">
                <i class="ri-bank-line text-xl text-white"></i>
              </div>
              <div>
                <h4 class="font-semibold text-gray-800 mb-1">Transfer Bank Otomatis</h4>
                <p class="text-gray-600 text-sm">Otomatisasi pelunasan tagihan ke rekening pribadi/perusahaan.</p>
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

            <!-- Fitur 10 -->
            <div class="flex items-start p-5 bg-white rounded-xl shadow-sm hover:shadow-md transition-all duration-300">
              <div class="w-12 h-12 gradient-bg rounded-lg flex items-center justify-center mr-4 flex-shrink-0">
                <i class="ri-whatsapp-line text-xl text-white"></i>
              </div>
              <div>
                <h4 class="font-semibold text-gray-800 mb-1">WhatsApp Gateway</h4>
                <p class="text-gray-600 text-sm">Notifikasi otomatis via WhatsApp dari RLRadius atau nomor sendiri.</p>
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

            <!-- Fitur 13 -->
            <div class="flex items-start p-5 bg-white rounded-xl shadow-sm hover:shadow-md transition-all duration-300">
              <div class="w-12 h-12 gradient-bg rounded-lg flex items-center justify-center mr-4 flex-shrink-0">
                <i class="ri-bank-card-2-line text-xl text-white"></i>
              </div>
              <div>
                <h4 class="font-semibold text-gray-800 mb-1">Template Voucher</h4>
                <p class="text-gray-600 text-sm">Voucher siap pakai dengan desain rapi, bisa dimodifikasi sendiri.</p>
              </div>
            </div>

            <!-- Fitur 14 -->
            <div class="flex items-start p-5 bg-white rounded-xl shadow-sm hover:shadow-md transition-all duration-300">
              <div class="w-12 h-12 gradient-bg rounded-lg flex items-center justify-center mr-4 flex-shrink-0">
                <i class="ri-stack-line text-xl text-white"></i>
              </div>
              <div>
                <h4 class="font-semibold text-gray-800 mb-1">Tagihan Multifungsi</h4>
                <p class="text-gray-600 text-sm">Prabayar, pascabayar, addons, sistem berulang, dan lainnya.</p>
              </div>
            </div>

            <!-- Fitur 15 -->
            <div class="flex items-start p-5 bg-white rounded-xl shadow-sm hover:shadow-md transition-all duration-300">
              <div class="w-12 h-12 gradient-bg rounded-lg flex items-center justify-center mr-4 flex-shrink-0">
                <i class="ri-global-line text-xl text-white"></i>
              </div>
              <div>
                <h4 class="font-semibold text-gray-800 mb-1">Custom Domain</h4>
                <p class="text-gray-600 text-sm">Ganti domain aplikasi sesuai nama brand atau usaha anda.</p>
              </div>
            </div>

            <!-- Fitur 16 -->
            <div class="flex items-start p-5 bg-white rounded-xl shadow-sm hover:shadow-md transition-all duration-300">
              <div class="w-12 h-12 gradient-bg rounded-lg flex items-center justify-center mr-4 flex-shrink-0">
                <i class="ri-map-pin-line text-xl text-white"></i>
              </div>
              <div>
                <h4 class="font-semibold text-gray-800 mb-1">Map Pelanggan</h4>
                <p class="text-gray-600 text-sm">Peta pelanggan dengan status online/offline berbasis Google Maps.</p>
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
        <div class="bg-[#e0f2ff] p-8 rounded-xl shadow-sm card-hover transition-all duration-300 fade-element">
          <div class="w-16 h-16 bg-blue-100 rounded-full flex items-center justify-center mb-6">
            <i class="ri-server-fill text-3xl text-[#007BFF]"></i>
          </div>
          <h3 class="font-semibold text-xl mb-3 text-gray-800">VPN Server</h3>
          <p class="text-gray-600">Kami menyediakan banyak server VPN yang sudah saling terkoneksi satu sama lainnya, untuk menghubungkan router pelanggan ke server utama di datacenter, server VPN pilihan dengan latency dan rute terbaik.</p>
        </div>

        <div class="bg-[#fff2e0] p-8 rounded-xl shadow-sm card-hover transition-all duration-300 fade-element">
          <div class="w-16 h-16 bg-orange-100 rounded-full flex items-center justify-center mb-6">
            <i class="ri-database-fill text-3xl text-[#FF5733]"></i>
          </div>
          <h3 class="font-semibold text-xl mb-3 text-gray-800">Server Handal</h3>
          <p class="text-gray-600">Kami memiliki server sendiri yang belokasi di Data Center Indonesia, dengan spesifikasi yang handal dan mumpuni, didukung dengan koneksi yang stabil serta sistem keamanan yang terpercaya.</p>
        </div>

        <div class="bg-[#e0ffe0] p-8 rounded-xl shadow-sm card-hover transition-all duration-300 fade-element">
          <div class="w-16 h-16 bg-green-100 rounded-full flex items-center justify-center mb-6">
            <i class="ri-install-fill text-3xl text-[#28a745]"></i>
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
              <li>1. User Online lebih dari 10.000 tersedia paket Platinum yang dapat diorder dari halaman cloud manager.</li>
              <li>2. Langganan adalah klien PPPoE, DHCP dan Member Hotspot yang berlangganan bulanan dan memiliki sistem tagihan berkelanjutan.</li>
              <li>3. User Online adalah batas maksimal klien yang bisa terhubung ke RL Radius dengan flag Radius (R) di Mikrotik, meliputi: PPPoE, DHCP dan Hotspot.</li>
              <li>4. Daftar harga dan ketentuan paket di bawah ini dapat berubah sewaktu-waktu tanpa pemberitahuan!</li>
            </ol>
          </div>
        </div>
      </div>

      <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
        <!-- Paket BASIC -->
        <div class="bg-white p-6 rounded-xl shadow-sm hover:shadow-md transition-all duration-300 fade-element">
          <div class="text-center">
            <h3 class="text-xl font-bold text-gray-800 mb-2">RLCLOUD BASIC</h3>
            <div class="text-3xl font-bold text-[#3F8EFC] mb-4"><sup class="text-lg">Rp</sup>100.000<span class="text-lg font-normal"> / bln</span></div>
            <img src="assets/img/svg/cloud.svg" alt="Cloud Basic" class="mx-auto mb-6 w-40">
          </div>
          <ul class="space-y-3 mb-6">
            <li class="flex items-start">
              <i class="ri-check-line text-green-500 mt-1 mr-2"></i>
              <span>2 Router MikroTik</span>
            </li>
            <li class="flex items-start">
              <i class="ri-check-line text-green-500 mt-1 mr-2"></i>
              <span>200 Langganan</span>
            </li>
            <li class="flex items-start">
              <i class="ri-check-line text-green-500 mt-1 mr-2"></i>
              <span>5.000 Voucher</span>
            </li>
            <li class="flex items-start">
              <i class="ri-check-line text-green-500 mt-1 mr-2"></i>
              <span class="font-bold text-red-500">250 User Online</span>
            </li>
            <li class="flex items-start">
              <i class="ri-check-line text-green-500 mt-1 mr-2"></i>
              <span>Free VPN Radius</span>
            </li>
            <li class="flex items-start text-gray-400">
              <i class="ri-close-line mt-1 mr-2"></i>
              <span class="line-through">Free VPN Remote</span>
            </li>
            <li class="flex items-start text-gray-400">
              <i class="ri-close-line mt-1 mr-2"></i>
              <span class="line-through">WhatsApp notifikasi</span>
            </li>
            <li class="flex items-start text-gray-400">
              <i class="ri-close-line mt-1 mr-2"></i>
              <span class="line-through">Payment Gateway</span>
            </li>
            <li class="flex items-start text-gray-400">
              <i class="ri-close-line mt-1 mr-2"></i>
              <span class="line-through">Aplikasi client area</span>
            </li>
          </ul>
          <div class="text-center text-sm mb-4">
            <p class="text-gray-400 line-through">Rp1.200.000 / 12 Bln</p>
            <p class="text-green-600 font-bold">Rp1.000.000 / 12 Bln</p>
          </div>
          <a href="{{ route('login') }}" class="block w-full text-center px-4 py-3 border border-[#3F8EFC] text-[#3F8EFC] font-medium rounded-lg hover:bg-blue-50 transition">Berlangganan</a>
        </div>

        <!-- Paket PREMIUM -->
        <div class="bg-white p-6 rounded-xl shadow-lg pricing-highlight fade-element">
          <div class="text-center">
            <h3 class="text-xl font-bold text-[#3F8EFC] mb-2">RLCLOUD PREMIUM</h3>
            <div class="text-3xl font-bold text-[#3F8EFC] mb-4"><sup class="text-lg">Rp</sup>290.000<span class="text-lg font-normal"> / bln</span></div>
            <img src="assets/img/svg/cloud.svg" alt="Cloud Premium" class="mx-auto mb-6 w-40">
          </div>
          <ul class="space-y-3 mb-6">
            <li class="flex items-start">
              <i class="ri-check-line text-green-500 mt-1 mr-2"></i>
              <span>10 Router MikroTik</span>
            </li>
            <li class="flex items-start">
              <i class="ri-check-line text-green-500 mt-1 mr-2"></i>
              <span>500 Langganan</span>
            </li>
            <li class="flex items-start">
              <i class="ri-check-line text-green-500 mt-1 mr-2"></i>
              <span>30.000 Voucher</span>
            </li>
            <li class="flex items-start">
              <i class="ri-check-line text-green-500 mt-1 mr-2"></i>
              <span class="font-bold text-red-500">600 User Online</span>
            </li>
            <li class="flex items-start">
              <i class="ri-check-line text-green-500 mt-1 mr-2"></i>
              <span>Free VPN Radius</span>
            </li>
            <li class="flex items-start">
              <i class="ri-check-line text-green-500 mt-1 mr-2"></i>
              <span>Free VPN Remote</span>
            </li>
            <li class="flex items-start">
              <i class="ri-check-line text-green-500 mt-1 mr-2"></i>
              <span>WhatsApp notifikasi</span>
            </li>
            <li class="flex items-start">
              <i class="ri-check-line text-green-500 mt-1 mr-2"></i>
              <span>Payment Gateway</span>
            </li>
            <li class="flex items-start">
              <i class="ri-check-line text-green-500 mt-1 mr-2"></i>
              <span>Aplikasi client area</span>
            </li>
            <li class="flex items-start">
              <i class="ri-check-line text-green-500 mt-1 mr-2"></i>
              <span>Custom Domain</span>
            </li>
          </ul>
          <div class="text-center text-sm mb-4">
            <p class="text-gray-400 line-through">Rp3.540.000 / 12 Bln</p>
            <p class="text-green-600 font-bold">Rp3.000.000 / 12 Bln</p>
          </div>
          <a href="{{ route('login') }}" class="block w-full text-center px-4 py-3 gradient-bg text-white font-medium rounded-lg hover:opacity-90 transition">Berlangganan</a>
        </div>

        <!-- Paket ULTIMATE -->
        <div class="bg-white p-6 rounded-xl shadow-sm hover:shadow-md transition-all duration-300 fade-element">
          <div class="text-center">
            <h3 class="text-xl font-bold text-purple-600 mb-2">RLCLOUD ULTIMATE</h3>
            <div class="text-3xl font-bold text-purple-600 mb-4"><sup class="text-lg">Rp</sup>475.000<span class="text-lg font-normal"> / bln</span></div>
            <img src="assets/img/svg/cloud.svg" alt="Cloud Ultimate" class="mx-auto mb-6 w-40">
          </div>
          <ul class="space-y-3 mb-6">
            <li class="flex items-start">
              <i class="ri-check-line text-green-500 mt-1 mr-2"></i>
              <span>15 Router MikroTik</span>
            </li>
            <li class="flex items-start">
              <i class="ri-check-line text-green-500 mt-1 mr-2"></i>
              <span>700 Langganan</span>
            </li>
            <li class="flex items-start">
              <i class="ri-check-line text-green-500 mt-1 mr-2"></i>
              <span>50.000 Voucher</span>
            </li>
            <li class="flex items-start">
              <i class="ri-check-line text-green-500 mt-1 mr-2"></i>
              <span class="font-bold text-red-500">850 User Online</span>
            </li>
            <li class="flex items-start">
              <i class="ri-check-line text-green-500 mt-1 mr-2"></i>
              <span>Free VPN Radius</span>
            </li>
            <li class="flex items-start">
              <i class="ri-check-line text-green-500 mt-1 mr-2"></i>
              <span>Free VPN Remote</span>
            </li>
            <li class="flex items-start">
              <i class="ri-check-line text-green-500 mt-1 mr-2"></i>
              <span>WhatsApp notifikasi</span>
            </li>
            <li class="flex items-start">
              <i class="ri-check-line text-green-500 mt-1 mr-2"></i>
              <span>Payment Gateway</span>
            </li>
            <li class="flex items-start">
              <i class="ri-check-line text-green-500 mt-1 mr-2"></i>
              <span>Aplikasi client area</span>
            </li>
            <li class="flex items-start">
              <i class="ri-check-line text-green-500 mt-1 mr-2"></i>
              <span>Custom Domain</span>
            </li>
          </ul>
          <div class="text-center text-sm mb-4">
            <p class="text-gray-400 line-through">Rp5.700.000 / 12 Bln</p>
            <p class="text-green-600 font-bold">Rp4.500.000 / 12 Bln</p>
          </div>
          <a href="{{ route('login') }}" class="block w-full text-center px-4 py-3 border border-purple-600 text-purple-600 font-medium rounded-lg hover:bg-purple-50 transition">Berlangganan</a>
        </div>
      </div>
    </div>
  </section>

  <!-- Footer -->
  <footer id="footer" class="bg-gray-800 text-gray-300 py-12">
    <div class="container mx-auto px-6">
      <div class="grid grid-cols-1 md:grid-cols-2 gap-8 mb-8">
        <div>
          <h2 class="text-xl font-bold text-white mb-4 flex items-center">
            <i class="ri-global-line mr-2 text-[#3F8EFC]"></i> PT BORNEO NETWORK CENTER
          </h2>
          <p class="mb-4">Jl. Palm Raya, Ruko No. 6, RT 50 RW 07, Kel. Guntung Manggis, Landasan Ulin, Banjarbaru, Kalimantan Selatan, Indonesia</p>
          <div class="flex space-x-4">
            <a href="#" class="hover:text-white transition"><i class="ri-phone-fill"></i></a>
            <a href="#" class="hover:text-white transition"><i class="ri-mail-fill"></i></a>
          </div>
        </div>
        <div>
          <h3 class="text-lg font-semibold text-white mb-4">Sosial Media</h3>
          <div class="flex space-x-4">
            <a href="#" class="w-10 h-10 bg-gray-700 rounded-full flex items-center justify-center hover:bg-[#1DA1F2] hover:text-white transition">
              <i class="ri-twitter-fill"></i>
            </a>
            <a href="https://www.facebook.com/groups/rlradius" target="_blank" class="w-10 h-10 bg-gray-700 rounded-full flex items-center justify-center hover:bg-[#1877F2] hover:text-white transition">
              <i class="ri-facebook-fill"></i>
            </a>
            <a href="#" class="w-10 h-10 bg-gray-700 rounded-full flex items-center justify-center hover:bg-gradient-to-r from-[#F58529] via-[#DD2A7B] to-[#8134AF] hover:text-white transition">
              <i class="ri-instagram-line"></i>
            </a>
            <a href="https://www.youtube.com/watch?v=jnuILVPfKPg&list=PLVA91M9nFgixqwiNllm6CT9IPb8iFyFFl" target="_blank" class="w-10 h-10 bg-gray-700 rounded-full flex items-center justify-center hover:bg-[#FF0000] hover:text-white transition">
              <i class="ri-youtube-fill"></i>
            </a>
          </div>
        </div>
      </div>
      <div class="border-t border-gray-700 pt-6 text-center text-sm">
        &copy; 2025 <strong class="text-white">PT BORNEO NETWORK CENTER</strong>. All Rights Reserved.
      </div>
    </div>
  </footer>

  <!-- Back to top button -->
  <a href="#beranda" id="backToTop" class="fixed bottom-8 right-8 w-12 h-12 bg-[#3F8EFC] text-white rounded-full flex items-center justify-center shadow-lg opacity-0 invisible transition-all duration-300 hover:bg-[#2d7be8]">
    <i class="ri-arrow-up-line text-xl"></i>
  </a>

  <!-- JAVASCRIPT -->
<script>
  // Sticky Header on Scroll
  let lastScrollTop = 0;
  const header = document.getElementById('mainHeader');
  window.addEventListener("scroll", () => {
    const scrollTop = window.pageYOffset || document.documentElement.scrollTop;
    header.style.transform = scrollTop > lastScrollTop && scrollTop > 80 ? "translateY(-100%)" : "translateY(0)";
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
</script>
</body>
</html>