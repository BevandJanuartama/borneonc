<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>BNC</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <link href="https://cdn.jsdelivr.net/npm/remixicon@3.5.0/fonts/remixicon.css" rel="stylesheet">
</head>
<body class="bg-white text-gray-900">

  <!-- HEADER -->
  <header id="mainHeader" class="fixed top-0 left-0 w-full z-50 bg-[#E0F0F8] shadow transition-transform duration-500">
    <div class="max-w-7xl mx-auto flex items-center justify-between px-6 py-4">
      <h1 class="text-xl font-bold text-[#3F8EFC]">BORNEO NETWORK CENTER</h1>
      <button id="burgerBtn" class="text-3xl md:hidden">&#9776;</button>
      <nav class="hidden md:flex gap-6 font-semibold text-[#3F8EFC] items-center">
        <a href="#beranda">Beranda</a>
        <a href="#tentang">Tentang Kami</a>
        <a href="#fitur">Fitur</a>
        <a href="#harga">Harga</a>
        <a href="#kontak">Kontak</a>
        <a href="{{ route('login') }}" class="px-4 py-1 bg-[#3F8EFC] text-white rounded hover:bg-blue-700 transition">Login</a>
        <a href="{{ route('register') }}" class="px-4 py-1 border border-[#3F8EFC] text-[#3F8EFC] rounded hover:bg-blue-50 transition">Register</a>
      </nav>
    </div>
  </header>

  <!-- OVERLAY & SIDEBAR -->
  <div id="overlay" class="fixed inset-0 bg-black bg-opacity-40 z-40 hidden"></div>
  <div id="sidebar" class="fixed top-0 right-0 w-64 h-full bg-[#E0F0F8] shadow-lg z-50 transform translate-x-full transition-transform duration-300">
    <div class="p-6 space-y-4 text-lg font-semibold text-[#3F8EFC] mt-16">
      <a href="#beranda" class="block">Beranda</a>
      <a href="#tentang" class="block">Tentang Kami</a>
      <a href="#fitur" class="block">Fitur</a>
      <a href="#harga" class="block">Harga</a>
      <a href="#kontak" class="block">Kontak</a>
      <a href="{{ route('login') }}" class="block text-[#3F8EFC]">Login</a>
      <a href="{{ route('register') }}" class="block text-[#3F8EFC]">Register</a>
    </div>
  </div>

  <!-- HERO SECTION -->
  <section id="hero" class="py-32 bg-white">
    <div class="container mx-auto px-6 lg:flex lg:items-center">
      <div class="lg:w-1/2 mb-10 lg:mb-0">
        <h1 class="text-3xl font-bold mb-4">BILLING MIKROTIK <br> PPPoE DAN HOTSPOT</h1>
        <h2 class="text-xl mb-2">Aplikasi billing dan server radius yang powerfull</h2>
        <h2 class="text-xl">BILLING ISP RTRWNET DAN HOTSPOT</h2>
      </div>
      <div class="lg:w-1/2">
        <img src="assets/img/logotelkom.jpeg" class="w-full max-w-md mx-auto" alt="logo rl radius">
      </div>
    </div>
  </section>

  <!-- VALUES SECTION -->
  <section id="values" class="py-20 bg-gray-50">
    <div class="container mx-auto px-6">
      <header class="text-center mb-10">
        <p class="text-2xl font-semibold text-[#3F8EFC]">Kenapa memilih kami?</p>
      </header>

      <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
        <div class="text-center bg-white p-6 rounded-lg shadow">
          <img src="assets/img/svg/easy.svg" class="mx-auto mb-4" alt="rlradius mudah digunakan">
          <h3 class="text-xl font-bold mb-2">Easy to use</h3>
          <p>Fitur aplikasi lengkap serta mudah digunakan, desain aplikasi simpel, support multi platform serta berbasis cloud yang dapat diakses darimana saja dan kapan saja.</p>
        </div>

        <div class="text-center bg-white p-6 rounded-lg shadow">
          <img src="assets/img/svg/otomatis.svg" class="mx-auto mb-4" alt="billing perpanjangan pppoe otomatis">
          <h3 class="text-xl font-bold mb-2">Sistem Otomatis</h3>
          <p>Tagihan, notifikasi, isolir dan pelunasan tagihan secara otomatis dengan berbagai macam metode pembayaran yang sangat lengkap dan mudah digunakan.</p>
        </div>

        <div class="text-center bg-white p-6 rounded-lg shadow">
          <img src="assets/img/svg/terpusat.svg" class="mx-auto mb-4" alt="data terpusat">
          <h3 class="text-xl font-bold mb-2">Data Terpusat</h3>
          <p>Satu Aplikasi untuk banyak MikroTik. Klien Anda dapat terhubung ke jaringan dengan 1 akun dari mana saja, asalkan router sudah tersambung ke server Cloud RL Radius.</p>
        </div>
      </div>
    </div>
  </section>

  <!-- ======= Full Support Section ======= -->
    <section id="counts" class="counts">
      <div class="container" data-aos="fade-up">
        <div class="row">
          <div class="col-lg-12 col-md-12">
            <div class="count-box">
         
            <i class="ri-customer-service-fill" style="color: #15be56;"></i>
              <div>
                <span>  100% Gratis Support  </span>
                <p>Pelanggan akan dilayani langsung oleh teknisi, yang sudah bertahun tahun berkecimpung di dunia jaringan internet dalam menangani berbagai macam permasalahan, support yang kami berikan bersifat gratis selama permasalahan berkaitan dengan aplikasi RL Radius</p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section><!-- Full Support Section -->

    <!-- ======= Features Section ======= -->
