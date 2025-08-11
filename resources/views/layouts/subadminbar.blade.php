<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>BNC CLOUD MANAGER</title>

  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" crossorigin="anonymous" referrerpolicy="no-referrer" />

  <!-- Tailwind CSS -->
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

  <!-- ✅ Mobile Header -->
  <div class="flex items-center justify-between p-4 md:hidden fixed top-0 left-0 right-0 z-40 bg-white shadow">
    <!-- Burger -->
    <button id="burgerButton" class="text-purple-500 focus:outline-none">
      <svg class="w-6 h-6" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"
          xmlns="http://www.w3.org/2000/svg">
        <path stroke-linecap="round" stroke-linejoin="round"
              d="M4 6h16M4 12h16M4 18h16"></path>
      </svg>
    </button>

    <!-- Spacer (biar teks ke kanan) -->
    <div class="flex-1 text-right">
      <h1 class="text-base font-bold text-[#3F8EFC]">BNC CLOUD MANAGER</h1>
    </div>
  </div>

  <!-- Overlay -->
  <div id="overlay" class="fixed inset-0 bg-black bg-opacity-40 z-40 hidden md:hidden"></div>

  <!-- Sidebar -->
  <aside id="sidebar" class="w-64 sidebar-gradient h-screen shadow-xl fixed left-0 top-0 z-50 flex flex-col justify-between transform -translate-x-full transition-transform duration-300 md:translate-x-0">
    <!-- Bagian Atas -->
    <div>
      <div class="p-6 border-b border-white/20">
        <h1 class="text-xl font-bold text-white flex items-center">
          <i class="fas fa-cloud mr-3 text-2xl"></i> BNC CLOUD MANAGER
        </h1>
      </div>

      {{-- <div class="p-6 flex items-center space-x-4 border-b border-white/20">
        <div class="w-12 h-12 bg-white/20 rounded-full flex items-center justify-center">
          <i class="fas fa-user text-white text-xl"></i>
        </div>
        <div>
          @if (Auth::check())
            <span class="font-semibold text-white block">{{ Auth::user()->name }}</span>
          @else
            <span class="font-semibold text-white block">Guest</span>
          @endif
        </div>
      </div> --}}

      <nav class="p-4">
      <ul class="space-y-2">
        <!-- Dashboard -->
        <li>
          <a href="/dashboard"
            class="menu-item flex items-center space-x-3 p-3 rounded-lg 
            {{ Request::is('dashboard') ? 'text-white bg-white/10' : 'text-white/80 hover:text-white' }}">
            <i class="fas fa-home w-5"></i><span>Dashboard</span>
          </a>
        </li>

        <!-- Router -->
        <li>
          <a href="/router"
            class="menu-item flex items-center space-x-3 p-3 rounded-lg 
            {{ Request::is('router*') ? 'text-white bg-white/10' : 'text-white/80 hover:text-white' }}">
            <i class="fas fa-network-wired w-5"></i><span>Router</span>
          </a>
        </li>

        <!-- Mitra -->
        <li>
          <a href="/reseller"
            class="menu-item flex items-center space-x-3 p-3 rounded-lg 
            {{ Request::is('mitra*') ? 'text-white bg-white/10' : 'text-white/80 hover:text-white' }}">
            <i class="fas fa-handshake w-5"></i><span>Mitra</span>
          </a>
        </li>

        <!-- Voucher -->
        <li>
        <button 
            class="menu-item flex items-center justify-between w-full p-3 rounded-lg 
                {{ request()->is('voucher*') ? 'bg-white/20 text-white font-semibold' : 'text-white/80 hover:text-white' }}" 
            onclick="toggleSubmenu('voucherMenu')">
            <span class="flex items-center space-x-3">
            <i class="fas fa-ticket-alt w-5"></i><span>Voucher</span>
            </span>
            <i class="fas fa-chevron-down"></i>
        </button>
        <ul id="voucherMenu" class="ml-8 mt-1 {{ request()->is('voucher*') ? '' : 'hidden' }} space-y-1">
            <li>
            <a href="/voucher"
                class="menu-item block p-2 rounded-lg 
                {{ request()->routeIs('voucher.index') ? 'text-white bg-white/10' : 'text-white/80 hover:text-white' }}">
                Profile Voucher
            </a>
            </li>
            <li>
            <a href="/voucher/stok"
                class="menu-item block p-2 rounded-lg 
                {{ request()->routeIs('voucher.stok') ? 'text-white bg-white/10' : 'text-white/80 hover:text-white' }}">
                Stok Voucher
            </a>
            </li>
        </ul>
        </li>



        <!-- Tiket -->
        <li>
          <a href="/tiket"
            class="menu-item flex items-center space-x-3 p-3 rounded-lg 
            {{ Request::is('tiket*') ? 'text-white bg-white/10' : 'text-white/80 hover:text-white' }}">
            <i class="fas fa-envelope-open-text w-5"></i><span>Tiket</span>
          </a>
        </li>

        <!-- Transaksi -->
        <li>
          <a href="/transaksi"
            class="menu-item flex items-center space-x-3 p-3 rounded-lg 
            {{ Request::is('transaksi*') ? 'text-white bg-white/10' : 'text-white/80 hover:text-white' }}">
            <i class="fas fa-exchange-alt w-5"></i><span>Transaksi</span>
          </a>
        </li>

        <!-- Setting -->
        <li>
          <a href="/setting"
            class="menu-item flex items-center space-x-3 p-3 rounded-lg 
            {{ Request::is('setting*') ? 'text-white bg-white/10' : 'text-white/80 hover:text-white' }}">
            <i class="fas fa-cog w-5"></i><span>Setting</span>
          </a>
        </li>

        <!-- Admin -->
        <li>
          <a href="/admin"
            class="menu-item flex items-center space-x-3 p-3 rounded-lg 
            {{ Request::is('admin*') ? 'text-white bg-white/10' : 'text-white/80 hover:text-white' }}">
            <i class="fas fa-user-shield w-5"></i><span>Admin</span>
          </a>
        </li>

        <!-- Logs -->
        <li>
          <a href="/logs"
            class="menu-item flex items-center space-x-3 p-3 rounded-lg 
            {{ Request::is('logs*') ? 'text-white bg-white/10' : 'text-white/80 hover:text-white' }}">
            <i class="fas fa-history w-5"></i><span>Logs</span>
          </a>
        </li>

        <!-- Logout -->
        <li class="pt-4 border-t border-white/20 mt-4">
          <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button class="menu-item flex items-center space-x-3 p-3 rounded-lg text-white/80 hover:text-red-300 w-full text-left">
              <i class="fas fa-sign-out-alt w-5"></i><span>Logout</span>
            </button>
          </form>
        </li>
      </ul>
    </nav>

    <script>
      function toggleSubmenu(id) {
        document.getElementById(id).classList.toggle('hidden');
      }
    </script>


    <!-- Footer Sidebar -->
    <div class="text-white text-xs px-6 py-4 border-t border-white/20">
      <div class="mb-2 font-semibold">PT BORNEO NETWORK CENTER</div>
      <p class="mb-1">Jl. Palm Raya, Ruko No. 6,<br>RT 50 RW 07, Guntung Manggis, Banjarbaru</p>
      <div class="flex space-x-3 mt-3">
        <a href="https://www.facebook.com/groups/rlradius" target="_blank" class="hover:text-blue-300">
          <i class="fab fa-facebook-f"></i>
        </a>
        <a href="#" class="hover:text-pink-300">
          <i class="fab fa-instagram"></i>
        </a>
        <a href="https://www.youtube.com/watch?v=jnuILVPfKPg&list=PLVA91M9nFgixqwiNllm6CT9IPb8iFyFFl" target="_blank" class="hover:text-red-400">
          <i class="fab fa-youtube"></i>
        </a>
      </div>
    </div>
  </aside>

  <!-- Script Toggle -->
  <script>
    document.addEventListener('DOMContentLoaded', () => {
      const burger = document.getElementById('burgerButton');
      const sidebar = document.getElementById('sidebar');
      const overlay = document.getElementById('overlay');

      burger.addEventListener('click', () => {
        sidebar.classList.toggle('-translate-x-full');
        overlay.classList.toggle('hidden');
      });

      overlay.addEventListener('click', () => {
        sidebar.classList.add('-translate-x-full');
        overlay.classList.add('hidden');
      });
    });
  </script>

</body>
</html>

