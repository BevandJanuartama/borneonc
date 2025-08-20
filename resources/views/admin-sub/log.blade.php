<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Log Aplikasi</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/1.13.7/css/dataTables.bootstrap5.min.css" rel="stylesheet">
</head>
<body class="bg-light text-black">

    <!-- Sidebar -->
    @include('layouts.subadminbar')

<div class="page-content p-4 ml-64">

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
                            <th>NO</th>
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
                                    <td>{{ $log->tanggal_kejadian }}</td>
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
        <div class="modal-content text-light">
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



</body>
</html>