<section id="fitur" class="features py-10 px-4">
  <div class="container mx-auto" data-aos="fade-up">
    
    <h3 class="text-2xl font-bold text-center mb-4">Fitur Unggulan Kami</h3>
    <hr class="mb-10">

    <div class="flex flex-wrap items-center">
      
      <!-- Gambar -->
      <div class="w-full xl:w-1/3 text-center mb-6 xl:mb-0" data-aos="fade-right" data-aos-delay="100">
        <img src="assets/img/svg/fitur.svg" class="mx-auto p-3" alt="fitur billing mikrotik rl radius">
      </div>

      <!-- Daftar Fitur -->
      <div class="w-full xl:w-2/3">
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
          
          <!-- Fitur 1 -->
          <div class="icon-box" data-aos="fade-up" data-aos-delay="100">
            <i class="ri-award-fill text-2xl text-blue-600"></i>
            <div>
              <h4 class="font-semibold">Terpercaya dan teruji</h4>
              <p>Sudah digunakan oleh berbagai skala usaha di seluruh Indonesia.</p>
            </div>
          </div>

          <!-- Fitur 2 -->
          <div class="icon-box" data-aos="fade-up" data-aos-delay="150">
            <i class="ri-cpu-line text-2xl text-blue-600"></i>
            <div>
              <h4 class="font-semibold">Resource Mikrotik Ringan</h4>
              <p>Data tersimpan di Cloud Radius sehingga tidak membebani Mikrotik.</p>
            </div>
          </div>

          <!-- Fitur 3 -->
          <div class="icon-box" data-aos="fade-up" data-aos-delay="200">
            <i class="ri-grid-fill text-2xl text-blue-600"></i>
            <div>
              <h4 class="font-semibold">Integrasi OLT</h4>
              <p>Dukungan berbagai merek OLT seperti ZTE, V-SOL, GLOBAL, dan lainnya.</p>
            </div>
          </div>

          <!-- Fitur 4 -->
          <div class="icon-box" data-aos="fade-up" data-aos-delay="250">
            <i class="ri-ticket-2-line text-2xl text-blue-600"></i>
            <div>
              <h4 class="font-semibold">Tiket</h4>
              <p>Proses pemasangan dan support terpantau otomatis via WhatsApp.</p>
            </div>
          </div>

          <!-- Fitur 5 -->
          <div class="icon-box" data-aos="fade-up" data-aos-delay="300">
            <i class="ri-database-2-line text-2xl text-blue-600"></i>
            <div>
              <h4 class="font-semibold">Data lebih Aman</h4>
              <p>Data tetap aman walau perangkat Mikrotik rusak atau diganti.</p>
            </div>
          </div>

          <!-- Fitur 6 -->
          <div class="icon-box" data-aos="fade-up" data-aos-delay="350">
            <i class="ri-file-list-line text-2xl text-blue-600"></i>
            <div>
              <h4 class="font-semibold">Invoice</h4>
              <p>Dukungan invoice otomatis/manual untuk pelanggan PPPoE & Hotspot.</p>
            </div>
          </div>

          <!-- Fitur 7 -->
          <div class="icon-box" data-aos="fade-up" data-aos-delay="400">
            <i class="ri-bank-card-line text-2xl text-blue-600"></i>
            <div>
              <h4 class="font-semibold">Payment Gateway</h4>
              <p>Dukungan pembayaran otomatis via QRIS, OVO, Gopay, VA, dan lainnya.</p>
            </div>
          </div>

          <!-- Fitur 8 -->
          <div class="icon-box" data-aos="fade-up" data-aos-delay="450">
            <i class="ri-bank-line text-2xl text-blue-600"></i>
            <div>
              <h4 class="font-semibold">Transfer Bank Otomatis</h4>
              <p>Otomatisasi pelunasan tagihan ke rekening pribadi/perusahaan.</p>
            </div>
          </div>

          <!-- Fitur 9 -->
          <div class="icon-box" data-aos="fade-up" data-aos-delay="500">
            <i class="ri-team-line text-2xl text-blue-600"></i>
            <div>
              <h4 class="font-semibold">Sistem Kemitraan</h4>
              <p>Mitra mengelola pelanggannya sendiri & bisa topup otomatis.</p>
            </div>
          </div>

          <!-- Fitur 10 -->
          <div class="icon-box" data-aos="fade-up" data-aos-delay="550">
            <i class="ri-whatsapp-line text-2xl text-blue-600"></i>
            <div>
              <h4 class="font-semibold">WhatsApp Gateway</h4>
              <p>Notifikasi otomatis via WhatsApp dari RLRadius atau nomor sendiri.</p>
            </div>
          </div>

          <!-- Fitur 11 -->
          <div class="icon-box" data-aos="fade-up" data-aos-delay="600">
            <i class="ri-file-chart-line text-2xl text-blue-600"></i>
            <div>
              <h4 class="font-semibold">Laporan Transaksi</h4>
              <p>Rekap lengkap: penjualan, komisi mitra, pemasukan & pengeluaran.</p>
            </div>
          </div>

          <!-- Fitur 12 -->
          <div class="icon-box" data-aos="fade-up" data-aos-delay="650">
            <i class="ri-file-excel-2-line text-2xl text-blue-600"></i>
            <div>
              <h4 class="font-semibold">Export & Import</h4>
              <p>Mendukung Excel untuk ekspor & impor data ke aplikasi lain.</p>
            </div>
          </div>

          <!-- Fitur 13 -->
          <div class="icon-box" data-aos="fade-up" data-aos-delay="700">
            <i class="ri-bank-card-2-line text-2xl text-blue-600"></i>
            <div>
              <h4 class="font-semibold">Template Voucher</h4>
              <p>Voucher siap pakai dengan desain rapi, bisa dimodifikasi sendiri.</p>
            </div>
          </div>

          <!-- Fitur 14 -->
          <div class="icon-box" data-aos="fade-up" data-aos-delay="750">
            <i class="ri-stack-line text-2xl text-blue-600"></i>
            <div>
              <h4 class="font-semibold">Tagihan Multifungsi</h4>
              <p>Prabayar, pascabayar, addons, sistem berulang, dan lainnya.</p>
            </div>
          </div>

          <!-- Fitur 15 -->
          <div class="icon-box" data-aos="fade-up" data-aos-delay="800">
            <i class="ri-global-line text-2xl text-blue-600"></i>
            <div>
              <h4 class="font-semibold">Custom Domain</h4>
              <p>Ganti domain aplikasi sesuai nama brand atau usaha anda.</p>
            </div>
          </div>

          <!-- Fitur 16 -->
          <div class="icon-box" data-aos="fade-up" data-aos-delay="850">
            <i class="ri-map-pin-line text-2xl text-blue-600"></i>
            <div>
              <h4 class="font-semibold">Map Pelanggan</h4>
              <p>Peta pelanggan dengan status online/offline berbasis Google Maps.</p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<!-- End Features Section -->


    <!-- ======= Services Section ======= -->
