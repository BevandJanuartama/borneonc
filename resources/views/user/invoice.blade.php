<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Daftar Invoice</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        .currency-cell {
            text-align: right;
            font-family: ui-monospace, SFMono-Regular, Menlo, Monaco, Consolas, "Liberation Mono", "Courier New", monospace;
        }
    </style>
</head>
<body class="flex bg-gray-50 min-h-screen">
    
    <!-- Sidebar -->
    <div class="w-64 bg-white shadow-xl p-6">
        @include('layouts.sidebar')
    </div>

    <!-- Main content -->
    <div class="flex-1 p-10">
        <h1 class="text-3xl font-extrabold text-gray-800 mb-8 border-b pb-3">
            <svg class="inline w-7 h-7 mr-2 text-indigo-600" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
            </svg>
            Daftar Invoice
        </h1>

        <div class="shadow-2xl overflow-hidden sm:rounded-lg">
            <table class="min-w-full divide-y divide-gray-200 bg-white">
                <thead class="bg-indigo-600">
                    <tr>
                        <th class="px-6 py-3 text-left text-xs font-medium text-white uppercase tracking-wider">Perusahaan & Subdomain</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-white uppercase tracking-wider">Paket</th>
                        <th class="px-6 py-3 text-center text-xs font-medium text-white uppercase tracking-wider">Siklus</th>
                        <th class="px-6 py-3 text-right text-xs font-medium text-white uppercase tracking-wider">Harga</th>
                        <th class="px-6 py-3 text-center text-xs font-medium text-white uppercase tracking-wider">Status</th>
                        <th class="px-6 py-3 text-center text-xs font-medium text-white uppercase tracking-wider">Invoice</th>
                    </tr>
                </thead>
                <tbody id="invoice-table-body" class="bg-white divide-y divide-gray-200">
                    <tr class="h-20"><td colspan="6" class="text-center text-gray-400">Memuat data...</td></tr>
                </tbody>
            </table>
        </div>
    </div>

<script>
document.addEventListener('DOMContentLoaded', function() {
    
    function getStatusBadgeClass(status) {
        status = status ? status.toLowerCase() : '';
        return status === 'dibayar' ? 'bg-green-100 text-green-700' : 'bg-red-100 text-red-700';
    }
    
    const SUBDOMAIN_SUFFIX = '.bncradius.id';
    const tbody = document.getElementById('invoice-table-body');

    fetch("{{ route('subscription.user.json') }}")
    .then(res => res.json())
    .then(data => {
        tbody.innerHTML = '';

        if (data.length === 0) {
            tbody.innerHTML = '<tr class="h-20"><td colspan="6" class="text-center text-gray-500 italic">Tidak ada data invoice.</td></tr>';
            return;
        }

        data.forEach((sub, index) => {
            const tr = document.createElement('tr');
            tr.className = index % 2 === 0 ? 'bg-white hover:bg-gray-50 transition duration-150 ease-in-out' : 'bg-gray-50 hover:bg-gray-100 transition duration-150 ease-in-out';
            
            const subdomainBase = sub.subdomain_url || sub.subdomain || '-';
            const fullSubdomain = subdomainBase !== '-' ? subdomainBase + SUBDOMAIN_SUFFIX : '-';

            const formattedSiklus = sub.siklus ? sub.siklus.charAt(0).toUpperCase() + sub.siklus.slice(1) : '-';
            const formattedStatus = sub.status ? sub.status.charAt(0).toUpperCase() + sub.status.slice(1) : 'Unknown';
            const badgeClass = getStatusBadgeClass(sub.status);
            const formattedHarga = Number(sub.harga).toLocaleString('id-ID');

            const perusahaanCellContent = `
                <p class="text-sm font-medium text-gray-900">${sub.nama_perusahaan || '-'}</p>
                <p class="text-xs text-indigo-500 hover:text-indigo-600 transition duration-150 ease-in-out">
                    ${fullSubdomain}
                </p>
            `;

            const invoiceCellContent = sub.invoice?.file_path
                ? `<a href="/storage/${sub.invoice.file_path}" target="_blank" 
                      class="text-white bg-indigo-600 hover:bg-indigo-700 px-3 py-1 text-xs rounded-full transition duration-150 ease-in-out font-semibold inline-flex items-center">
                      <i class="fas fa-download mr-1"></i> Download
                   </a>`
                : '<span class="text-gray-400 italic text-xs">Belum tersedia</span>';

            tr.innerHTML = `
                <td class="px-6 py-4 whitespace-nowrap">${perusahaanCellContent}</td>
                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-600">${sub.paket?.nama || sub.nama_paket || '<span class="italic text-gray-400">Tidak ada paket</span>'}</td>
                <td class="px-6 py-4 whitespace-nowrap text-sm text-center text-gray-600">${formattedSiklus}</td>
                <td class="px-6 py-4 whitespace-nowrap text-sm font-semibold currency-cell text-gray-900">Rp ${formattedHarga}</td>
                <td class="px-6 py-4 whitespace-nowrap text-center">
                    <span class="px-3 py-1 inline-flex text-xs leading-5 font-semibold rounded-full ${badgeClass}">
                        ${formattedStatus}
                    </span>
                </td>
                <td class="px-6 py-4 whitespace-nowrap text-center">${invoiceCellContent}</td>
            `;
            tbody.appendChild(tr);
        });
    })
    .catch(err => {
        console.error('Error fetching invoices:', err);
        tbody.innerHTML = '<tr class="h-20"><td colspan="6" class="text-center text-red-500">Gagal memuat data. Silakan coba lagi.</td></tr>';
    });
});
</script>

</body>
</html>
