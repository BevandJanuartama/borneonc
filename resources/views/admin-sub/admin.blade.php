<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Subadmin</title>
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        .sidebar-gradient {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        }
        .form-gradient {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        }
        .form-container {
            background: #fff;
            border-radius: 20px;
            box-shadow: 0 20px 40px rgba(102, 126, 234, 0.3);
            animation: fadeIn 0.8s ease-in-out;
            border: 1px solid rgba(102, 126, 234, 0.2);
        }
        .form-container h2 {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }
        input, select {
            border: 2px solid rgba(102, 126, 234, 0.2);
            transition: all 0.3s ease;
        }
        input:focus, select:focus {
            border-color: #667eea;
            box-shadow: 0 0 15px rgba(102, 126, 234, 0.3);
            outline: none;
        }
        .btn-gradient {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            transition: all 0.3s ease;
        }
        .btn-gradient:hover {
            transform: translateY(-2px);
            box-shadow: 0 10px 25px rgba(102, 126, 234, 0.4);
        }
        .error {
            color: #764ba2;
            background: rgba(118, 75, 162, 0.1);
            padding: 8px;
            border-radius: 8px;
            border-left: 4px solid #764ba2;
        }
        .success {
            background: linear-gradient(135deg, #10b981 0%, #059669 100%);
            color: white;
            padding: 15px;
            border-radius: 12px;
            margin-bottom: 20px;
            text-align: center;
            box-shadow: 0 8px 20px rgba(16, 185, 129, 0.3);
        }
        .error-list {
            background: rgba(118, 75, 162, 0.1);
            border: 2px solid rgba(118, 75, 162, 0.3);
            color: #764ba2;
            padding: 15px;
            border-radius: 12px;
            margin-bottom: 20px;
        }
        @keyframes fadeIn {
            from {opacity: 0; transform: translateY(-30px);}
            to {opacity: 1; transform: translateY(0);}
        }
        .icon-gradient {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }
    </style>
</head>
<body class="bg-gray-100">
    <!-- Sidebar -->
    @include('layouts.subadminbar')

    <!-- Main Content -->
    <div class="md:ml-64 flex items-center justify-center min-h-screen p-6">
        <div class="form-container w-full max-width-md p-8">
            <!-- Header dengan Icon -->
            <div class="text-center mb-8">
                <div class="mb-4">
                    <i class="fas fa-user-plus text-5xl icon-gradient"></i>
                </div>
                <h2 class="text-3xl font-bold">Tambah Subadmin</h2>
                <p class="text-gray-600 mt-2">Kelola akses administrator sistem</p>
            </div>
            
            <!-- Success Message -->
            @if(session('success'))
                <div class="success flex items-center">
                    <i class="fas fa-check-circle mr-3"></i>
                    {{ session('success') }}
                </div>
            @endif

            <!-- Error Messages -->
            @if($errors->any())
                <div class="error-list">
                    <div class="flex items-center mb-3">
                        <i class="fas fa-exclamation-triangle mr-2"></i>
                        <strong>Terjadi kesalahan:</strong>
                    </div>
                    <ul class="ml-6 space-y-1">
                        @foreach($errors->all() as $error)
                            <li class="flex items-start">
                                <i class="fas fa-dot-circle mt-1 mr-2 text-xs"></i>
                                {{ $error }}
                            </li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form method="POST" action="{{ route('subadmin.store') }}" class="space-y-6">
                @csrf
                
                <!-- Nama -->
                <div class="form-group">
                    <label class="flex items-center text-gray-700 font-semibold mb-3">
                        <i class="fas fa-user mr-2 icon-gradient"></i>
                        Nama Lengkap
                    </label>
                    <input 
                        type="text" 
                        name="name" 
                        value="{{ old('name') }}" 
                        class="w-full px-4 py-3 rounded-xl border bg-white focus:bg-gray-50 transition-all duration-300" 
                        placeholder="Masukkan nama lengkap"
                        required
                    >
                    @error('name')
                        <div class="error mt-2 text-sm">
                            <i class="fas fa-exclamation-circle mr-1"></i>
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <!-- Telepon -->
                <div class="form-group">
                    <label class="flex items-center text-gray-700 font-semibold mb-3">
                        <i class="fas fa-phone mr-2 icon-gradient"></i>
                        Nomor Telepon
                    </label>
                    <input 
                        type="text" 
                        name="telepon" 
                        value="{{ old('telepon') }}" 
                        class="w-full px-4 py-3 rounded-xl border bg-white focus:bg-gray-50 transition-all duration-300" 
                        placeholder="Contoh: 081234567890"
                        required
                    >
                    @error('telepon')
                        <div class="error mt-2 text-sm">
                            <i class="fas fa-exclamation-circle mr-1"></i>
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <!-- Password -->
                <div class="form-group">
                    <label class="flex items-center text-gray-700 font-semibold mb-3">
                        <i class="fas fa-lock mr-2 icon-gradient"></i>
                        Password
                    </label>
                    <input 
                        type="password" 
                        name="password" 
                        class="w-full px-4 py-3 rounded-xl border bg-white focus:bg-gray-50 transition-all duration-300" 
                        placeholder="Minimal 8 karakter"
                        required
                    >
                    @error('password')
                        <div class="error mt-2 text-sm">
                            <i class="fas fa-exclamation-circle mr-1"></i>
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <!-- Konfirmasi Password -->
                <div class="form-group">
                    <label class="flex items-center text-gray-700 font-semibold mb-3">
                        <i class="fas fa-lock mr-2 icon-gradient"></i>
                        Konfirmasi Password
                    </label>
                    <input 
                        type="password" 
                        name="password_confirmation" 
                        class="w-full px-4 py-3 rounded-xl border bg-white focus:bg-gray-50 transition-all duration-300" 
                        placeholder="Ulangi password"
                        required
                    >
                </div>

                <!-- Level -->
                <div class="form-group">
                    <label class="flex items-center text-gray-700 font-semibold mb-3">
                        <i class="fas fa-user-shield mr-2 icon-gradient"></i>
                        Level Akses
                    </label>
                    <select 
                        name="level" 
                        class="w-full px-4 py-3 rounded-xl border bg-white focus:bg-gray-50 transition-all duration-300" 
                        required
                    >
                        <option value="">-- Pilih Level Akses --</option>
                        <option value="administrator" {{ old('level') == 'administrator' ? 'selected' : '' }}>
                            👑 Administrator
                        </option>
                        <option value="keuangan" {{ old('level') == 'keuangan' ? 'selected' : '' }}>
                            💰 Keuangan
                        </option>
                        <option value="teknisi" {{ old('level') == 'teknisi' ? 'selected' : '' }}>
                            🔧 Teknisi
                        </option>
                        <option value="operator" {{ old('level') == 'operator' ? 'selected' : '' }}>
                            👨‍💼 Operator
                        </option>
                    </select>
                    @error('level')
                        <div class="error mt-2 text-sm">
                            <i class="fas fa-exclamation-circle mr-1"></i>
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <!-- Submit Button -->
                <button 
                    type="submit" 
                    class="w-full btn-gradient text-white font-bold py-4 px-6 rounded-xl flex items-center justify-center space-x-3 text-lg"
                >
                    <i class="fas fa-plus-circle"></i>
                    <span>Tambah Subadmin</span>
                </button>

                <!-- Cancel Button -->
                <a 
                    href="{{ route('subadmin.admin') }}" 
                    class="w-full bg-gray-500 hover:bg-gray-600 text-white font-bold py-4 px-6 rounded-xl flex items-center justify-center space-x-3 text-lg transition-all duration-300 mt-3"
                >
                    <i class="fas fa-arrow-left"></i>
                    <span>Kembali</span>
                </a>
            </form>
        </div>
    </div>

    <!-- Tabel Data Subadmin -->
    <div class="md:ml-64 p-6">
        <div class="bg-white rounded-2xl shadow-lg border border-gray-200 overflow-hidden">
            <!-- Header Tabel -->
            <div class="bg-gradient-to-r from-indigo-500 to-purple-600 px-6 py-4">
                <div class="flex items-center justify-between">
                    <h3 class="text-xl font-bold text-white flex items-center">
                        <i class="fas fa-users mr-3"></i>
                        Daftar Subadmin
                    </h3>
                    <div class="text-white text-sm">
                        <i class="fas fa-database mr-1"></i>
                        Total: <span class="font-bold">{{ $users->count() ?? 0 }}</span>
                    </div>
                </div>
            </div>

            <!-- Filter & Search -->
            <div class="bg-gray-50 px-6 py-4 border-b">
                <div class="flex flex-col md:flex-row md:items-center md:justify-between space-y-3 md:space-y-0">
                    <!-- Search -->
                    <div class="flex items-center space-x-2">
                        <div class="relative">
                            <i class="fas fa-search absolute left-3 top-1/2 transform -translate-y-1/2 text-gray-400"></i>
                            <input 
                                type="text" 
                                id="searchUser"
                                placeholder="Cari nama atau telepon..." 
                                class="pl-10 pr-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 w-64"
                            >
                        </div>
                    </div>

                    <!-- Filter Level -->
                    <div class="flex items-center space-x-3">
                        <label class="text-gray-700 font-medium">Filter Level:</label>
                        <select id="filterLevel" class="px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500">
                            <option value="">Semua Level</option>
                            <option value="administrator">👑 Administrator</option>
                            <option value="keuangan">💰 Keuangan</option>
                            <option value="teknisi">🔧 Teknisi</option>
                            <option value="operator">👨‍💼 Operator</option>
                        </select>
                    </div>
                </div>
            </div>

            <!-- Tabel -->
            <div class="overflow-x-auto">
                <table class="w-full">
                    <thead class="bg-gray-100 border-b-2 border-gray-200">
                        <tr>
                            <th class="px-6 py-4 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                                <i class="fas fa-hashtag mr-1"></i> No
                            </th>
                            <th class="px-6 py-4 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                                <i class="fas fa-user mr-1"></i> Nama
                            </th>
                            <th class="px-6 py-4 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                                <i class="fas fa-phone mr-1"></i> Telepon
                            </th>
                            <th class="px-6 py-4 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                                <i class="fas fa-user-shield mr-1"></i> Level
                            </th>
                            <th class="px-6 py-4 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                                <i class="fas fa-calendar mr-1"></i> Dibuat
                            </th>
                            <th class="px-6 py-4 text-center text-xs font-semibold text-gray-600 uppercase tracking-wider">
                                <i class="fas fa-cogs mr-1"></i> Aksi
                            </th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-200" id="userTableBody">
                        @forelse($users ?? [] as $index => $user)
                        <tr class="hover:bg-gray-50 transition-colors duration-200" data-level="{{ $user->level }}">
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 font-medium">
                                {{ $index + 1 }}
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="flex items-center">
                                    <div class="w-8 h-8 bg-gradient-to-r from-indigo-500 to-purple-600 rounded-full flex items-center justify-center text-white font-bold text-sm mr-3">
                                        {{ strtoupper(substr($user->name, 0, 1)) }}
                                    </div>
                                    <span class="text-sm font-medium text-gray-900">{{ $user->name }}</span>
                                </div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-700">
                                <i class="fas fa-phone text-gray-400 mr-1"></i>
                                {{ $user->telepon }}
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                @if($user->level == 'administrator')
                                    <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-medium bg-red-100 text-red-800">
                                        👑 Administrator
                                    </span>
                                @elseif($user->level == 'keuangan')
                                    <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-medium bg-green-100 text-green-800">
                                        💰 Keuangan
                                    </span>
                                @elseif($user->level == 'teknisi')
                                    <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-medium bg-blue-100 text-blue-800">
                                        🔧 Teknisi
                                    </span>
                                @elseif($user->level == 'operator')
                                    <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-medium bg-yellow-100 text-yellow-800">
                                        👨‍💼 Operator
                                    </span>
                                @else
                                    <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-medium bg-gray-100 text-gray-800">
                                        👤 User
                                    </span>
                                @endif
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-700">
                                <i class="fas fa-calendar text-gray-400 mr-1"></i>
                                {{ $user->created_at ? $user->created_at->format('d/m/Y H:i') : '-' }}
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-center">
                                <div class="flex items-center justify-center space-x-2">
                                    <!-- Edit Button -->
                                    <button class="bg-blue-500 hover:bg-blue-600 text-white px-3 py-1 rounded-lg text-xs font-medium transition-colors duration-200 flex items-center space-x-1">
                                        <i class="fas fa-edit text-xs"></i>
                                        <span>Edit</span>
                                    </button>
                                    
                                    <!-- Delete Button -->
                                    <button 
                                        onclick="confirmDelete('{{ $user->name }}', {{ $user->id }})" 
                                        class="bg-red-500 hover:bg-red-600 text-white px-3 py-1 rounded-lg text-xs font-medium transition-colors duration-200 flex items-center space-x-1">
                                        <i class="fas fa-trash text-xs"></i>
                                        <span>Hapus</span>
                                    </button>
                                </div>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="6" class="px-6 py-12 text-center">
                                <div class="flex flex-col items-center justify-center text-gray-500">
                                    <i class="fas fa-users text-4xl mb-4 text-gray-300"></i>
                                    <p class="text-lg font-medium">Belum ada data subadmin</p>
                                    <p class="text-sm">Tambahkan subadmin pertama menggunakan form di atas</p>
                                </div>
                            </td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            <!-- Pagination (jika menggunakan paginate) -->
            @if(isset($users) && method_exists($users, 'links'))
            <div class="bg-gray-50 px-6 py-4 border-t">
                {{ $users->links() }}
            </div>
            @endif
        </div>
    </div>

    <!-- Modal Konfirmasi Delete -->
    <div id="deleteModal" class="fixed inset-0 bg-black bg-opacity-50 z-50 hidden flex items-center justify-center">
        <div class="bg-white rounded-2xl p-6 max-w-md mx-4">
            <div class="text-center">
                <i class="fas fa-exclamation-triangle text-5xl text-red-500 mb-4"></i>
                <h3 class="text-xl font-bold text-gray-900 mb-2">Konfirmasi Hapus</h3>
                <p class="text-gray-600 mb-6">Apakah Anda yakin ingin menghapus user <strong id="deleteUserName"></strong>?</p>
                
                <div class="flex space-x-3">
                    <button onclick="closeDeleteModal()" class="flex-1 bg-gray-300 hover:bg-gray-400 text-gray-800 py-2 px-4 rounded-lg transition-colors">
                        Batal
                    </button>
                    <button onclick="executeDelete()" class="flex-1 bg-red-500 hover:bg-red-600 text-white py-2 px-4 rounded-lg transition-colors">
                        Ya, Hapus
                    </button>
                </div>
            </div>
        </div>
    </div>

    <!-- Scripts -->
    <script>
        let deleteUserId = null;

        // Search functionality
        document.getElementById('searchUser').addEventListener('keyup', function() {
            const searchTerm = this.value.toLowerCase();
            filterTable();
        });

        // Filter functionality
        document.getElementById('filterLevel').addEventListener('change', function() {
            filterTable();
        });

        function filterTable() {
            const searchTerm = document.getElementById('searchUser').value.toLowerCase();
            const filterLevel = document.getElementById('filterLevel').value;
            const rows = document.querySelectorAll('#userTableBody tr');

            rows.forEach(row => {
                const name = row.querySelector('td:nth-child(2)').textContent.toLowerCase();
                const phone = row.querySelector('td:nth-child(3)').textContent.toLowerCase();
                const level = row.getAttribute('data-level');

                const matchesSearch = name.includes(searchTerm) || phone.includes(searchTerm);
                const matchesLevel = !filterLevel || level === filterLevel;

                if (matchesSearch && matchesLevel) {
                    row.style.display = '';
                } else {
                    row.style.display = 'none';
                }
            });
        }

        function confirmDelete(userName, userId) {
            deleteUserId = userId;
            document.getElementById('deleteUserName').textContent = userName;
            document.getElementById('deleteModal').classList.remove('hidden');
        }

        function closeDeleteModal() {
            document.getElementById('deleteModal').classList.add('hidden');
            deleteUserId = null;
        }

        function executeDelete() {
            if (deleteUserId) {
                // Buat form untuk delete
                const form = document.createElement('form');
                form.method = 'POST';
                form.action = '/admin/delete/' + deleteUserId; // sesuaikan route
                
                // CSRF token
                const csrfToken = document.createElement('input');
                csrfToken.type = 'hidden';
                csrfToken.name = '_token';
                csrfToken.value = '{{ csrf_token() }}';
                
                // Method DELETE
                const methodField = document.createElement('input');
                methodField.type = 'hidden';
                methodField.name = '_method';
                methodField.value = 'DELETE';
                
                form.appendChild(csrfToken);
                form.appendChild(methodField);
                document.body.appendChild(form);
                form.submit();
            }
        }
    </script>
</body>
</html>