<section id="services" class="services" style="padding: 60px 0;">
  <div class="container">
    <header class="section-header" style="text-align: center; margin-bottom: 30px;">
      <p style="font-size: 32px; font-weight: bold;">Fasilitas Pendukung</p>
    </header>

    <hr>

    <div class="row gy-4">
      <div class="col-lg-4 col-md-6 fade-element">
        <div class="service-box" style="background: #e0f2ff; padding: 20px; border-radius: 12px; box-shadow: 0 4px 12px rgba(0,0,0,0.1); transition: transform 0.5s ease, opacity 0.5s;">
          <i class="ri-server-fill icon" style="font-size: 40px; color: #007BFF;"></i>
          <h3>VPN Server</h3>
          <p>Kami menyediakan banyak server VPN yang sudah saling terkoneksi satu sama lainnya, untuk menghubungkan router pelanggan ke server utama di datacenter, server VPN pilihan dengan latency dan rute terbaik</p>
        </div>
      </div>

      <div class="col-lg-4 col-md-6 fade-element">
        <div class="service-box" style="background: #fff2e0; padding: 20px; border-radius: 12px; box-shadow: 0 4px 12px rgba(0,0,0,0.1); transition: transform 0.5s ease, opacity 0.5s;">
          <i class="ri-database-fill icon" style="font-size: 40px; color: #FF5733;"></i>
          <h3>Server Handal</h3>
          <p>Kami memiliki server sendiri yang belokasi di Data Center Indonesia, dengan spesifikasi yang handal dan mumpuni, didukung dengan koneksi yang stabil serta sistem keamanan yang terpercaya</p>
        </div>
      </div>

      <div class="col-lg-4 col-md-6 fade-element">
        <div class="service-box" style="background: #e0ffe0; padding: 20px; border-radius: 12px; box-shadow: 0 4px 12px rgba(0,0,0,0.1); transition: transform 0.5s ease, opacity 0.5s;">
          <i class="ri-install-fill icon" style="font-size: 40px; color: #28a745;"></i>
          <h3>Backup Otomatis</h3>
          <p>Server kami dilengkapi dengan Multi Storage Skala Enterprise dengan sistem RAID dan Mirror, backup otomatis mesin container, backup database dan file file penting secara terjadwal dan otomatis</p>
        </div>
      </div>
    </div>
  </div>
