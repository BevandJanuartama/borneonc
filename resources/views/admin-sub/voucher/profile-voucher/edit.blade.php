<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Profile Voucher</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

    <!-- Sidebar -->
    @include('layouts.subadminbar')

<div class="container py-4" style="margin-left: 250px;">
    <h2 class="mb-4">Edit Profile Voucher</h2>

    <div class="card shadow-sm">
        <div class="card-body">
            <form action="{{ route('voucher.update', $voucher->id) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="row g-3">
                    <div class="col-lg-9">
                        <label class="form-label">Nama profile</label>
                        <input type="text" class="form-control" name="nama_profile" value="{{ old('nama_profile', $voucher->nama_profile) }}" maxlength="200" required>
                    </div>

                    <div class="col-lg-6">
                        <label class="form-label">Mikrotik group</label>
                        <input type="text" class="form-control" name="mikrotik_group" value="{{ old('mikrotik_group', $voucher->mikrotik_group) }}" maxlength="64">
                        <div class="form-text">Harus sama dengan nama profile di mikrotik</div>
                    </div>

                    <div class="col-lg-6">
                        <label class="form-label">Mikrotik address list</label>
                        <input type="text" class="form-control" name="mikrotik_address_list" value="{{ old('mikrotik_address_list', $voucher->mikrotik_address_list) }}" maxlength="64">
                        <div class="form-text">Opsional, jika diisi maka setiap user akan ditambahkan ke Address List</div>
                    </div>

                    <div class="col-lg-10">
                        <label class="form-label">Mikrotik rate limit</label>
                        <input type="text" class="form-control" name="mikrotik_rate_limit" value="{{ old('mikrotik_rate_limit', $voucher->mikrotik_rate_limit) }}" maxlength="100">
                        <div class="form-text">Kosongkan untuk memakai limitasi profile Mikrotik</div>
                    </div>

                    <div class="col-lg-2">
                        <label class="form-label">Shared</label>
                        <input type="number" class="form-control" name="shared" value="{{ old('shared', $voucher->shared) }}" min="1" max="1000">
                    </div>

                    <div class="col-lg-10">
                        <label class="form-label">Kuota</label>
                        <input type="number" class="form-control" name="kuota" value="{{ old('kuota', $voucher->kuota) }}" min="0">
                    </div>

                    <div class="col-lg-2">
                        <label class="form-label">Satuan</label>
                        <select class="form-control" name="kuota_satuan">
                            <option value="UNLIMITED" {{ $voucher->kuota_satuan == 'UNLIMITED' ? 'selected' : '' }}>UNLIMITED</option>
                            <option value="MB" {{ $voucher->kuota_satuan == 'MB' ? 'selected' : '' }}>MB</option>
                            <option value="GB" {{ $voucher->kuota_satuan == 'GB' ? 'selected' : '' }}>GB</option>
                        </select>
                    </div>

                    <div class="col-lg-10">
                        <label class="form-label">Durasi</label>
                        <input type="number" class="form-control" name="durasi" value="{{ old('durasi', $voucher->durasi) }}" min="0">
                    </div>

                    <div class="col-lg-2">
                        <label class="form-label">Satuan</label>
                        <select class="form-control" name="durasi_satuan">
                            <option value="UNLIMITED" {{ $voucher->durasi_satuan == 'UNLIMITED' ? 'selected' : '' }}>UNLIMITED</option>
                            <option value="HARI" {{ $voucher->durasi_satuan == 'HARI' ? 'selected' : '' }}>HARI</option>
                            <option value="JAM" {{ $voucher->durasi_satuan == 'JAM' ? 'selected' : '' }}>JAM</option>
                            <option value="MENIT" {{ $voucher->durasi_satuan == 'MENIT' ? 'selected' : '' }}>MENIT</option>
                        </select>
                    </div>

                    <div class="col-lg-10">
                        <label class="form-label">Masa aktif</label>
                        <input type="number" class="form-control" name="masa_aktif" value="{{ old('masa_aktif', $voucher->masa_aktif) }}" min="1" max="5000">
                    </div>

                    <div class="col-lg-2">
                        <label class="form-label">Satuan</label>
                        <select class="form-control" name="masa_aktif_satuan">
                            <option value="HARI" {{ $voucher->masa_aktif_satuan == 'HARI' ? 'selected' : '' }}>HARI</option>
                            <option value="JAM" {{ $voucher->masa_aktif_satuan == 'JAM' ? 'selected' : '' }}>JAM</option>
                            <option value="MENIT" {{ $voucher->masa_aktif_satuan == 'MENIT' ? 'selected' : '' }}>MENIT</option>
                        </select>
                    </div>

                    <div class="col-lg-6">
                        <label class="form-label">HPP</label>
                        <input type="text" class="form-control" name="hpp" value="{{ old('hpp', $voucher->hpp) }}">
                        <div class="form-text">Harga pokok produksi</div>
                    </div>

                    <div class="col-lg-6">
                        <label class="form-label">Komisi</label>
                        <input type="text" class="form-control" name="komisi" value="{{ old('komisi', $voucher->komisi) }}">
                        <div class="form-text">Komisi reseller setiap voucher</div>
                    </div>

                    <div class="col-lg-6">
                        <label class="form-label">HJK</label>
                        <input type="text" class="form-control" name="hjk" value="{{ old('hjk', $voucher->hjk) }}">
                        <div class="form-text">Harga jual ke konsumen</div>
                    </div>
                </div>

                <div class="mt-4">
                    <a href="{{ route('voucher.index') }}" class="btn btn-secondary">Kembali</a>
                    <button type="submit" class="btn btn-primary">Update</button>
                </div>

            </form>
        </div>
    </div>
</div>

</body>
</html>
