<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Stok Voucher</title>

    {{-- Tailwind & Bootstrap --}}
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">

    {{-- DataTables CSS --}}
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/dataTables.bootstrap5.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.5.0/css/responsive.bootstrap5.min.css">
</head>
<body class="bg-gray-100 min-h-screen p-6">

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

    <div class="sm:ml-64">
        <div class="flex flex-col mb-6 items-start">
            <header class="w-full text-center mb-14 border-b pb-6 border-indigo-200">
                <h2 class="text-4xl font-bold text-gray-800">Daftar Stok Voucher</h2>
            </header>

            <a href="{{ route('stokvoucher.create') }}" 
               class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded">
                + Tambah Stok Voucher
            </a>
        </div>

        <div class="bg-white rounded shadow card-body p-3">
            <table id="stokVouchers" 
                   class="table table-bordered table-striped align-middle w-100 nowrap">
                <thead class="bg-gray-800 text-white">
                    <tr class="text-center">
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
                <tbody class="divide-y divide-gray-200 text-sm text-center">
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
                            <td>
                                @if($voucher->mac)
                                    <i class="fa-solid fa-lock-open text-green-600"></i> 
                                @else
                                    <i class="fa-solid fa-lock text-red-600"></i>
                                @endif
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    {{-- JQuery & DataTables --}}
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/dataTables.bootstrap5.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.5.0/js/dataTables.responsive.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.5.0/js/responsive.bootstrap5.min.js"></script>

    <script>
        $(document).ready(function() {
            $('#stokVouchers').DataTable({
                pageLength: 10,
                lengthMenu: [[10, 25, 50, 100], [10, 25, 50, 100]],
                ordering: false,
                responsive: true,   // ✅ bikin tabel adaptif
                autoWidth: false    // ✅ cegah tabel auto melar
            });
        });
    </script>

</body>
</html>
