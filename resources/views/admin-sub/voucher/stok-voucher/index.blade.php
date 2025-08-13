<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Stok Voucher</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 min-h-screen p-6">

    <!-- Sidebar -->
    @include('layouts.subadminbar')

<div class="sm:ml-64">
    <div class="flex flex-col mb-6 items-start">
        <h2 class="text-2xl font-semibold mb-2">Daftar Stok Voucher</h2>
        <a href="{{ route('stokvoucher.create') }}" class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded">
            + Tambah Stok Voucher
        </a>
    </div>


    <div class="overflow-x-auto bg-white rounded shadow">
        <table class="min-w-full divide-y divide-gray-200">
            <thead class="bg-gray-800 text-white">
                <tr class="text-center">
                    <th class="px-3 py-2 text-sm font-medium">ID</th>
                    <th class="px-3 py-2 text-sm font-medium">USERNAME</th>
                    <th class="px-3 py-2 text-sm font-medium">PASSWORD</th>
                    <th class="px-3 py-2 text-sm font-medium">PROFILE</th>
                    <th class="px-3 py-2 text-sm font-medium">ROUTER</th>
                    <th class="px-3 py-2 text-sm font-medium">SERVER</th>
                    <th class="px-3 py-2 text-sm font-medium">MITRA</th>
                    <th class="px-3 py-2 text-sm font-medium">OUTLET</th>
                    <th class="px-3 py-2 text-sm font-medium">HPP</th>
                    <th class="px-3 py-2 text-sm font-medium">KOMISI</th>
                    <th class="px-3 py-2 text-sm font-medium">HJK</th>
                    <th class="px-3 py-2 text-sm font-medium">SALDO</th>
                    <th class="px-3 py-2 text-sm font-medium">ADMIN</th>
                    <th class="px-3 py-2 text-sm font-medium">KODE</th>
                    <th class="px-3 py-2 text-sm font-medium">TGL PEMBUATAN</th>
                    <th class="px-3 py-2 text-sm font-medium">MAC</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-200 text-sm text-center">
                @foreach($stokVouchers as $voucher)
                <tr>
                    <td class="px-2 py-1">{{ $voucher->id }}</td>
                    <td class="px-2 py-1">{{ $voucher->username }}</td>
                    <td class="px-2 py-1">{{ $voucher->password }}</td>
                    <td class="px-2 py-1">{{ $voucher->profileVoucher->nama_profile ?? '-' }}</td>
                    <td class="px-2 py-1">{{ $voucher->router }}</td>
                    <td class="px-2 py-1">{{ $voucher->server }}</td>
                    <td class="px-2 py-1">{{ $voucher->reseller->nama_lengkap ?? '-' }}</td>
                    <td class="px-2 py-1">{{ $voucher->outlet }}</td>
                    <td class="px-2 py-1">{{ number_format($voucher->hpp, 0, ',', '.') }}</td>
                    <td class="px-2 py-1">{{ number_format($voucher->komisi, 0, ',', '.') }}</td>
                    <td class="px-2 py-1">{{ number_format($voucher->hjk, 0, ',', '.') }}</td>
                    <td class="px-2 py-1">{{ number_format($voucher->saldo, 0, ',', '.') }}</td>
                    <td class="px-2 py-1">{{ $voucher->admin }}</td>
                    <td class="px-2 py-1">{{ $voucher->kode }}</td>
                    <td class="px-2 py-1">{{ $voucher->tgl_pembuatan }}</td>
                    <td class="px-2 py-1">{{ $voucher->mac }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    {{-- Pagination --}}
    <div class="mt-4">
        {{ $stokVouchers->links() }}
    </div>
</div>

</body>
</html>