</section>
<!-- End Services Section -->

   <!-- ======= Pricing Section ======= -->
<section id="harga" class="pricing py-5 bg-light">

  <div class="container">

    <!-- Header -->
    <header class="section-header text-center mb-4">
      <h2 class="fw-bold">Harga Berlangganan</h2>
    </header>

    <!-- Alert Informasi -->
    <div class="alert alert-danger" role="alert">
      <ol class="fw-bold mt-2 mb-0">
        <li>User Online lebih dari 10.000 tersedia paket Platinum yang dapat diorder dari halaman cloud manager.</li>
        <li>Langganan adalah klien PPPoE, DHCP dan Member Hotspot yang berlangganan bulanan dan memiliki sistem tagihan berkelanjutan.</li>
        <li>User Online adalah batas maksimal klien yang bisa terhubung ke RL Radius dengan flag Radius (R) di Mikrotik, meliputi: PPPoE, DHCP dan Hotspot.</li>
        <li>Daftar harga dan ketentuan paket di bawah ini dapat berubah sewaktu-waktu tanpa pemberitahuan!</li>
      </ol>
    </div>

      <!-- Paket BASIC -->
      <div class="col-lg-4 col-md-6">
        <div class="box h-100 text-center p-4 bg-white rounded shadow-sm">
          <h3 class="text-dark">RLCLOUD BASIC</h3>
          <div class="price text-primary fs-4"><sup>Rp</sup>100.000<span> / bln</span></div>
          <img src="assets/img/svg/cloud.svg" alt="Cloud Basic" width="250" class="img-fluid my-3">
          <ul class="list-unstyled text-start">
            <li>2 Router MikroTik</li>
            <li>200 Langganan</li>
            <li>5.000 Voucher</li>
            <li class="text-danger fw-bold">250 User Online</li>
            <li>Free VPN Radius</li>
            <li class="text-muted text-decoration-line-through">Free VPN Remote</li>
            <li class="text-muted text-decoration-line-through">WhatsApp notifikasi</li>
            <li class="text-muted text-decoration-line-through">Payment Gateway</li>
            <li class="text-muted text-decoration-line-through">Aplikasi client area</li>
            <li class="text-muted">Rp1.200.000 / 12 Bln</li>
            <li class="text-success fw-bold">Rp1.000.000 / 12 Bln</li>
          </ul>
          <a href="{{ route('login') }}" class="btn btn-info mt-3">Berlangganan</a>
        </div>
      </div>

      <!-- Paket PREMIUM -->
      <div class="col-lg-4 col-md-6">
        <div class="box h-100 text-center p-4 bg-white rounded shadow-sm">
          <h3 class="text-warning">RLCLOUD PREMIUM</h3>
          <div class="price text-primary fs-4"><sup>Rp</sup>290.000<span> / bln</span></div>
          <img src="assets/img/svg/cloud.svg" alt="Cloud Premium" width="250" class="img-fluid my-3">
          <ul class="list-unstyled text-start">
            <li>10 Router MikroTik</li>
            <li>500 Langganan</li>
            <li>30.000 Voucher</li>
            <li class="text-danger fw-bold">600 User Online</li>
            <li>Free VPN Radius</li>
            <li>Free VPN Remote</li>
            <li>WhatsApp notifikasi</li>
            <li>Payment Gateway</li>
            <li>Aplikasi client area</li>
            <li>Custom Domain</li>
            <li class="text-muted">Rp3.540.000 / 12 Bln</li>
            <li class="text-success fw-bold">Rp3.000.000 / 12 Bln</li>
          </ul>
          <a href="{{ route('login') }}" class="btn btn-info mt-3">Berlangganan</a>
        </div>
      </div>

      <!-- Paket ULTIMATE -->
      <div class="col-lg-4 col-md-6">
        <div class="box h-100 text-center p-4 bg-white rounded shadow-sm">
          <h3 class="text-purple">RLCLOUD ULTIMATE</h3>
          <div class="price text-primary fs-4"><sup>Rp</sup>475.000<span> / bln</span></div>
          <img src="assets/img/svg/cloud.svg" alt="Cloud Ultimate" width="250" class="img-fluid my-3">
          <ul class="list-unstyled text-start">
            <li>15 Router MikroTik</li>
            <li>700 Langganan</li>
            <li>50.000 Voucher</li>
            <li class="text-danger fw-bold">850 User Online</li>
            <li>Free VPN Radius</li>
            <li>Free VPN Remote</li>
            <li>WhatsApp notifikasi</li>
            <li>Payment Gateway</li>
            <li>Aplikasi client area</li>
            <li>Custom Domain</li>
            <li class="text-muted">Rp5.700.000 / 12 Bln</li>
            <li class="text-success fw-bold">Rp4.500.000 / 12 Bln</li>
          </ul>
          <a href="{{ route('login') }}" class="btn btn-info mt-3">Berlangganan</a>
        </div>
      </div>
    </div>
  </div>
