<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Mitra</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

    <!-- Sidebar -->
    @include('layouts.subadminbar')

<div class="container py-4" style="margin-left: 250px;">

    <h3 class="mb-3">MITRA</h3>
    <p class="text-muted small">
        Saldo yang diawali tanda minus (-) menandakan mitra berhutang sejumlah minus -saldo,
        dan mitra dapat melakukan transaksi ketika saldo 0/minus sampai batas maksimal limit hutang.<br>
        <b>Reseller</b> adalah orang yang dapat mengelola data voucher dan pelangganya sendiri serta mendapatkan komisi untuk setiap transaksi.<br>
        <b>Biller</b> adalah orang yang dapat menerima pembayaran tagihan langganan, misalnya loket pembayaran, tukang tagih, dll.
    </p>

    <div class="mb-3">
        <a href="{{ route('resellers.create') }}" class="btn btn-primary">+ Tambah Reseller</a>
    </div>

    <div class="table-responsive bg-white p-3 rounded shadow-sm">
        <table class="table table-bordered table-striped align-middle mb-0">
            <thead class="table-dark text-center">
                <tr>
                    <th>ID</th>
                    <th>NAMA</th>
                    <th>KATEGORI</th>
                    <th>STOK VC</th>
                    <th>PHONE</th>
                    <th>ALAMAT</th>
                    <th>SALDO</th>
                    <th>LIMIT HUTANG</th>
                    <th>KODE UNIK</th>
                    <th>KOMISI</th>
                    <th>LOGIN TERAKHIR</th>
                    <th>AKSI</th>
                </tr>
            </thead>
            <tbody>
                @forelse($resellers as $reseller)
                    <tr>
                        <td class="text-center">{{ $reseller->id }}</td>
                        <td>{{ $reseller->nama_lengkap }}</td>
                        <td class="text-center">{{ strtoupper($reseller->kategori ?? 'RESELLER') }}</td>
                        <td class="text-center">{{ $reseller->stok_vc ?? 0 }}</td>
                        <td>{{ $reseller->telepon }}</td>
                        <td>{{ $reseller->alamat }}</td>
                        <td class="text-end">{{ number_format($reseller->saldo ?? 0, 0, ',', '.') }}</td>
                        <td class="text-end">{{ number_format($reseller->limit_hutang ?? 0, 0, ',', '.') }}</td>
                        <td class="text-center">{{ $reseller->kode_unik ?? '-' }}</td>
                        <td class="text-end">{{ number_format($reseller->komisi ?? 0, 0, ',', '.') }}</td>
                        <td class="text-center">
                            {{ $reseller->login_terakhir ? $reseller->login_terakhir->format('d-m-Y H:i') : '-' }}
                        </td>
                        <td class="text-center">
                            <a href="{{ route('resellers.edit', $reseller->id) }}" class="btn btn-sm btn-warning">Edit</a>
                            <form action="{{ route('resellers.delete', $reseller->id) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" onclick="return confirm('Yakin hapus reseller ini?')" class="btn btn-sm btn-danger">Hapus</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="12" class="text-center">Tidak ada data reseller</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    @if(method_exists($resellers, 'links'))
        <div class="mt-3">
            {{ $resellers->links() }}
        </div>
    @endif


</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
