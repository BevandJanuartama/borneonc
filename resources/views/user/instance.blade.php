<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Instances - BNC CLOUD MANAGER</title>

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- Tailwind CSS -->
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
            box-shadow: 0 20px 25px -5px rgba(0, 0, 0, 0.1),
                        0 10px 10px -5px rgba(0, 0, 0, 0.04);
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


    <!-- Main Content -->
    <main class="flex-1 ml-64 p-8">
        <!-- Header -->
        <div class="mb-8">
            <h2 class="text-3xl font-bold text-gray-800">Instance Saya</h2>
            <p class="text-gray-600 mt-1">Kelola dan pantau semua instance yang Anda miliki.</p>
        </div>

        <!-- Action Card -->
        <div class="bg-white rounded-xl shadow-md p-6 mb-6">
            <div class="flex justify-between items-center">
                <h3 class="text-xl font-semibold text-gray-700">Kelola Instance</h3>
                <a href="/order" class="inline-flex items-center px-5 py-2 bg-blue-600 text-white text-sm font-semibold rounded-lg hover:bg-blue-700 transition-all">
                    <i class="fas fa-plus-circle mr-2"></i> Tambah Instance
                </a>
            </div>
        </div>

        <!-- Instance Cards -->
        <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-3 gap-6">
            <div class="bg-white rounded-xl shadow-md p-6 card-hover">
                <h4 class="text-lg font-semibold text-gray-700 mb-2">Instance #1</h4>
                <p class="text-gray-500 text-sm">Ubuntu 20.04, 2 CPU, 4 GB RAM</p>
                <p class="text-green-500 text-sm mt-2 font-medium">Status: Aktif</p>
            </div>
            <!-- Tambahkan lebih banyak kartu instance jika diperlukan -->
        </div>
    </main>
</body>
</html>
