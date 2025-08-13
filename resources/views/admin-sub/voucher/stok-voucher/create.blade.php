{{-- resources/views/vouchers/create.blade.php --}}
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Buat Voucher</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-white text-black min-h-screen flex">

    <!-- Sidebar -->
    @include('layouts.subadminbar')

    <!-- Main Content -->
    <div class="flex-1 ml-64 p-6">
        <h4 class="text-xl font-semibold mb-6">Buat Voucher</h4>

        {{-- Flash & validation messages --}}
        @if (session('success'))
            <div class="bg-green-600 text-white px-4 py-2 rounded mb-4">{{ session('success') }}</div>
        @endif
        @if (session('error'))
            <div class="bg-red-600 text-white px-4 py-2 rounded mb-4">{{ session('error') }}</div>
        @endif
        @if ($errors->any())
            <div class="bg-red-600 text-white px-4 py-2 rounded mb-4">
                <ul class="list-disc list-inside">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('stokvoucher.store') }}" method="POST" id="voucherForm">
            @csrf
            <div class="grid grid-cols-12 gap-6">
                <!-- Form kiri (8 kolom) -->
                <div class="col-span-8 space-y-4">

                    {{-- Mitra --}}
                    <div>
                        <label for="reseller_id" class="block mb-1 font-medium">Mitra</label>
                        <select name="reseller_id" id="reseller_id" class="w-full p-2 rounded border border-gray-300">
                            <option value="">Pilih Mitra</option>
                            @foreach($resellers as $reseller)
                                <option value="{{ $reseller->id }}"
                                        data-router="{{ $reseller->hak_akses_router ?? '' }}"
                                        data-server="{{ $reseller->hak_akses_server ?? '' }}"
                                        {{ old('reseller_id') == $reseller->id ? 'selected' : '' }}>
                                    {{ $reseller->nama_lengkap }}
                                </option>
                            @endforeach
                        </select>
                        <small class="text-gray-500">Komisi otomatis dihilangkan apabila mitranya SYSTEM</small>
                    </div>

                    {{-- Potong Saldo --}}
                    <div>
                        <label class="block mb-1 font-medium">Potong Saldo</label>
                        <select name="saldo" class="w-full p-2 rounded border border-gray-300">
                            <option value="YES" {{ old('saldo', 'YES') == 'YES' ? 'selected' : '' }}>YES</option>
                            <option value="NO" {{ old('saldo') == 'NO' ? 'selected' : '' }}>NO</option>
                        </select>
                    </div>

                    {{-- Router & Server --}}
                    <div class="grid grid-cols-2 gap-4">
                        <div>
                            <label class="block mb-1 font-medium">Router</label>
                            <input type="text" id="router" name="router" class="w-full p-2 rounded border border-gray-300" readonly>
                        </div>
                        <div>
                            <label class="block mb-1 font-medium">Server</label>
                            <input type="text" id="server" name="server" class="w-full p-2 rounded border border-gray-300" readonly>
                        </div>
                    </div>

                    {{-- Profile --}}
                    <div>
                        <label class="block mb-1 font-medium">Profile <span class="text-red-500">*</span></label>
                        <select name="profile_voucher_id" id="profile_voucher_id" class="w-full p-2 rounded border border-gray-300" required>
                            <option value="">Pilih Profile</option>
                            @foreach($profiles as $profile)
                                <option value="{{ $profile->id }}"
                                        data-hpp="{{ $profile->hpp }}"
                                        data-hjk="{{ $profile->hjk }}"
                                        data-komisi="{{ $profile->komisi }}"
                                        {{ old('profile_voucher_id') == $profile->id ? 'selected' : '' }}>
                                    {{ $profile->nama_profile }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    {{-- Jenis Voucher --}}
                    <div>
                        <label class="block mb-1 font-medium">Jenis Voucher</label>
                        <select name="jenis_voucher" class="w-full p-2 rounded border border-gray-300" required>
                            <option value="username_password" {{ old('jenis_voucher', 'username_password') == 'username_password' ? 'selected' : '' }}>Username = Password</option>
                            <option value="username_only" {{ old('jenis_voucher') == 'username_only' ? 'selected' : '' }}>Username + Password Terpisah</option>
                        </select>
                    </div>

                    {{-- Kode Kombinasi --}}
                    <div>
                        <label class="block mb-1 font-medium">Kode Kombinasi</label>
                        <select name="kode_kombinasi" class="w-full p-2 rounded border border-gray-300" required>
                            <option value="Abcdefghjklmnp" {{ old('kode_kombinasi', 'Abcdefghjklmnp') == 'Abcdefghjklmnp' ? 'selected' : '' }}>Abcdefghjklmnp</option>
                            <option value="abcdefghjklmnp" {{ old('kode_kombinasi') == 'abcdefghjklmnp' ? 'selected' : '' }}>abcdefghjklmnp</option>
                            <option value="ABCDEFGHJKLMN" {{ old('kode_kombinasi') == 'ABCDEFGHJKLMN' ? 'selected' : '' }}>ABCDEFGHJKLMN</option>
                            <option value="aBcDefGhJKmn" {{ old('kode_kombinasi') == 'aBcDefGhJKmn' ? 'selected' : '' }}>aBcDefGhJKmn</option>
                        </select>
                    </div>

                    {{-- Prefix & Panjang Karakter --}}
                    <div class="grid grid-cols-2 gap-4">
                        <div>
                            <label class="block mb-1 font-medium">Prefix</label>
                            <input type="text" name="prefix" class="w-full p-2 rounded border border-gray-300" placeholder="Opsional" value="{{ old('prefix') }}">
                        </div>
                        <div>
                            <label class="block mb-1 font-medium">Panjang Karakter</label>
                            <input type="number" name="panjang_karakter" class="w-full p-2 rounded border border-gray-300" value="{{ old('panjang_karakter', 6) }}" min="4" max="20" required>
                        </div>
                    </div>

                    {{-- Outlet --}}
                    <div>
                        <label class="block mb-1 font-medium">Outlet</label>
                        <input type="text" name="outlet" class="w-full p-2 rounded border border-gray-300" value="{{ old('outlet', 'DEFAULT') }}">
                    </div>

                    {{-- Jumlah --}}
                    <div>
                        <label class="block mb-1 font-medium">Jumlah Voucher <span class="text-red-500">*</span></label>
                        <input type="number" id="jumlah" name="jumlah" class="w-full p-2 rounded border border-gray-300" value="{{ old('jumlah', 10) }}" min="1" max="1000" required>
                        <small class="text-gray-500">Maksimal 1000 voucher per batch</small>
                    </div>

                </div>

                <!-- Preview kanan (4 kolom) -->
                <div class="col-span-4 space-y-4">
                    <div class="bg-gray-100 p-4 rounded border border-gray-300">
                        <h5 class="mb-3 font-semibold">📋 Preview Harga</h5>

                        <div>
                            <label class="block mb-1">HPP (Per Voucher)</label>
                            <input type="number" id="hpp" name="hpp" class="w-full p-2 rounded border border-gray-300" readonly>
                        </div>
                        <div>
                            <label class="block mb-1">HJK (Per Voucher)</label>
                            <input type="number" id="hjk" name="hjk" class="w-full p-2 rounded border border-gray-300" readonly>
                        </div>
                        <div>
                            <label class="block mb-1">Komisi (Per Voucher)</label>
                            <input type="number" id="komisi" name="komisi" class="w-full p-2 rounded border border-gray-300" readonly>
                        </div>

                        <hr class="my-3 border-gray-300">

                        <div class="space-y-1 text-black">
                            <div><span class="font-semibold text-blue-600">Total HPP:</span> <span id="preview_total_hpp">Rp 0</span></div>
                            <div><span class="font-semibold text-blue-600">Total Komisi:</span> <span id="preview_total_komisi">Rp 0</span></div>
                            <div><span class="font-semibold text-blue-600">Total HJK:</span> <span id="preview_total_hjk">Rp 0</span></div>
                        </div>

                        <input type="hidden" id="total_hpp" name="total_hpp" value="0">
                        <input type="hidden" id="total_komisi" name="total_komisi" value="0">
                    </div>
                </div>
            </div>

            <!-- Tombol -->
            <div class="mt-4 flex space-x-2">
                <button type="reset" class="bg-yellow-400 px-4 py-2 rounded hover:bg-yellow-500">Reset</button>
                <button type="submit" class="bg-blue-600 px-4 py-2 rounded hover:bg-blue-700 flex items-center" id="submitBtn">
                    <span id="submitText">Buat Voucher</span>
                    <span id="submitSpinner" class="ml-2 hidden">⏳</span>
                </button>
            </div>
        </form>
    </div>

<script>
    function formatRupiah(amount) {
        return new Intl.NumberFormat('id-ID', { style: 'currency', currency: 'IDR', minimumFractionDigits: 0 }).format(amount);
    }

    const resellerSelect = document.getElementById('reseller_id');
    const profileSelect = document.getElementById('profile_voucher_id');
    const routerInput = document.getElementById('router');
    const serverInput = document.getElementById('server');
    const hppInput = document.getElementById('hpp');
    const hjkInput = document.getElementById('hjk');
    const komisiInput = document.getElementById('komisi');
    const jumlahInput = document.getElementById('jumlah');

    function hitungTotal() {
        const jumlah = parseFloat(jumlahInput.value || 0);
        const hpp = parseFloat(hppInput.value || 0);
        const komisi = parseFloat(komisiInput.value || 0);
        const hjk = parseFloat(hjkInput.value || 0);

        const totalHpp = jumlah * hpp;
        const totalKomisi = jumlah * komisi;
        const totalHjk = jumlah * hjk;

        document.getElementById('total_hpp').value = totalHpp;
        document.getElementById('total_komisi').value = totalKomisi;

        document.getElementById('preview_total_hpp').textContent = formatRupiah(totalHpp);
        document.getElementById('preview_total_komisi').textContent = formatRupiah(totalKomisi);
        document.getElementById('preview_total_hjk').textContent = formatRupiah(totalHjk);
    }

    resellerSelect.addEventListener('change', function() {
        const selected = this.options[this.selectedIndex];
        routerInput.value = selected.dataset.router || '';
        serverInput.value = selected.dataset.server || '';

        if (selected.text.toUpperCase().includes('SYSTEM')) {
            komisiInput.value = 0;
        }
        hitungTotal();
    });

    profileSelect.addEventListener('change', function() {
        const selected = this.options[this.selectedIndex];
        hppInput.value = selected.dataset.hpp || 0;
        hjkInput.value = selected.dataset.hjk || 0;
        komisiInput.value = selected.dataset.komisi || 0;
        hitungTotal();
    });

    jumlahInput.addEventListener('input', hitungTotal);

    document.addEventListener('DOMContentLoaded', function() {
        if (profileSelect.value) profileSelect.dispatchEvent(new Event('change'));
        if (resellerSelect.value) resellerSelect.dispatchEvent(new Event('change'));
        hitungTotal();
    });

    document.getElementById('voucherForm').addEventListener('submit', function(e) {
        const submitBtn = document.getElementById('submitBtn');
        const submitText = document.getElementById('submitText');
        const submitSpinner = document.getElementById('submitSpinner');

        const requiredFields = ['profile_voucher_id', 'jumlah', 'jenis_voucher', 'kode_kombinasi'];
        let isValid = true;

        requiredFields.forEach(fieldName => {
            const field = document.querySelector(`[name="${fieldName}"]`);
            if (!field.value) {
                isValid = false;
                field.focus();
            }
        });

        if (!isValid) {
            e.preventDefault();
            alert('Mohon lengkapi semua field yang wajib diisi');
            return;
        }

        const hpp = parseFloat(hppInput.value || 0);
        const jumlah = parseInt(jumlahInput.value || 0);

        if (hpp <= 0) {
            e.preventDefault();
            alert('Pilih profile dengan HPP yang valid');
            profileSelect.focus();
            return;
        }
        if (jumlah <= 0 || jumlah > 1000) {
            e.preventDefault();
            alert('Jumlah voucher harus antara 1-1000');
            jumlahInput.focus();
            return;
        }

        submitBtn.disabled = true;
        submitText.textContent = 'Membuat Voucher...';
        submitSpinner.classList.remove('hidden');
    });

    document.querySelector('button[type="reset"]').addEventListener('click', function() {
        setTimeout(() => {
            routerInput.value = '';
            serverInput.value = '';
            hppInput.value = 0;
            hjkInput.value = 0;
            komisiInput.value = 0;
            jumlahInput.value = 10;
            hitungTotal();
        }, 100);
    });
</script>

</body>
</html>
