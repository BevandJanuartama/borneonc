<aside class="w-64 sidebar-gradient h-screen shadow-xl fixed left-0 top-0 z-50 flex flex-col justify-between">
  <!-- Bagian Atas -->
  <div>
    <div class="p-6 border-b border-white/20">
      <h1 class="text-xl font-bold text-white flex items-center">
        <i class="fas fa-cloud mr-3 text-2xl"></i> BNC CLOUD MANAGER
      </h1>
    </div>

    <div class="p-6 flex items-center space-x-4 border-b border-white/20">
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
    </div>

    <nav class="p-4">
      <ul class="space-y-2">
        <li>
          <a href="{{ route('admin.dashboard') }}"
             class="menu-item flex items-center space-x-3 p-3 rounded-lg 
             {{ request()->routeIs('admin.dashboard') ? 'text-white bg-white/10' : 'text-white/80 hover:text-white' }}">
            <i class="fas fa-shield-alt w-5"></i><span>Dashboard</span>
          </a>
        </li>

        <li>
          <a href="{{ route('paket.index') }}"
             class="menu-item flex items-center space-x-3 p-3 rounded-lg 
             {{ request()->routeIs('paket.*') ? 'text-white bg-white/10' : 'text-white/80 hover:text-white' }}">
            <i class="fas fa-file-invoice-dollar w-5"></i><span>Paket</span>
          </a>
        </li>

        <li class="pt-4 border-t border-white/20 mt-4">
          @if (Auth::check())
          <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button class="menu-item flex items-center space-x-3 p-3 rounded-lg text-white/80 hover:text-red-300 w-full text-left">
              <i class="fas fa-sign-out-alt w-5"></i><span>Logout</span>
            </button>
          </form>
          @endif
        </li>
      </ul>
    </nav>
  </div>

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
