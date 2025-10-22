<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Daftar Invoice</title>
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
                        <th class="px-4 py-2 border">Perusahaan</th>
                        <th class="px-4 py-2 border">Paket</th>
                        <th class="px-4 py-2 border">Siklus</th>
                        <th class="px-4 py-2 border">Harga</th>
                        <th class="px-4 py-2 border">Status</th>
                    </tr>
                </thead>
                <tbody id="invoice-table-body">
                    <!-- Data akan diisi lewat JS -->
                </tbody>
            </table>
        </div>
    </div>

<script>
document.addEventListener('DOMContentLoaded', function() {
    fetchInvoices();

    function fetchInvoices() {
        fetch("{{ route('subscription.user.json') }}") // route JSON khusus user
        .then(res => res.json())
        .then(data => {
            const tbody = document.getElementById('invoice-table-body');
            tbody.innerHTML = '';
            data.forEach(sub => {
                const tr = document.createElement('tr');
                tr.className = 'text-center';

                tr.innerHTML = `
                    <td class="px-4 py-2 border">${sub.nama_perusahaan}</td>
                    <td class="px-4 py-2 border">${sub.paket?.nama || '-'}</td>
                    <td class="px-4 py-2 border">${sub.siklus.charAt(0).toUpperCase() + sub.siklus.slice(1)}</td>
                    <td class="px-4 py-2 border">Rp ${Number(sub.harga).toLocaleString('id-ID')}</td>
                    <td class="px-4 py-2 border">${sub.status.charAt(0).toUpperCase() + sub.status.slice(1)}</td>
                `;
                tbody.appendChild(tr);
            });
        })
        .catch(err => console.error(err));
    }
});
</script>

</body>
</html>
