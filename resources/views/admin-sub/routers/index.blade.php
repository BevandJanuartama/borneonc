<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Router</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        /* Biar secret muncul saat hover */
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
</head>
<body class="bg-gray-100 text-gray-900">

    @include('layouts.subadminbar')

    <div class="p-6 sm:ml-64">
        <div class="bg-white rounded-lg shadow p-4">
            <header class="text-center mb-14 border-b pb-6 border-indigo-200">
                <h2 class="text-4xl font-bold text-gray-800">Daftar Router</h2>
            </header>

            <a href="{{ route('routers.create') }}" 
               class="px-4 py-2 mb-3 inline-block bg-blue-600 hover:bg-blue-700 text-white text-sm rounded">
                Tambah Router
            </a>

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
                            <th class="px-4 py-3 border">OVPN</th> <!-- ✅ Tambahan -->
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
                                <td class="px-4 py-2 border">
                                    @if($router->ovpn_path)
                                        <a href="{{ route('routers.download.ovpn', $router->id) }}" 
                                           class="px-3 py-1 text-xs bg-purple-600 hover:bg-purple-700 text-white rounded">
                                           Download
                                        </a>
                                        <a href="{{ route('routers.view.ovpn', $router->id) }}" 
                                           class="px-3 py-1 text-xs bg-gray-600 hover:bg-gray-700 text-white rounded">
                                           View
                                        </a>
                                    @else
                                        <span class="text-gray-400 text-xs">-</span>
                                    @endif
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

</body>
</html>
