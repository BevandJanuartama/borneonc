<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Mitra</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 min-h-screen">

    <!-- Sidebar -->
    @include('layouts.subadminbar')

    <div class="p-6 sm:ml-64">
        <header class="text-center mb-14 border-b pb-6 border-indigo-200">
            <h2 class="text-4xl font-bold text-gray-800">Daftar Mitra</h2>
        </header>
        
        <p class="text-gray-500 text-sm mb-4">
            Saldo yang diawali tanda minus (-) menandakan mitra berhutang sejumlah minus -saldo,
            dan mitra dapat melakukan transaksi ketika saldo 0/minus sampai batas maksimal limit hutang.<br>
            <b>Reseller</b> adalah orang yang dapat mengelola data voucher dan pelangganya sendiri serta mendapatkan komisi untuk setiap transaksi.<br>
            <b>Biller</b> adalah orang yang dapat menerima pembayaran tagihan langganan, misalnya loket pembayaran, tukang tagih, dll.
        </p>

        <div class="mb-4">
            <a href="{{ route('resellers.create') }}" class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded">
                + Tambah Reseller
            </a>
        </div>

        <div class="overflow-x-auto bg-white p-4 rounded shadow">
            <table class="min-w-full table-auto border-collapse">
                <thead class="bg-gray-800 text-white text-xs uppercase text-center">
                    <tr>
                        <th class="border px-2 py-2">ID</th>
                        <th class="border px-2 py-2">NAMA</th>
                        <th class="border px-2 py-2">KATEGORI</th>
                        <th class="border px-2 py-2">STOK VC</th>
                        <th class="border px-2 py-2">PHONE</th>
                        <th class="border px-2 py-2">ALAMAT</th>
                        <th class="border px-2 py-2">SALDO</th>
                        <th class="border px-2 py-2">LIMIT HUTANG</th>
                        <th class="border px-2 py-2">KODE UNIK</th>
                        <th class="border px-2 py-2">KOMISI</th>
                        <th class="border px-2 py-2">LOGIN TERAKHIR</th>
                        <th class="border px-2 py-2">AKSI</th>
                    </tr>
                </thead>
                <tbody class="text-sm text-gray-700">
                    @forelse($resellers as $reseller)
                        <tr class="hover:bg-gray-50">
                            <td class="border px-2 py-1 text-center">{{ $reseller->id }}</td>
                            <td class="border px-2 py-1">{{ $reseller->nama_lengkap }}</td>
                            <td class="border px-2 py-1 text-center">{{ strtoupper($reseller->kategori ?? 'RESELLER') }}</td>
                            <td class="border px-2 py-1 text-center">{{ $reseller->stok_vc ?? 0 }}</td>
                            <td class="border px-2 py-1">{{ $reseller->telepon }}</td>
                            <td class="border px-2 py-1">{{ $reseller->alamat }}</td>
                            <td class="border px-2 py-1 text-right">{{ number_format($reseller->saldo ?? 0, 0, ',', '.') }}</td>
                            <td class="border px-2 py-1 text-right">{{ number_format($reseller->limit_hutang ?? 0, 0, ',', '.') }}</td>
                            <td class="border px-2 py-1 text-center">{{ $reseller->kode_unik ?? '-' }}</td>
                            <td class="border px-2 py-1 text-right">{{ number_format($reseller->komisi ?? 0, 0, ',', '.') }}</td>
                            <td class="border px-2 py-1 text-center">
                                {{ $reseller->login_terakhir ? $reseller->login_terakhir->format('d-m-Y H:i') : '-' }}
                            </td>
                            <td class="border px-2 py-1 text-center space-x-1">
                                <a href="{{ route('resellers.edit', $reseller->id) }}" class="bg-yellow-400 hover:bg-yellow-500 text-white px-2 py-1 rounded text-xs">Edit</a>
                                <form action="{{ route('resellers.delete', $reseller->id) }}" method="POST" class="inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" onclick="return confirm('Yakin hapus reseller ini?')" class="bg-red-600 hover:bg-red-700 text-white px-2 py-1 rounded text-xs">Hapus</button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="12" class="border px-2 py-2 text-center">Tidak ada data reseller</td>
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

</body>
</html>
