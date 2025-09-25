<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Router</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        .secret-text {
            position: relative;
            cursor: pointer;
        }
        .secret-text::after {
            content: attr(data-secret);
            position: absolute;
            left: 0;
            top: 0;
            background: white;
            padding: 0 4px;
            opacity: 0;
            transition: opacity 0.2s;
            white-space: nowrap;
            border-radius: 4px;
            z-index: 10;
        }
        .secret-text:hover::after {
            opacity: 1;
        }
    </style>
    <script>
        function toggleIpField() {
            const tipe = document.getElementById('tipe_koneksi').value;
            const ipField = document.getElementById('ip_field');
            if (tipe === 'ip_public') {
                ipField.classList.remove('hidden');
            } else {
                ipField.classList.add('hidden');
            }
        }

        function setDefaultIpIfVPN() {
            const tipe = document.getElementById('tipe_koneksi').value;
            const ipInput = document.querySelector('input[name="ip_address"]');
            if (tipe === 'vpn_radius') {
                ipInput.value = "172.31." + Math.floor(Math.random()*256) + "." + Math.floor(Math.random()*256);
            }
        }

        function openModal() {
            document.getElementById('createModal').classList.remove('hidden');
        }

        function closeModal() {
            document.getElementById('createModal').classList.add('hidden');
        }
    </script>
</head>
<body class="bg-gray-100 text-gray-900">

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

    <div class="p-6 sm:ml-64">
        <div class="bg-white rounded-lg shadow p-4">
            <header class="text-center mb-14 border-b pb-6 border-indigo-200">
                <h2 class="text-4xl font-bold text-gray-800">Daftar Router</h2>
            </header>

            <!-- Tombol buka modal -->
            <button onclick="openModal()" 
               class="px-4 py-2 mb-3 inline-block bg-blue-600 hover:bg-blue-700 text-white text-sm rounded ">
                Tambah Router
            </button>

            <!-- Table -->
            <div class="overflow-x-auto">
                <table class="min-w-full text-sm text-left text-gray-700 border border-gray-200">
                    <thead class="bg-gray-50 text-gray-600 uppercase text-xs">
                        <tr>
                            <th class="px-4 py-3 border">Nama Router</th>
                            <th class="px-4 py-3 border">Tipe Koneksi</th>
                            <th class="px-4 py-3 border">IP Address</th>
                            <th class="px-4 py-3 border">Secret</th>
                            <th class="px-4 py-3 border">Online</th>
                            <th class="px-4 py-3 border">Script</th>
                            <th class="px-4 py-3 border">SNMP</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($routers as $router)
                            <tr class="border-b hover:bg-gray-50">
                                <td class="px-4 py-2 border">{{ $router->nama_router }}</td>
                                <td class="px-4 py-2 border">
                                    {{ $router->tipe_koneksi == 'ip_public' ? 'IP PUBLIC' : 
                                    ($router->tipe_koneksi == 'vpn_radius' ? 'VPN RADIUS' : $router->tipe_koneksi) }}
                                </td>
                                <td class="px-4 py-2 border">{{ $router->ip_address ?? '-' }}</td>
                                <td class="px-4 py-2 border">
                                    <span class="secret-text text-gray-600" data-secret="{{ $router->secret }}">
                                        **********
                                    </span>
                                </td>
                                <td class="px-4 py-2 border">
                                    @if($router->online)
                                        <span class="px-2 py-1 text-xs font-semibold text-green-700 bg-green-100 rounded">Online</span>
                                    @else
                                        <span class="px-2 py-1 text-xs font-semibold text-red-700 bg-red-100 rounded">Offline</span>
                                    @endif
                                </td>
                                <td class="px-4 py-2 border">
                                    <a href="{{ route('routers.download', $router->id) }}" 
                                       class="px-3 py-1 text-xs bg-blue-600 hover:bg-blue-700 text-white rounded">
                                        Download
                                    </a>
                                </td>
                                <td class="px-4 py-2 border text-center">
                                    @if($router->snmp_status)
                                        <button 
                                            class="px-3 py-1 text-xs font-semibold text-green-700 bg-green-100 border border-green-300 rounded hover:bg-green-200 transition"
                                            onclick="alert('SNMP Connected: {{ $router->nama_router }}')">
                                            Connected
                                        </button>
                                    @else
                                        <button 
                                            class="px-3 py-1 text-xs font-semibold text-red-700 bg-red-100 border border-red-300 rounded hover:bg-red-200 transition"
                                            onclick="alert('SNMP Disconnected: {{ $router->nama_router }}')">
                                            Disconnected
                                        </button>
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- Modal Create Router -->
    <div id="createModal" class="hidden fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50">
        <div class="bg-white p-6 rounded-lg shadow-lg w-full max-w-lg relative">
            <button onclick="closeModal()" class="absolute top-2 right-2 text-gray-500 hover:text-gray-700">✖</button>
            <h1 class="text-2xl font-bold mb-4">Tambah Router MikroTik</h1>

            <form action="{{ route('routers.store') }}" method="POST" class="space-y-4" onsubmit="setDefaultIpIfVPN()">
                @csrf

                <!-- Nama Router -->
                <div>
                    <label class="block font-medium mb-1">Nama Router</label>
                    <input type="text" name="nama_router" 
                           class="w-full border border-gray-300 rounded px-3 py-2 focus:ring focus:ring-blue-200 focus:border-blue-500" 
                           required>
                </div>

                <!-- Tipe Koneksi -->
                <div>
                    <label class="block font-medium mb-1">Tipe Koneksi</label>
                    <select name="tipe_koneksi" id="tipe_koneksi" onchange="toggleIpField()" 
                            class="w-full border border-gray-300 rounded px-3 py-2 focus:ring focus:ring-blue-200 focus:border-blue-500" 
                            required>
                        <option value="">- Pilih -</option>
                        <option value="ip_public">IP Public</option>
                        <option value="vpn_radius">VPN Radius</option>
                    </select>
                </div>

                <!-- IP Address -->
                <div class="hidden" id="ip_field">
                    <label class="block font-medium mb-1">IP Address</label>
                    <input type="text" name="ip_address" placeholder="Contoh: 123.45.67.89" 
                           class="w-full border border-gray-300 rounded px-3 py-2 focus:ring focus:ring-blue-200 focus:border-blue-500">
                </div>

                <!-- Submit -->
                <div class="pt-2">
                    <button type="submit" 
                            class="w-full bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded transition">
                        Simpan
                    </button>
                </div>
            </form>
        </div>
    </div>

</body>
</html>
