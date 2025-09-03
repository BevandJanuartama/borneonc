{{-- <!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Log Aplikasi</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- FontAwesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<div class="page-content p-4">

    <!-- start page title -->
    <div class="page-title-box mb-4">
        <div class="container-fluid">
            <div class="row align-items-center">
                <div class="col-lg-6">
                    <h3>LOG APLIKASI</h3>
                </div>
            </div>
        </div>
    </div>
    <!-- end page title -->    

    <div class="container-fluid">

        <div class="card border-top border-primary shadow">
            <div class="card-body">

                <div class="row">
                    <div class="col-md-7">
                        <form action="{{ route('log.destroyAll') }}" method="POST" 
                              onsubmit="return confirm('Kosongkan semua log?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm me-1">
                                <i class="far fa-trash-alt fa-lg"></i> KOSONGKAN
                            </button>
                        </form>
                    </div>

                    <div class="mb-2 mt-3 col-md-5">
                        <form action="{{ route('log.index') }}" method="GET">
                            <div class="row">
                                <label class="col-md-5 col-form-label text-end">FILTER TANGGAL</label>
                                <div class="col-md-7">
                                    <input type="date" class="form-control" name="tanggal" 
                                           value="{{ request('tanggal') }}">
                                </div>
                            </div>
                        </form>
                    </div>
                </div>

                <hr class="bg-primary">

                <div class="table-responsive">
                    <table id="tableData" class="table table-bordered table-hover text-nowrap table-dark">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>NAMA LENGKAP</th>
                            <th>IP ADDRESS</th>
                            <th>INFO AKTIFITAS</th>
                            <th>TANGGAL KEJADIAN</th>
                        </tr>
                        </thead>
                        <tbody>
                            @forelse($logs as $log)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $log->nama_lengkap }}</td>
                                    <td>{{ $log->ip_address }}</td>
                                    <td>{{ $log->info_aktifitas }}</td>
                                    <td>{{ $log->created_at }}</td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="5" class="text-center">Belum ada data log</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                    <div class="mt-3">
                        {{ $logs->links('pagination::bootstrap-5') }}
                    </div>
                </div>

            </div>
        </div>

    </div>
</div>

<!-- Modal isi log -->
<div class="modal fade" id="modalLog" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content text-dark">
            <div class="modal-body">
                <div class="col-lg-12">
                    <label class="form-label">INFO AKTIFITAS</label>
                    <textarea class="form-control" rows="7" name="log"></textarea> 
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-warning" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.13.7/js/dataTables.bootstrap5.min.js"></script>

<script>
$(document).ready(function() {
    $('#tableData').DataTable();
});
</script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html> --}}
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

  <!-- Sidebar sesuai role -->
  @if(Auth::user()->level === 'administrator')
    @include('layouts.subadminbar')
  @elseif(Auth::user()->level === 'keuangan')
    @include('layouts.keuanganbar')
  @elseif(Auth::user()->level === 'operator')
    @include('layouts.operatorbar')
  @elseif(Auth::user()->level === 'teknisi')
    @include('layouts.teknisibar')
  @endif


  <!-- Wrapper utama konten -->
  <main class="md:pl-72 w-full">
    
    <!-- Section 1 -->
    <section id="harga" class="py-20">
      <div class="container mx-auto px-4">
        <header class="text-center mb-14 border-b pb-6 border-indigo-200">
          <h2 class="text-4xl font-bold text-gray-800">Halaman Transaksi</h2>
        </header>
      </div>
    </section>

    <!-- Tambah section apapun tanpa perlu mikir pl-72 -->
  
</main>


</body>
</html>
