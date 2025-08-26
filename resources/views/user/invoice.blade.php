<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Data Subscriptions</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="flex bg-gray-100 min-h-screen">
    
    <!-- Sidebar -->
    <div class="w-64 bg-white shadow-lg p-6">
        @include('layouts.sidebar')
    </div>

    <!-- Main Content -->
    <div class="flex-1 p-8">
        <h1 class="text-2xl font-bold mb-6">Daftar Invoice</h1>

        <div class="overflow-x-auto">
            <table class="min-w-full border border-gray-300 bg-white rounded-lg shadow-md">
                <thead>
                    <tr class="bg-gray-200 text-gray-700">
                        <th class="px-4 py-2 border">INVOICE</th>
                        <th class="px-4 py-2 border">JENIS</th>
                        <th class="px-4 py-2 border">INSTANCE</th>
                        <th class="px-4 py-2 border">PERUSAHAAN</th>
                        <th class="px-4 py-2 border">TGL TERBIT</th>
                        <th class="px-4 py-2 border">BATAS BAYAR</th>
                        <th class="px-4 py-2 border">TGL BAYAR</th>
                        <th class="px-4 py-2 border">TOTAL</th>
                    </tr>
                </thead>
                <tbody>
                    {{-- @foreach ($subscriptions as $sub)
                        <tr class="text-center">
                            <td class="px-4 py-2 border">INV-{{ str_pad($sub->id, 5, '0', STR_PAD_LEFT) }}</td>
                            <td class="px-4 py-2 border">{{ ucfirst($sub->siklus) }}</td>
                            <td class="px-4 py-2 border">{{ $sub->data_center }}</td>
                            <td class="px-4 py-2 border">{{ $sub->nama_perusahaan }}</td>
                            <td class="px-4 py-2 border">{{ $sub->created_at->format('d-m-Y') }}</td>
                            <td class="px-4 py-2 border">
                                {{ $sub->created_at->addDays(7)->format('d-m-Y') }}
                            </td>
                            <td class="px-4 py-2 border">
                                @if($sub->status == 'dibayar')
                                    {{ $sub->updated_at->format('d-m-Y') }}
                                @else
                                    -
                                @endif
                            </td>
                            <td class="px-4 py-2 border">Rp {{ number_format($sub->harga, 0, ',', '.') }}</td>
                        </tr>
                    @endforeach --}}
                </tbody>
            </table>
        </div>
    </div>
</body>
</html>
