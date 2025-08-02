<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Account - BNC CLOUD MANAGER</title>
  
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
    
    .profile-gradient {
      background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
    }
    
    .form-input {
      transition: all 0.3s ease;
    }
    
    .form-input:focus {
      transform: translateY(-2px);
      box-shadow: 0 10px 25px rgba(102, 126, 234, 0.1);
    }
    
    .security-card {
      background: linear-gradient(135deg, #fa709a 0%, #fee140 100%);
    }
    
    .activity-card {
      background: linear-gradient(135deg, #a8edea 0%, #fed6e3 100%);
    }
    
    .settings-card {
      background: linear-gradient(135deg, #ffecd2 0%, #fcb69f 100%);
    }
    
    .animate-float {
      animation: float 3s ease-in-out infinite;
    }
    
    @keyframes float {
      0%, 100% { transform: translateY(0px); }
      50% { transform: translateY(-10px); }
    }
    
    .password-strength {
      height: 4px;
      border-radius: 2px;
      transition: all 0.3s ease;
    }
  </style>
</head>
<body class="bg-gray-50 flex min-h-screen">

  <!-- Sidebar -->
    @include('layouts.sidebar')

  <!-- Main Content -->
  <main class="flex-1 ml-64 p-8">
    <!-- Header -->
    <div class="flex justify-between items-center mb-8">
      <div>
        <h2 class="text-3xl font-bold text-gray-800 flex items-center">
          <i class="fas fa-user-cog mr-3 text-purple-600"></i>
          Account Settings
        </h2>
        <p class="text-gray-600 mt-1">Manage your account information and security settings</p>
      </div>
    </div>

    <!-- Profile Hero Card -->
    <div class="profile-gradient rounded-2xl p-8 text-white mb-8 card-hover relative overflow-hidden">
      <div class="absolute top-0 right-0 opacity-10">
        <i class="fas fa-user-circle text-9xl animate-float"></i>
      </div>
      <div class="relative z-10">
        <div class="flex items-center space-x-6">
          <div class="w-24 h-24 bg-white/20 rounded-full flex items-center justify-center border-4 border-white/30">
            <i class="fas fa-user text-white text-3xl"></i>
          </div>
          <div>
            <h3 class="text-3xl font-bold mb-2">{{ Auth::user()->name }}</h3>
            <p class="text-white/90 mb-1">{{ Auth::user()->telepon }}</p>
            <p class="text-white/70 text-sm">
            Member since {{ \Carbon\Carbon::parse(Auth::user()->created_at)->translatedFormat('F Y') }}
            </p>            
          </div>
        </div>
      </div>
    </div>

    <!-- Account Content Grid -->
    <div class="grid grid-cols-1 lg:grid-cols-2 gap-8 mb-8">
    <!-- Account Information -->
    <div class="lg:col-span-2">
      <div class="lg:col-span-2">
        <div class="bg-white shadow-xl rounded-2xl p-8 card-hover">
          <div class="flex items-center mb-6">
            <div class="w-12 h-12 bg-blue-100 rounded-xl flex items-center justify-center mr-4">
              <i class="fas fa-user-edit text-blue-600 text-xl"></i>
            </div>
            <h3 class="text-2xl font-bold text-gray-800">Account Information</h3>
          </div>
          
          <form method="POST" action="{{ route('profile.update') }}" class="space-y-6">
          @csrf
          @method('PATCH')

          <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <div>
              <label class="block text-gray-700 font-semibold mb-2">Full Name</label>
              <input type="text" name="name" value="{{ Auth::user()->name }}" 
                class="form-input w-full px-4 py-3 bg-gray-50 border-2 border-gray-200 rounded-xl focus:outline-none focus:border-purple-500">
            </div>
          </div>

          <div>
            <label class="block text-gray-700 font-semibold mb-2">Email</label>
            <input type="email" name="email" value="{{ Auth::user()->telepon }}" 
              class="form-input w-full px-4 py-3 bg-gray-50 border-2 border-gray-200 rounded-xl focus:outline-none focus:border-purple-500">
          </div>

          <div class="pt-4">
            <button type="submit" 
                class="bg-gradient-to-r from-purple-600 to-blue-600 hover:from-purple-700 hover:to-blue-700 text-white px-8 py-3 rounded-xl font-semibold shadow-lg hover:shadow-xl transition-all transform hover:scale-105">
                <i class="fas fa-save mr-2"></i>Update Information
            </button>
          </div>
        </form>
        </div>
      </div>

    <!-- Password & Security Section -->
      <!-- Change Password -->
      <div class="bg-white shadow-xl rounded-2xl p-8 card-hover">
        <div class="flex items-center mb-6">
          <div class="w-12 h-12 bg-red-100 rounded-xl flex items-center justify-center mr-4">
            <i class="fas fa-key text-red-600 text-xl"></i>
          </div>
          <h3 class="text-2xl font-bold text-gray-800">Change Password</h3>
        </div>
        
        <form method="POST" action="{{ route('password.update') }}" class="space-y-6">
            @csrf
            @method('PUT')

            <div>
                <label class="block text-gray-700 font-semibold mb-2">Current Password</label>
                <input type="password" name="current_password" 
                    class="form-input w-full px-4 py-3 bg-gray-50 border-2 border-gray-200 rounded-xl focus:outline-none focus:border-red-500" required>
            </div>

            <div>
                <label class="block text-gray-700 font-semibold mb-2">New Password</label>
                <input type="password" name="password" id="newPassword"
                    class="form-input w-full px-4 py-3 bg-gray-50 border-2 border-gray-200 rounded-xl focus:outline-none focus:border-red-500" 
                    oninput="checkPasswordStrength()" required>
                <div class="mt-2">
                    <div class="password-strength bg-gray-200" id="passwordStrength"></div>
                    <p class="text-sm text-gray-600 mt-1" id="strengthText">Password strength</p>
                </div>
            </div>

            <div>
                <label class="block text-gray-700 font-semibold mb-2">Confirm New Password</label>
                <input type="password" name="password_confirmation" 
                    class="form-input w-full px-4 py-3 bg-gray-50 border-2 border-gray-200 rounded-xl focus:outline-none focus:border-red-500" required>
            </div>

            <div class="pt-4">
                <button type="submit" 
                    class="bg-gradient-to-r from-red-600 to-pink-600 hover:from-red-700 hover:to-pink-700 text-white px-8 py-3 rounded-xl font-semibold shadow-lg hover:shadow-xl transition-all transform hover:scale-105">
                    <i class="fas fa-lock mr-2"></i>Update Password
                </button>
            </div>
        </form>
      </div>
    </div>
  </main>

  <script>
    function logout() {
      if (confirm('Are you sure you want to logout?')) {
        alert('Logout functionality would be handled by Laravel backend');
      }
    }

    function changePassword(event) {
      event.preventDefault();
      alert('Password change would be handled by Laravel backend');
    }

    function confirmDelete() {
      if (confirm('Are you sure you want to delete your account? This action cannot be undone.')) {
        alert('Account deletion would be handled by Laravel backend');
      }
    }

    function checkPasswordStrength() {
      const password = document.getElementById('newPassword').value;
      const strengthBar = document.getElementById('passwordStrength');
      const strengthText = document.getElementById('strengthText');
      
      let strength = 0;
      let feedback = '';
      
      if (password.length >= 8) strength += 25;
      if (/[a-z]/.test(password)) strength += 25;
      if (/[A-Z]/.test(password)) strength += 25;
      if (/[0-9]/.test(password)) strength += 25;
      
      if (strength < 25) {
        strengthBar.style.width = '25%';
        strengthBar.style.backgroundColor = '#ef4444';
        feedback = 'Weak password';
      } else if (strength < 50) {
        strengthBar.style.width = '50%';
        strengthBar.style.backgroundColor = '#f59e0b';
        feedback = 'Fair password';
      } else if (strength < 75) {
        strengthBar.style.width = '75%';
        strengthBar.style.backgroundColor = '#eab308';
        feedback = 'Good password';
      } else {
        strengthBar.style.width = '100%';
        strengthBar.style.backgroundColor = '#22c55e';
        feedback = 'Strong password';
      }
      
      strengthText.textContent = feedback;
    }

    // Add notification dot animation
    document.addEventListener('DOMContentLoaded', function() {
      const bellIcon = document.querySelector('.fa-bell');
      if (bellIcon) {
        bellIcon.parentElement.style.position = 'relative';
        const dot = document.createElement('div');
        dot.className = 'absolute -top-1 -right-1 w-3 h-3 bg-red-500 rounded-full animate-pulse';
        bellIcon.parentElement.appendChild(dot);
      }
    });
  </script>

</body>
</html>