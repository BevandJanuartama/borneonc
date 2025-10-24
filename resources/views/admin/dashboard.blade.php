<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <title>Dashboard Admin - Daftar Langganan</title>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" crossorigin="anonymous" referrerpolicy="no-referrer" />

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
            box-shadow: 0 20px 25px -5px rgba(0, 0, 0, 0.1), 0 10px 10px -5px rgba(0, 0, 0, 0.04);
        }
        /* Styling khusus status (diperluas) */
        .status-dibayar { /* Mengganti .status-sudah-dibayar agar sesuai dengan logika PHP */
            background-color: #d1fae5; /* Hijau muda */
            color: #065f46; /* Hijau tua */
        }
        .status-belum-dibayar {
            background-color: #fee2e2; /* Merah muda */
            color: #991b1b; /* Merah tua */
        }
        .status-aktif {
            background-color: #bfdbfe; /* Biru muda */
            color: #1e40af; /* Biru tua */
        }
        /* Tambahkan status lain sesuai kebutuhan di logika PHP */
    </style>
</head>
<body class="bg-gray-50 flex min-h-screen">

    @include('layouts.adminbar')


    <main class="md:pl-72 w-full">
        
        <section id="subscriptions" class="py-10 md:py-16">
            <div class="container mx-auto px-4 sm:px-6 lg:px-8">
                <header class="mb-10">
                    <h2 class="text-3xl font-extrabold text-gray-900 sm:text-4xl">
                        Daftar Semua Langganan Pelanggan
                    </h2>
                    <p class="mt-2 text-lg text-gray-500">
                        Kelola dan tinjau semua permintaan langganan dari pengguna.
                    </p>
                </header>

                {{-- ASUMSI: Controller mengirimkan $totalIncome yang berisi total harga langganan 'dibayar' --}}
                <div class="mb-8 grid grid-cols-1 md:grid-cols-3 gap-6">
                    <div class="bg-white p-6 rounded-xl shadow-lg border-l-4 border-green-500 card-hover">
                        <div class="flex items-center justify-between">
                            <div>
                                <p class="text-sm font-medium text-gray-500 uppercase tracking-wider">Total Pendapatan (Dibayar)</p>
                                <p class="mt-1 text-3xl font-extrabold text-gray-900">
                                    Rp {{ number_format($totalIncome ?? 0, 0, ',', '.') }}
                                </p>
                            </div>
                            <div class="p-3 bg-green-100 rounded-full">
                                <i class="fas fa-money-bill-wave text-green-600 text-xl"></i>
                            </div>
                        </div>
                        <p class="text-xs text-gray-500 mt-3">Total kumulatif dari semua langganan yang telah dibayar.</p>
                    </div>
                    
                    {{-- Tambahkan card lain jika ada data statistik lain (misal: Total User, Langganan Aktif) --}}
                    <div class="bg-white p-6 rounded-xl shadow-lg border-l-4 border-indigo-500 card-hover">
                         <div class="flex items-center justify-between">
                            <div>
                                <p class="text-sm font-medium text-gray-500 uppercase tracking-wider">Total Langganan</p>
                                <p class="mt-1 text-3xl font-extrabold text-gray-900">
                                    {{ $subscriptions->total() }}
                                </p>
                            </div>
                            <div class="p-3 bg-indigo-100 rounded-full">
                                <i class="fas fa-users text-indigo-600 text-xl"></i>
                            </div>
                        </div>
                        <p class="text-xs text-gray-500 mt-3">Jumlah seluruh langganan, termasuk yang belum dibayar.</p>
                    </div>

                    <div class="bg-white p-6 rounded-xl shadow-lg border-l-4 border-yellow-500 card-hover">
                        <div class="flex items-center justify-between">
                            <div>
                                <p class="text-sm font-medium text-gray-500 uppercase tracking-wider">Sedang Menunggu Bayar</p>
                                <p class="mt-1 text-3xl font-extrabold text-gray-900">
                                    {{ $subscriptions->where('status', 'belum dibayar')->count() }}
                                </p>
                            </div>
                            <div class="p-3 bg-yellow-100 rounded-full">
                                <i class="fas fa-hourglass-half text-yellow-600 text-xl"></i>
                            </div>
                        </div>
                        <p class="text-xs text-gray-500 mt-3">Jumlah langganan yang masih menunggu konfirmasi pembayaran.</p>
                    </div>
                </div>
                <div class="overflow-x-auto bg-white shadow-lg rounded-lg">
                    <table class="min-w-full divide-y divide-gray-200">
                        <thead class="bg-indigo-600 text-white">
                            <tr>
                                <th class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider">No.</th>
                                <th class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider">Perusahaan & User</th>
                                <th class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider">Paket & Siklus</th>
                                <th class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider">Subdomain</th>
                                <th class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider">Harga</th>
                                <th class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider">Data Center</th>
                                <th class="px-6 py-3 text-center text-xs font-medium uppercase tracking-wider">Status</th>
                                <th class="px-6 py-3 text-center text-xs font-medium uppercase tracking-wider">Aksi Cepat</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                            @forelse ($subscriptions as $subs)
                                <tr class="hover:bg-gray-50">
                                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                                        {{ ($subscriptions->currentPage() - 1) * $subscriptions->perPage() + $loop->iteration }} 
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                        <div class="font-semibold text-gray-900">{{ $subs->nama_perusahaan }}</div>
                                        <div class="text-xs text-indigo-600 font-medium mt-1">
                                            User: {{ $subs->user->name ?? 'User Dihapus' }}
                                        </div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                        <span class="font-semibold">{{ $subs->paket->nama ?? 'N/A' }}</span> ({{ ucfirst($subs->siklus) }})
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500"><b>{{ $subs->subdomain_url }}</b>.bncradius.id</td>
                                    
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 font-semibold">
                                        Rp {{ number_format($subs->harga, 0, ',', '.') }}
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ $subs->data_center }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-center">
                                      @php
                                          $status = $subs->status;
                                          // Peta kelas status yang lebih terperinci
                                          $statusClass = [
                                              'dibayar' => 'status-dibayar',
                                              'belum dibayar' => 'status-belum-dibayar',
                                              'aktif' => 'status-aktif',
                                              'dibatalkan' => 'status-dibatalkan',
                                              'selesai' => 'status-selesai',
                                          ];
                                          $currentClass = $statusClass[strtolower($status)] ?? 'bg-gray-100 text-gray-700';
                                      @endphp

                                        <span class="px-3 py-1 inline-flex text-xs leading-5 font-semibold rounded-full {{ $currentClass }}">
                                            {{ ucfirst($status) }}
                                        </span>
                                    </td>

                                    <td class="px-6 py-4 whitespace-nowrap text-center text-sm font-medium space-x-2">
                                        @if ($subs->status == 'belum dibayar')
                                            <form action="{{ route('admin.subscription.updateStatus', $subs->id) }}" method="POST" class="inline-block">
                                                @csrf
                                                @method('PUT')
                                                <input type="hidden" name="status" value="dibayar">
                                                <button type="submit" 
                                                    title="Tandai pembayaran telah diterima" 
                                                    class="text-green-600 hover:text-white hover:bg-green-600 border border-green-600 px-3 py-1 text-xs rounded-full transition duration-150 ease-in-out font-semibold">
                                                    <i class="fas fa-check-circle"></i> Bayar
                                                </button>
                                            </form>
                                        @endif

                                        <form action="{{ route('admin.subscription.destroy', $subs->id) }}" method="POST" 
                                            class="inline-block"
                                            onsubmit="return confirm('Apakah Anda yakin ingin menghapus langganan ID {{ $subs->id }}? Aksi ini tidak dapat dibatalkan.');">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" 
                                                title="Hapus data langganan" 
                                                class="text-red-600 hover:text-white hover:bg-red-600 border border-red-600 px-3 py-1 text-xs rounded-full transition duration-150 ease-in-out font-semibold">
                                                <i class="fas fa-trash"></i> Hapus
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="9" class="px-6 py-8 text-center text-lg text-gray-500 italic">
                                        <i class="fas fa-info-circle mr-2"></i> Tidak ada data langganan yang ditemukan.
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>

                    @if ($subscriptions->lastPage() > 1)
                        <div class="px-4 py-3 border-t bg-gray-50 sm:px-6">
                            {{ $subscriptions->links() }}
                        </div>
                    @endif
                    
                </div>

            </div>
        </section>
        
    </main>


</body>
</html>