</section>
<!-- End Pricing Section -->

<!-- ======= Footer ======= -->
  <footer id="footer" class="footer">

    <div class="footer-top">
      <div class="container">
        <div class="row gy-4">
          <div class="col-lg-8 col-md-12 footer-info">
              <span> PT BORNEO NETWORK CENTER</span>
            </a>
            <p>Address : Jl. Palm Raya, Depan Griya Mawar Asri, Ruko No. 6, RT 50 RW 07, Kel. Guntung Manggis, Kec. Landasan Ulin, Banjarbaru, Kalimantan Selatan, Indonesia</p>
            <div class="social-links mt-3">
              <a href="#" class="twitter"><i class="bi bi-twitter"></i></a>
              <a href="https://www.facebook.com/groups/rlradius"  target="blank" class="facebook"><i class="bi bi-facebook"></i></a>
              <a href="#" class="instagram"><i class="bi bi-instagram bx bxl-instagram"></i></a>
              <a href="https://www.youtube.com/watch?v=jnuILVPfKPg&list=PLVA91M9nFgixqwiNllm6CT9IPb8iFyFFl" target="blank" class="youtube"><i class="bi bi-youtube bx bxl-youtube"></i></a>
            </div>
          </div>

        

        </div>
      </div>
    </div>

    <div class="container">
      <div class="copyright">
        &copy; Copyright  <strong><span> PT BORNEO NETWORK CENTER</span></strong>. All Rights Reserved
      </div>
      <div class="credits">
        <!-- All the links in the footer should remain intact. -->
        <!-- You can delete the links only if you purchased the pro version. -->
        <!-- Licensing information: https://bootstrapmade.com/license/ -->
        <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/flexstart-bootstrap-startup-template/ 
        Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a> -->
      </div>
    </div>


  </footer>

  <!-- JAVASCRIPT -->
