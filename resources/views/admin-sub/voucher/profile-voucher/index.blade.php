<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile Voucher</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/dataTables.bootstrap5.min.css">
</head>

<body class="bg-light d-flex">
    <!-- Sidebar -->
    @include('layouts.subadminbar')

    <!-- Konten -->
    <div class="container-fluid py-4" style="margin-left: 250px;">
        <h2 class="mb-4">PROFILE VOUCHER</h2>

        <div class="mb-3">
            <a href="{{ route('voucher.create') }}" class="btn btn-primary">+ Tambah Profile Voucher</a>
        </div>

        <div class="card shadow-sm">
            <div class="card-body">
                <table id="voucherTable" class="table table-bordered table-striped align-middle">
                    <thead class="table-dark">
                        <tr>
                            <th>ID</th>
                            <th>NAMA PROFILE</th>
                            <th>GROUP</th>
                            <th>ADDR LIST</th>
                            <th>RATE LIMIT</th>
                            <th>SHARED</th>
                            <th>KUOTA</th>
                            <th>DURASI</th>
                            <th>AKTIF</th>
                            <th>HPP</th>
                            <th>KOMISI</th>
                            <th>HJK</th>
                            <th>AKSI</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($vouchers as $v)
                            <tr>
                                <td>{{ $v->id }}</td>
                                <td>{{ $v->nama_profile }}</td>
                                <td>{{ $v->mikrotik_group }}</td>
                                <td>{{ $v->mikrotik_address_list ?: '-' }}</td>
                                <td>{{ $v->mikrotik_rate_limit }}</td>
                                <td>{{ $v->shared }}</td>
                                <td>
                                    @if($v->kuota == 0) UNLIMITED 
                                    @else {{ $v->kuota . ' ' . $v->kuota_satuan }}
                                    @endif
                                </td>
                                <td>
                                    @if($v->durasi == 0) UNLIMITED
                                    @else {{ $v->durasi . ' ' . $v->durasi_satuan }}
                                    @endif
                                </td>
                                <td>{{ $v->masa_aktif . ' ' . $v->masa_aktif_satuan }}</td>
                                <td>{{ number_format($v->hpp ?? 0, 0, ',', '.') }}</td>
                                <td>{{ number_format($v->komisi, 0, ',', '.') }}</td>
                                <td>{{ number_format($v->hjk, 0, ',', '.') }}</td>
                                <td>
                                    <a href="{{ route('voucher.edit', $v->id) }}" class="btn btn-sm btn-warning">Edit</a>
                                    <form action="{{ route('voucher.delete', $v->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Yakin mau hapus?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-danger">Hapus</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/dataTables.bootstrap5.min.js"></script>
    <script>
    $(document).ready(function() {
        $('#voucherTable').DataTable({
            "pageLength": 50,
            "lengthMenu": [ [10, 25, 50, 100], [10, 25, 50, 100] ],
            "ordering": false
        });
    });
    </script>
</body>

</html>
