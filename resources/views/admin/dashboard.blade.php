<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Instances - BNC CLOUD MANAGER</title>

  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" crossorigin="anonymous" referrerpolicy="no-referrer" />

  <!-- Tailwind CSS CDN -->
  <script src="https://cdn.tailwindcss.com"></script>

  <!-- Chart.js -->
  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

  <!-- Chart.js Gauge Plugin -->
  <script src="https://cdn.jsdelivr.net/npm/chartjs-plugin-doughnutlabel@1.1.2/dist/chartjs-plugin-doughnutlabel.min.js"></script>


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
  </style>
</head>
<body class="bg-gray-50 flex min-h-screen">

  <!-- Sidebar -->
  @include('layouts.adminbar')


  <!-- Wrapper utama konten -->
  <main class="md:pl-72 w-full">
    
    <!-- Section 1 -->
    <section id="harga" class="py-20">
      <div class="container mx-auto px-4">
        <header class="text-center mb-14">
          <h2 class="text-4xl font-bold text-gray-800 mb-2">ini halamaan dashboard admin</h2>
        </header>
      </div>
    </section>

    <!-- Tambah section apapun tanpa perlu mikir pl-72 -->
  
</main>


</body>
</html>