<script>
  // Sticky Header on Scroll
  let lastScrollTop = 0;
  const header = document.getElementById('mainHeader');
  window.addEventListener("scroll", () => {
    const scrollTop = window.pageYOffset || document.documentElement.scrollTop;
    header.style.transform = scrollTop > lastScrollTop && scrollTop > 80 ? "translateY(-100%)" : "translateY(0)";
    lastScrollTop = scrollTop <= 0 ? 0 : scrollTop;
  });

  // Burger Menu Toggle
  const burgerBtn = document.getElementById('burgerBtn');
  const sidebar = document.getElementById('sidebar');
  const overlay = document.getElementById('overlay');

  burgerBtn.addEventListener('click', () => {
    sidebar.classList.remove('translate-x-full');
    overlay.classList.remove('hidden');
  });

  overlay.addEventListener('click', () => {
    sidebar.classList.add('translate-x-full');
    overlay.classList.add('hidden');
  });

  // =============================
  // FlexStart Template Script
  // =============================
  (function () {
    "use strict";

    const select = (el, all = false) => {
      el = el.trim();
      return all ? [...document.querySelectorAll(el)] : document.querySelector(el);
    }

    const on = (type, el, listener, all = false) => {
      const elements = select(el, all);
      if (elements) {
        if (all) elements.forEach(e => e.addEventListener(type, listener));
        else elements.addEventListener(type, listener);
      }
    }

    const onscroll = (el, listener) => {
      el.addEventListener('scroll', listener);
    }

    // Navbar links active state on scroll
    let navbarlinks = select('#navbar .scrollto', true);
    const navbarlinksActive = () => {
      let position = window.scrollY + 200;
      navbarlinks.forEach(navbarlink => {
        if (!navbarlink.hash) return;
        let section = select(navbarlink.hash);
        if (!section) return;
        if (position >= section.offsetTop && position <= (section.offsetTop + section.offsetHeight)) {
          navbarlink.classList.add('active');
        } else {
          navbarlink.classList.remove('active');
        }
      });
    }
    window.addEventListener('load', navbarlinksActive);
    onscroll(document, navbarlinksActive);

    // Scroll to with offset
    const scrollto = (el) => {
      let header = select('#header');
      let offset = header.offsetHeight;

      if (!header.classList.contains('header-scrolled')) {
        offset -= 10;
      }

      let elementPos = select(el).offsetTop;
      window.scrollTo({
        top: elementPos - offset,
        behavior: 'smooth'
      });
    }

    // Toggle header-scrolled class
    let selectHeader = select('#header');
    if (selectHeader) {
      const headerScrolled = () => {
        if (window.scrollY > 100) {
          selectHeader.classList.add('header-scrolled');
        } else {
          selectHeader.classList.remove('header-scrolled');
        }
      }
      window.addEventListener('load', headerScrolled);
      onscroll(document, headerScrolled);
    }

    // Back to top button
    let backtotop = select('.back-to-top');
    if (backtotop) {
      const toggleBacktotop = () => {
        backtotop.classList.toggle('active', window.scrollY > 100);
      }
      window.addEventListener('load', toggleBacktotop);
      onscroll(document, toggleBacktotop);
    }

    // Mobile nav toggle
    on('click', '.mobile-nav-toggle', function (e) {
      select('#navbar').classList.toggle('navbar-mobile');
      this.classList.toggle('bi-list');
      this.classList.toggle('bi-x');
    });

    // Mobile nav dropdowns activate
    on('click', '.navbar .dropdown > a', function (e) {
      if (select('#navbar').classList.contains('navbar-mobile')) {
        e.preventDefault();
        this.nextElementSibling.classList.toggle('dropdown-active');
      }
    }, true);

    // Scroll with offset on .scrollto links
    on('click', '.scrollto', function (e) {
      if (select(this.hash)) {
        e.preventDefault();

        let navbar = select('#navbar');
        if (navbar.classList.contains('navbar-mobile')) {
          navbar.classList.remove('navbar-mobile');
          let navbarToggle = select('.mobile-nav-toggle');
          navbarToggle.classList.toggle('bi-list');
          navbarToggle.classList.toggle('bi-x');
        }
        scrollto(this.hash);
      }
    }, true);

    // Scroll to section on page load if hash exists
    window.addEventListener('load', () => {
      if (window.location.hash && select(window.location.hash)) {
        scrollto(window.location.hash);
      }
    });

    // Clients Slider
    new Swiper('.clients-slider', {
      speed: 200,
      loop: true,
      autoplay: {
        delay: 500,
        disableOnInteraction: false
      },
      slidesPerView: 'auto',
      pagination: {
        el: '.swiper-pagination',
        type: 'bullets',
        clickable: true
      },
      breakpoints: {
        320: { slidesPerView: 2, spaceBetween: 40 },
        480: { slidesPerView: 3, spaceBetween: 60 },
        640: { slidesPerView: 4, spaceBetween: 80 },
        992: { slidesPerView: 6, spaceBetween: 120 }
      }
    });

    // Portfolio isotope filter
    window.addEventListener('load', () => {
      let portfolioContainer = select('.portfolio-container');
      if (portfolioContainer) {
        let portfolioIsotope = new Isotope(portfolioContainer, {
          itemSelector: '.portfolio-item',
          layoutMode: 'fitRows'
        });

        let portfolioFilters = select('#portfolio-flters li', true);

        on('click', '#portfolio-flters li', function (e) {
          e.preventDefault();
          portfolioFilters.forEach(el => el.classList.remove('filter-active'));
          this.classList.add('filter-active');

          portfolioIsotope.arrange({
            filter: this.getAttribute('data-filter')
          });
          aos_init();
        }, true);
      }
    });

    // Portfolio lightbox
    const portfolioLightbox = GLightbox({
      selector: '.portfokio-lightbox'
    });

    // Portfolio details slider
    new Swiper('.portfolio-details-slider', {
      speed: 100,
      autoplay: {
        delay: 1000,
        disableOnInteraction: false
      },
      pagination: {
        el: '.swiper-pagination',
        type: 'bullets',
        clickable: true
      }
    });

    // Testimonials slider
    new Swiper('.testimonials-slider', {
      speed: 100,
      loop: true,
      autoplay: {
        delay: 1000,
        disableOnInteraction: false
      },
      slidesPerView: 'auto',
      pagination: {
        el: '.swiper-pagination',
        type: 'bullets',
        clickable: true
      },
      breakpoints: {
        320: { slidesPerView: 1, spaceBetween: 40 },
        1200: { slidesPerView: 3 }
      }
    });

    // Animation on scroll
    function aos_init() {
      AOS.init({
        duration: 500,
        easing: "ease-in-out",
        once: true,
        mirror: false
      });
    }

    window.addEventListener('load', () => {
      aos_init();
    });

  })();
</script>


</body>
</html>
