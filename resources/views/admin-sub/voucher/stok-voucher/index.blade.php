<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Stok Voucher</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body class="p-4">
    <!-- Sidebar -->
    {{-- @include('layouts.subadminbar') --}}

<div class="container">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2>Daftar Stok Voucher</h2>
        <a href="{{ route('stokvoucher.create') }}" class="btn btn-primary">
            + Tambah Stok Voucher
        </a>
    </div>

    <table class="table table-bordered table-striped table-hover">
        <thead class="table-dark">
            <tr>
                <th>ID</th>
                <th>USERNAME</th>
                <th>PASSWORD</th>
                <th>PROFILE</th>
                <th>ROUTER</th>
                <th>SERVER</th>
                <th>MITRA</th>
                <th>OUTLET</th>
                <th>HPP</th>
                <th>KOMISI</th>
                <th>HJK</th>
                <th>SALDO</th>
                <th>ADMIN</th>
                <th>KODE</th>
                <th>TGL PEMBUATAN</th>
                <th>MAC</th>
            </tr>
        </thead>
        <tbody>
            @foreach($stokVouchers as $voucher)
            <tr>
                <td>{{ $voucher->id }}</td>
                <td>{{ $voucher->username }}</td>
                <td>{{ $voucher->password }}</td>
                <td>{{ $voucher->profileVoucher->nama_profile ?? '-' }}</td>
                <td>{{ $voucher->router }}</td>
                <td>{{ $voucher->server }}</td>
                <td>{{ $voucher->reseller->nama_lengkap ?? '-' }}</td>
                <td>{{ $voucher->outlet }}</td>
                <td>{{ number_format($voucher->hpp, 0, ',', '.') }}</td>
                <td>{{ number_format($voucher->komisi, 0, ',', '.') }}</td>
                <td>{{ number_format($voucher->hjk, 0, ',', '.') }}</td>
                <td>{{ number_format($voucher->saldo, 0, ',', '.') }}</td>
                <td>{{ $voucher->admin }}</td>
                <td>{{ $voucher->kode }}</td>
                <td>{{ $voucher->tgl_pembuatan }}</td>
                <td>{{ $voucher->mac }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>

    {{-- Pagination --}}
    <div class="mt-3">
        {{ $stokVouchers->links() }}
    </div>
</div>

</body>
</html>
