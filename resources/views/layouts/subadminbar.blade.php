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
    /* animasi icon chevron */
    .fa-chevron-down {
      transition: transform 0.3s ease;
    }
    .rotate-180 {
      transform: rotate(180deg);
    }
    /* state aktif */
    .active {
      background: rgba(255, 255, 255, 0.2) !important;
      color: #fff !important;
      font-weight: 600;
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

    <div class="flex-1 text-right">
      <h1 class="text-base font-bold text-[#3F8EFC]">BNC CLOUD MANAGER</h1>
    </div>
  </div>

  <!-- Overlay -->
  <div id="overlay" class="fixed inset-0 bg-black bg-opacity-40 z-40 hidden md:hidden"></div>

  <!-- Sidebar -->
  <aside id="sidebar" class="w-64 sidebar-gradient h-screen shadow-xl fixed left-0 top-0 z-50 flex flex-col justify-between transform -translate-x-full transition-transform duration-300 md:translate-x-0">
    <div>
      <div class="p-6 border-b border-white/20">
        <h1 class="text-xl font-bold text-white flex items-center">
          <i class="fas fa-cloud mr-3 text-2xl"></i> BNC CLOUD MANAGER
        </h1>
      </div>

      <nav class="p-4">
        <ul class="space-y-2">
          <!-- Dashboard -->
          <li>
            <a href="/dashboard"
              class="menu-item flex items-center space-x-3 p-3 rounded-lg text-white/80 hover:text-white">
              <i class="fas fa-home w-5"></i><span>Dashboard</span>
            </a>
          </li>

          <!-- Router -->
          <li>
            <a href="/routers"
              class="menu-item flex items-center space-x-3 p-3 rounded-lg text-white/80 hover:text-white">
              <i class="fas fa-network-wired w-5"></i><span>Router</span>
            </a>
          </li>

          <!-- Mitra -->
          <li>
            <a href="/reseller"
              class="menu-item flex items-center space-x-3 p-3 rounded-lg text-white/80 hover:text-white">
              <i class="fas fa-handshake w-5"></i><span>Mitra</span>
            </a>
          </li>

          <!-- Voucher -->
          <li>
            <button 
              class="menu-item flex items-center justify-between w-full p-3 rounded-lg text-white/80 hover:text-white" 
              onclick="toggleSubmenu('voucherMenu', this)">
              <span class="flex items-center space-x-3">
                <i class="fas fa-ticket-alt w-5"></i><span>Voucher</span>
              </span>
              <i class="fas fa-chevron-down"></i>
            </button>
            <ul id="voucherMenu" class="ml-8 mt-1 hidden space-y-1">
              <li>
                <a href="/voucher"
                   class="menu-item block p-2 rounded-lg text-white/80 hover:text-white">
                  Profile Voucher
                </a>
              </li>
              <li>
                <a href="/stokvoucher"
                   class="menu-item block p-2 rounded-lg text-white/80 hover:text-white">
                  Stok Voucher
                </a>
              </li>
            </ul>
          </li>

          <!-- Transaksi -->
          <li>
            <a href="/transaksi"
              class="menu-item flex items-center space-x-3 p-3 rounded-lg text-white/80 hover:text-white">
              <i class="fas fa-exchange-alt w-5"></i><span>Transaksi</span>
            </a>
          </li>

          <!-- Info -->
          <li>
            <a href="/info"
              class="menu-item flex items-center space-x-3 p-3 rounded-lg text-white/80 hover:text-white">
              <i class="fas fa-info-circle w-5"></i><span>Info</span>
            </a>
          </li>

          <!-- Admin -->
          <li>
            <a href="/admin"
              class="menu-item flex items-center space-x-3 p-3 rounded-lg text-white/80 hover:text-white">
              <i class="fas fa-user-shield w-5"></i><span>Admin</span>
            </a>
          </li>

          <!-- Logout -->
          <li class="pt-4 border-t border-white/20 mt-4">
            <form method="POST" action="#">
              <button class="menu-item flex items-center space-x-3 p-3 rounded-lg text-white/80 hover:text-red-300 w-full text-left">
                <i class="fas fa-sign-out-alt w-5"></i><span>Logout</span>
              </button>
            </form>
          </li>
        </ul>
      </nav>
    </div>

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
        <a href="https://www.youtube.com/watch?v=jnuILVPfKPg" target="_blank" class="hover:text-red-400">
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

    // ✅ Highlight menu aktif
    const currentUrl = window.location.pathname;
    const links = document.querySelectorAll("aside nav a");

    links.forEach(link => {
      if (currentUrl === link.getAttribute("href")) {
        link.classList.add("active");
      }
    });

    // ✅ Auto buka submenu voucher jika aktif
    if (currentUrl.includes("voucher")) {
      const submenu = document.getElementById("voucherMenu");
      submenu.classList.remove("hidden");

      const btn = submenu.previousElementSibling;
      const icon = btn.querySelector("i.fas.fa-chevron-down");
      if (icon) icon.classList.add("rotate-180");

      // Tandai link voucher aktif
      links.forEach(link => {
        if (currentUrl === link.getAttribute("href")) {
          link.classList.add("active");
        }
      });
    }
  });

  function toggleSubmenu(id, btn) {
    const submenu = document.getElementById(id);
    submenu.classList.toggle('hidden');

    const icon = btn.querySelector('i.fas.fa-chevron-down');
    if (icon) {
      icon.classList.toggle('rotate-180');
    }
  }
</script>

</body>
</html>
