<aside class="w-64 sidebar-gradient h-screen shadow-xl fixed left-0 top-0 z-50">
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
      <span class="font-semibold text-white block">{{ Auth::user()->name }}</span>
    </div>
  </div>

  <nav class="p-4">
    <ul class="space-y-2">
      <li>
        <a href="/instance"
           class="menu-item flex items-center space-x-3 p-3 rounded-lg 
           {{ Request::is('instance*') || Request::is('order*') ? 'text-white bg-white/10' : 'text-white/80 hover:text-white' }}">
          <i class="fas fa-microchip w-5"></i><span>Instances</span>
        </a>
      </li>
      <li>
        <a href="/remote"
           class="menu-item flex items-center space-x-3 p-3 rounded-lg 
           {{ Request::is('remote') ? 'text-white bg-white/10' : 'text-white/80 hover:text-white' }}">
          <i class="fas fa-shield-alt w-5"></i><span>Remote Access</span>
        </a>
      </li>
      <li>
        <a href="/invoice"
           class="menu-item flex items-center space-x-3 p-3 rounded-lg 
           {{ Request::is('invoice') ? 'text-white bg-white/10' : 'text-white/80 hover:text-white' }}">
          <i class="fas fa-file-invoice-dollar w-5"></i><span>Billing & Invoice</span>
        </a>
      </li>
      <li>
        <a href="/account"
           class="menu-item flex items-center space-x-3 p-3 rounded-lg 
           {{ Request::is('account*') ? 'text-white bg-white/10' : 'text-white/80 hover:text-white' }}">
          <i class="fas fa-user-cog w-5"></i><span>Account Settings</span>
        </a>
      </li>
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
</aside>
