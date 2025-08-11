<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Profile Voucher</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

    <!-- Sidebar -->
    @include('layouts.subadminbar')

<div class="container py-5" style="margin-left: 250px;">
    <h2 class="mb-4">Tambah Profile Voucher</h2>

    <div class="card shadow-sm">
        <div class="card-body">
            <form class="row g-3 needs-validation" novalidate 
                  action="{{ route('voucher.store') }}" 
                  method="POST" autocomplete="off">
                @csrf

                <div class="col-lg-12">
                    <label class="form-label">Nama Profile</label>
                    <input type="text" class="form-control" name="nama_profile" maxlength="200" required>
                </div>

                <div class="col-lg-6">
                    <label class="form-label">Mikrotik Group</label>
                    <input type="text" class="form-control" name="mikrotik_group" value="RLRADIUS" maxlength="64">
                    <div class="form-text">Harus sama dengan nama profile di Mikrotik</div>
                </div>

                <div class="col-lg-6">
                    <label class="form-label">Mikrotik Address List</label>
                    <input type="text" class="form-control" name="mikrotik_address_list" placeholder="Opsional" maxlength="64">
                    <div class="form-text">Jika diisi maka setiap user akan ditambahkan ke Address List</div>
                </div>

                <div class="col-lg-10">
                    <label class="form-label">Mikrotik Rate Limit</label>
                    <input type="text" class="form-control" name="mikrotik_rate_limit" value="1M/1500k 0/0 0/0 0/0 8 0/0" maxlength="100">
                    <div class="form-text">Kosongkan untuk menggunakan limitasi profile Mikrotik</div>
                </div>

                <div class="col-lg-2">
                    <label class="form-label">Shared</label>
                    <input type="number" class="form-control" name="shared" value="1" min="1" max="1000">
                </div>

                <div class="col-lg-10">
                    <label class="form-label">Kuota</label>
                    <input type="number" class="form-control" name="kuota" value="0" min="0">
                </div>

                <div class="col-lg-2">
                    <label class="form-label">Satuan Kuota</label>
                    <select class="form-control" name="kuota_satuan">
                        <option value="UNLIMITED">UNLIMITED</option>
                        <option value="MB">MB</option>
                        <option value="GB">GB</option>
                    </select>
                </div>

                <div class="col-lg-10">
                    <label class="form-label">Durasi</label>
                    <input type="number" class="form-control" name="durasi" value="0" min="0">
                    <div class="form-text">Nilai durasi harus kecil dari Masa Aktif</div>
                </div>

                <div class="col-lg-2">
                    <label class="form-label">Satuan Durasi</label>
                    <select class="form-control" name="durasi_satuan">
                        <option value="UNLIMITED">UNLIMITED</option>
                        <option value="HARI">HARI</option>
                        <option value="JAM">JAM</option>
                        <option value="MENIT">MENIT</option>
                    </select>
                </div>

                <div class="col-lg-10">
                    <label class="form-label">Masa Aktif</label>
                    <input type="number" class="form-control" name="masa_aktif" value="1" min="1" max="5000">
                </div>

                <div class="col-lg-2">
                    <label class="form-label">Satuan Masa Aktif</label>
                    <select class="form-control" name="masa_aktif_satuan">
                        <option value="HARI">HARI</option>
                        <option value="JAM">JAM</option>
                        <option value="MENIT">MENIT</option>
                    </select>
                </div>

                <div class="col-lg-6">
                    <label class="form-label">Harga Jual ke Konsumen (HJK)</label>
                    <input type="number" class="form-control" name="hjk" value="0" required>
                </div>

                <div class="col-lg-6">
                    <label class="form-label">Komisi</label>
                    <input type="number" class="form-control" name="komisi" value="0" required>
                </div>

                <div class="col-12 mt-4">
                    <a href="{{ route('voucher.index') }}" class="btn btn-secondary">Kembali</a>
                    <button type="reset" class="btn btn-warning">Reset</button>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>

            </form>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
