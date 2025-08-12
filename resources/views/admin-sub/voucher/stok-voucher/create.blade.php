{{-- resources/views/vouchers/create.blade.php --}}
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Buat Voucher</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body { background-color: #0d1117; color: white; }
        .form-control, .form-select { background-color: #161b22; color: white; border: 1px solid #30363d; }
        .form-control:focus, .form-select:focus { background-color: #1c2128; color: white; }
        label { margin-top: 10px; font-weight: 500; }
        .text-muted { color: #8b949e !important; }
        .alert { margin-bottom: 20px; }
        .preview-section { 
            background-color: #161b22; 
            border: 1px solid #30363d; 
            padding: 15px; 
            border-radius: 6px; 
            margin-top: 20px; 
        }
        .preview-item { margin-bottom: 5px; }
        .preview-label { font-weight: bold; color: #58a6ff; }
    </style>
</head>
<body>
    <!-- Sidebar -->
    {{-- @include('layouts.subadminbar') --}}

<div class="container py-4">
    <h4 class="mb-4">Buat Voucher</h4>

    {{-- Display flash messages --}}
    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    @if (session('error'))
        <div class="alert alert-danger">{{ session('error') }}</div>
    @endif

    {{-- Display validation errors --}}
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('stokvoucher.store') }}" method="POST" id="voucherForm">
        @csrf

        <div class="row">
            <div class="col-md-8">
                {{-- Mitra --}}
                <div class="mb-3">
                    <label for="reseller_id" class="form-label">Mitra</label>
                    <select name="reseller_id" id="reseller_id" class="form-select">
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
                    <small class="text-muted">Komisi otomatis dihilangkan apabila mitranya SYSTEM</small>
                </div>

                {{-- Potong saldo --}}
                <div class="mb-3">
                    <label class="form-label">Potong Saldo</label>
                    <select name="saldo" class="form-select">
                        <option value="YES" {{ old('saldo', 'YES') == 'YES' ? 'selected' : '' }}>YES</option>
                        <option value="NO" {{ old('saldo') == 'NO' ? 'selected' : '' }}>NO</option>
                    </select>
                </div>

                <div class="row">
                    <div class="col-md-6">
                        {{-- Router --}}
                        <div class="mb-3">
                            <label class="form-label">Router</label>
                            <input type="text" id="router" name="router" class="form-control" value="{{ old('router') }}" readonly>
                        </div>
                    </div>
                    <div class="col-md-6">
                        {{-- Server --}}
                        <div class="mb-3">
                            <label class="form-label">Server</label>
                            <input type="text" id="server" name="server" class="form-control" value="{{ old('server') }}" readonly>
                        </div>
                    </div>
                </div>

                {{-- Profile --}}
                <div class="mb-3">
                    <label class="form-label">Profile <span class="text-danger">*</span></label>
                    <select name="profile_voucher_id" id="profile_voucher_id" class="form-select" required>
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

                {{-- Jenis voucher --}}
                <div class="mb-3">
                    <label class="form-label">Jenis Voucher</label>
                    <select name="jenis_voucher" class="form-select" required>
                        <option value="username_password" {{ old('jenis_voucher', 'username_password') == 'username_password' ? 'selected' : '' }}>Username = Password</option>
                        <option value="username_only" {{ old('jenis_voucher') == 'username_only' ? 'selected' : '' }}>Username + Password Terpisah</option>
                    </select>
                </div>

                {{-- Kode Kombinasi --}}
                <div class="mb-3">
                    <label class="form-label">Kode Kombinasi</label>
                    <select class="form-select" name="kode_kombinasi" required>
                        <option value="Abcdefghjklmnp" {{ old('kode_kombinasi', 'Abcdefghjklmnp') == 'Abcdefghjklmnp' ? 'selected' : '' }}>Abcdefghjklmnp</option>
                        <option value="abcdefghjklmnp" {{ old('kode_kombinasi') == 'abcdefghjklmnp' ? 'selected' : '' }}>abcdefghjklmnp</option>
                        <option value="ABCDEFGHJKLMN" {{ old('kode_kombinasi') == 'ABCDEFGHJKLMN' ? 'selected' : '' }}>ABCDEFGHJKLMN</option>
                        <option value="aBcDefGhJKmn" {{ old('kode_kombinasi') == 'aBcDefGhJKmn' ? 'selected' : '' }}>aBcDefGhJKmn</option>
                        <option value="123456789563343" {{ old('kode_kombinasi') == '123456789563343' ? 'selected' : '' }}>123456789563343</option>
                        <option value="123456abcdefgkh" {{ old('kode_kombinasi') == '123456abcdefgkh' ? 'selected' : '' }}>123456abcdefgkh</option>
                        <option value="456789ABCDEFGHJ" {{ old('kode_kombinasi') == '456789ABCDEFGHJ' ? 'selected' : '' }}>456789ABCDEFGHJ</option>
                        <option value="56789aBcDefgiJKlm" {{ old('kode_kombinasi') == '56789aBcDefgiJKlm' ? 'selected' : '' }}>56789aBcDefgiJKlm</option>
                    </select>
                </div>

                <div class="row">
                    <div class="col-md-6">
                        {{-- Prefix --}}
                        <div class="mb-3">
                            <label class="form-label">Prefix</label>
                            <input type="text" name="prefix" class="form-control" placeholder="Opsional" value="{{ old('prefix') }}" maxlength="20">
                        </div>
                    </div>
                    <div class="col-md-6">
                        {{-- Panjang karakter --}}
                        <div class="mb-3">
                            <label class="form-label">Panjang Karakter</label>
                            <input type="number" name="panjang_karakter" class="form-control" value="{{ old('panjang_karakter', '6') }}" min="4" max="20" required>
                        </div>
                    </div>
                </div>

                {{-- Outlet --}}
                <div class="mb-3">
                    <label class="form-label">Outlet</label>
                    <input type="text" name="outlet" class="form-control" value="{{ old('outlet', 'DEFAULT') }}">
                </div>

                {{-- Jumlah --}}
                <div class="mb-3">
                    <label class="form-label">Jumlah Voucher <span class="text-danger">*</span></label>
                    <input type="number" id="jumlah" name="jumlah" class="form-control" value="{{ old('jumlah', '10') }}" min="1" max="1000" required>
                    <small class="text-muted">Maksimal 1000 voucher per batch</small>
                </div>
            </div>

            <div class="col-md-4">
                {{-- Preview Section --}}
                <div class="preview-section">
                    <h6 class="mb-3">📋 Preview Harga</h6>
                    
                    <div class="mb-3">
                        <label class="form-label">HPP (Per Voucher)</label>
                        <input type="number" id="hpp" name="hpp" class="form-control" step="0.01" value="{{ old('hpp', '0') }}" readonly>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">HJK (Per Voucher)</label>
                        <input type="number" id="hjk" name="hjk" class="form-control" step="0.01" value="{{ old('hjk', '0') }}" readonly>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Komisi (Per Voucher)</label>
                        <input type="number" id="komisi" name="komisi" class="form-control" step="0.01" value="{{ old('komisi', '0') }}" readonly>
                    </div>

                    <hr>

                    <div class="mb-2">
                        <div class="preview-item">
                            <span class="preview-label">Total HPP:</span>
                            <span id="preview_total_hpp">Rp 0</span>
                        </div>
                    </div>

                    <div class="mb-2">
                        <div class="preview-item">
                            <span class="preview-label">Total Komisi:</span>
                            <span id="preview_total_komisi">Rp 0</span>
                        </div>
                    </div>

                    <div class="mb-2">
                        <div class="preview-item">
                            <span class="preview-label">Total HJK:</span>
                            <span id="preview_total_hjk">Rp 0</span>
                        </div>
                    </div>

                    {{-- Hidden total fields --}}
                    <input type="hidden" id="total_hpp" name="total_hpp" value="{{ old('total_hpp', '0') }}">
                    <input type="hidden" id="total_komisi" name="total_komisi" value="{{ old('total_komisi', '0') }}">
                </div>
            </div>
        </div>

        {{-- Tombol --}}
        <div class="mt-4">
            <button type="reset" class="btn btn-warning">Reset</button>
            <button type="submit" class="btn btn-primary" id="submitBtn">
                <span id="submitText">Buat Voucher</span>
                <span id="submitSpinner" class="spinner-border spinner-border-sm ms-2" style="display: none;"></span>
            </button>
        </div>
    </form>
</div>

<script>
    function formatRupiah(amount) {
        return new Intl.NumberFormat('id-ID', {
            style: 'currency',
            currency: 'IDR',
            minimumFractionDigits: 0,
            maximumFractionDigits: 2
        }).format(amount);
    }

    // Ambil router & server saat pilih mitra
    document.getElementById('reseller_id').addEventListener('change', function() {
        let selected = this.options[this.selectedIndex];
        document.getElementById('router').value = selected.dataset.router || '';
        document.getElementById('server').value = selected.dataset.server || '';
        
        // Check if reseller is SYSTEM (remove commission)
        const komisiField = document.getElementById('komisi');
        if (selected.text.toUpperCase().includes('SYSTEM')) {
            komisiField.value = 0;
            hitungTotal();
        }
    });

    // Ambil HPP, HJK, Komisi saat pilih profile
    document.getElementById('profile_voucher_id').addEventListener('change', function() {
        let selected = this.options[this.selectedIndex];
        let hpp = parseFloat(selected.dataset.hpp || 0);
        let hjk = parseFloat(selected.dataset.hjk || 0);
        let komisi = parseFloat(selected.dataset.komisi || 0);
        
        document.getElementById('hpp').value = hpp;
        document.getElementById('hjk').value = hjk;
        document.getElementById('komisi').value = komisi;
        hitungTotal();
    });

    // Hitung total saat jumlah berubah
    document.getElementById('jumlah').addEventListener('input', hitungTotal);

    function hitungTotal() {
        let jumlah = parseFloat(document.getElementById('jumlah').value || 0);
        let hpp = parseFloat(document.getElementById('hpp').value || 0);
        let komisi = parseFloat(document.getElementById('komisi').value || 0);
        let hjk = parseFloat(document.getElementById('hjk').value || 0);

        let totalHpp = jumlah * hpp;
        let totalKomisi = jumlah * komisi;
        let totalHjk = jumlah * hjk;

        // Update hidden fields
        document.getElementById('total_hpp').value = totalHpp;
        document.getElementById('total_komisi').value = totalKomisi;

        // Update preview
        document.getElementById('preview_total_hpp').textContent = formatRupiah(totalHpp);
        document.getElementById('preview_total_komisi').textContent = formatRupiah(totalKomisi);
        document.getElementById('preview_total_hjk').textContent = formatRupiah(totalHjk);
    }

    // Form validation and submission
    document.getElementById('voucherForm').addEventListener('submit', function(e) {
        const submitBtn = document.getElementById('submitBtn');
        const submitText = document.getElementById('submitText');
        const submitSpinner = document.getElementById('submitSpinner');
        
        // Basic validation
        const requiredFields = ['profile_voucher_id', 'jumlah', 'jenis_voucher', 'kode_kombinasi'];
        let isValid = true;
        
        requiredFields.forEach(fieldName => {
            const field = document.querySelector(`[name="${fieldName}"]`);
            if (!field.value) {
                isValid = false;
                field.classList.add('is-invalid');
                field.focus();
            } else {
                field.classList.remove('is-invalid');
            }
        });
        
        if (!isValid) {
            e.preventDefault();
            alert('Mohon lengkapi semua field yang wajib diisi');
            return;
        }

        // Check if amounts are valid
        const hpp = parseFloat(document.getElementById('hpp').value || 0);
        const jumlah = parseInt(document.getElementById('jumlah').value || 0);
        
        if (hpp <= 0) {
            e.preventDefault();
            alert('Pilih profile dengan HPP yang valid');
            document.getElementById('profile_voucher_id').focus();
            return;
        }

        if (jumlah <= 0 || jumlah > 1000) {
            e.preventDefault();
            alert('Jumlah voucher harus antara 1-1000');
            document.getElementById('jumlah').focus();
            return;
        }

        // Show loading state
        submitBtn.disabled = true;
        submitText.textContent = 'Membuat Voucher...';
        submitSpinner.style.display = 'inline-block';
    });

    // Initialize calculations on page load
    document.addEventListener('DOMContentLoaded', function() {
        // If there's old input for profile, trigger the change event
        const profileSelect = document.getElementById('profile_voucher_id');
        if (profileSelect.value) {
            profileSelect.dispatchEvent(new Event('change'));
        }
        
        // If there's old input for reseller, trigger the change event
        const resellerSelect = document.getElementById('reseller_id');
        if (resellerSelect.value) {
            resellerSelect.dispatchEvent(new Event('change'));
        }

        // Initial calculation
        hitungTotal();
    });

    // Reset form
    document.querySelector('button[type="reset"]').addEventListener('click', function() {
        setTimeout(() => {
            document.getElementById('hpp').value = 0;
            document.getElementById('hjk').value = 0;
            document.getElementById('komisi').value = 0;
            document.getElementById('router').value = '';
            document.getElementById('server').value = '';
            hitungTotal();
        }, 100);
    });
</script>

</body>
</html>