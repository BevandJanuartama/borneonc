<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Form Berlangganan</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
</head>
<body class="bg-gradient-to-br from-slate-50 to-blue-50 min-h-screen">

  @include('layouts.sidebar')

  <div class="max-w-5xl mx-auto py-8 px-4">
    <!-- Header -->
    <div class="text-center mb-8">
      <h1 class="text-4xl font-bold mt-8 text-gray-800 mb-2">Form Berlangganan</h1>
      <p class="text-gray-600">Pilih paket yang sesuai dengan kebutuhan bisnis Anda</p>
    </div>
    
    <div class="grid lg:grid-cols-3 gap-8">
      <!-- Form Section -->
      <div class="lg:col-span-2 space-y-6">
        
        <!-- DATA INSTANCE -->
        <div class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden">
          <div class="bg-gradient-to-r from-blue-600 to-indigo-600 p-6">
            <div class="flex items-center gap-3 text-white">
              <div class="w-10 h-10 bg-white/20 rounded-xl flex items-center justify-center">
                <i class="fas fa-server text-lg"></i>
              </div>
              <div>
                <h2 class="text-xl font-semibold">Data Instance</h2>
                <p class="text-blue-100 text-sm">Konfigurasi server dan paket</p>
              </div>
            </div>
          </div>
          
          <div class="p-6 space-y-5">
            <div>
              <label class="block text-sm font-medium text-gray-700 mb-2">
                <i class="fas fa-database mr-2 text-blue-500"></i>Data Center
              </label>
              <select id="dataCenter" name="data_center" class="w-full border border-gray-200 px-4 py-3 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all">
                <option value="IDC 3D JAKARTA">IDC 3D Jakarta</option>
                <option value="NCIX PEKANBARU">NCIX Pekanbaru</option>
              </select>
            </div>

            <div>
              <label class="block text-sm font-medium text-gray-700 mb-2">
                <i class="fas fa-globe mr-2 text-blue-500"></i>Subdomain
              </label>
              <div class="flex">
                <input type="text" id="subdomain" name="subdomain_url" class="border border-gray-200 w-full px-4 py-3 rounded-l-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all" placeholder="contohnama" />
                <span class="inline-flex items-center px-4 py-3 border border-l-0 border-gray-200 rounded-r-lg bg-gray-50 text-sm text-gray-600">.bncradius.com</span>
              </div>
              <p class="text-xs text-gray-500 mt-1">Subdomain harus unik dan belum digunakan</p>
            </div>

            <div>
              <label class="block text-sm font-medium text-gray-700 mb-2">
                <i class="fas fa-box mr-2 text-blue-500"></i>Pilih Paket
              </label>
              <select id="paket" name="paket_id" class="w-full border border-gray-200 px-4 py-3 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all" onchange="updateHarga()">
                @foreach ($pakets as $paket)
                  <option value="{{ $paket->id }}"
                      data-harga-bulanan="{{ $paket->harga_bulanan }}"
                      data-harga-tahunan="{{ $paket->harga_tahunan }}"
                      {{ (int) old('paket_id', $selectedPaketId) === $paket->id ? 'selected' : '' }}>
                      {{ $paket->nama }}
                  </option>
                @endforeach
              </select>
            </div>

            <div>
              <label class="block text-sm font-medium text-gray-700 mb-2">
                <i class="fas fa-calendar-alt mr-2 text-blue-500"></i>Siklus Pembayaran
              </label>
              <div class="grid grid-cols-2 gap-3">
                <label class="relative">
                  <input type="radio" name="siklus" value="bulanan" class="peer sr-only" onchange="updateHarga()" checked>
                  <div class="w-full p-3 border-2 border-gray-200 rounded-lg cursor-pointer peer-checked:border-blue-500 peer-checked:bg-blue-50 transition-all text-center">
                    <div class="font-medium text-blue-500">Bulanan</div>
                  </div>
                </label>
                <label class="relative">
                  <input type="radio" name="siklus" value="tahunan" class="peer sr-only" onchange="updateHarga()">
                  <div class="w-full p-3 border-2 border-gray-200 rounded-lg cursor-pointer peer-checked:border-blue-500 peer-checked:bg-blue-50 transition-all text-center">
                    <div class="font-medium text-green-600">Tahunan</div>
                  </div>
                </label>
              </div>
            </div>
          </div>
        </div>

        <!-- DATA PERUSAHAAN -->
        <div class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden">
          <div class="bg-gradient-to-r from-indigo-600 to-purple-600 p-6">
            <div class="flex items-center gap-3 text-white">
              <div class="w-10 h-10 bg-white/20 rounded-xl flex items-center justify-center">
                <i class="fas fa-building text-lg"></i>
              </div>
              <div>
                <h2 class="text-xl font-semibold">Data Perusahaan</h2>
                <p class="text-indigo-100 text-sm">Informasi perusahaan Anda</p>
              </div>
            </div>
          </div>
          
          <div class="p-6 space-y-5">
            <div>
              <label class="block text-sm font-medium text-gray-700 mb-2">
                <i class="fas fa-building mr-2 text-indigo-500"></i>Nama Perusahaan
              </label>
              <input type="text" id="namaPerusahaan" name="nama_perusahaan" class="w-full border border-gray-200 px-4 py-3 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-transparent transition-all" placeholder="Masukkan nama perusahaan" required />
            </div>

            <div class="grid md:grid-cols-2 gap-4">
              <div>
                <label class="block text-sm font-medium text-gray-700 mb-2">
                  <i class="fas fa-map-marker-alt mr-2 text-indigo-500"></i>Provinsi
                </label>
                <select id="provinsi" name="provinsi" onchange="loadKabupaten()" class="w-full border border-gray-200 px-4 py-3 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-transparent transition-all" required>
                  <option value="">Pilih Provinsi</option>
                </select>
              </div>

              <div>
                <label class="block text-sm font-medium text-gray-700 mb-2">
                  <i class="fas fa-city mr-2 text-indigo-500"></i>Kabupaten/Kota
                </label>
                <select id="kabupaten" name="kabupaten" class="w-full border border-gray-200 px-4 py-3 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-transparent transition-all" required>
                  <option value="">Pilih Kabupaten/Kota</option>
                </select>
              </div>
            </div>

            <div>
              <label class="block text-sm font-medium text-gray-700 mb-2">
                <i class="fas fa-map mr-2 text-indigo-500"></i>Alamat Lengkap
              </label>
              <textarea id="alamat" name="alamat" class="w-full border border-gray-200 px-4 py-3 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-transparent transition-all resize-none" rows="3" placeholder="Masukkan alamat lengkap perusahaan" required></textarea>
            </div>

            <div>
              <label class="block text-sm font-medium text-gray-700 mb-2">
                <i class="fas fa-phone mr-2 text-indigo-500"></i>Nomor Telepon
              </label>
              <input type="text" class="w-full border border-gray-200 px-4 py-3 rounded-lg bg-gray-50 cursor-not-allowed" value="{{ Auth::user()->telepon }}" readonly />
            </div>

            <div>
              <label class="inline-flex items-center mt-2">
                <input type="checkbox" id="persetujuan" name="setuju" class="form-checkbox h-5 w-5 text-indigo-600 rounded">
                <span class="ml-2 text-gray-700">Saya menyetujui syarat dan ketentuan</span>
              </label>
            </div>
          </div>
        </div>

      </div>

      <!-- SUMMARY -->
      <div class="space-y-6">
        <div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-6 sticky top-6">
          <h2 class="text-xl font-semibold mb-4 text-gray-800">Ringkasan Pesanan</h2>
          
          <div class="space-y-3 mb-4">
            <div class="flex justify-between text-sm">
              <span class="text-gray-600">Nama Perusahaan:</span>
              <span id="summaryNama" class="font-medium text-gray-800">-</span>
            </div>
            <div class="flex justify-between text-sm">
              <span class="text-gray-600">Paket:</span>
              <span id="summaryPaket" class="font-medium text-gray-800">-</span>
            </div>
            <div class="flex justify-between text-sm">
              <span class="text-gray-600">Siklus:</span>
              <span id="summarySiklus" class="font-medium text-gray-800">Bulanan</span>
            </div>
          </div>
          
          <div class="border-t border-gray-200 pt-4 mb-4">
            <div class="flex justify-between items-center">
              <span class="text-gray-700 font-semibold">Total Harga:</span>
              <span id="summaryHarga" class="text-2xl font-bold text-indigo-600">Rp0</span>
            </div>
          </div>
          
          <button id="submitBtn" class="w-full bg-gradient-to-r from-indigo-600 to-purple-600 text-white py-3 rounded-lg hover:from-indigo-700 hover:to-purple-700 transition-all font-medium shadow-md hover:shadow-lg">
            <i class="fas fa-paper-plane mr-2"></i>Lanjut Pembayaran
          </button>
        </div>
      </div>

    </div>
  </div>

<script>
  // ===== Dummy Data Provinsi & Kabupaten =====
  const provinsiList = [
    {id: 1, name: 'Jawa Barat', kabupaten: ['Bandung', 'Bekasi', 'Bogor', 'Cirebon', 'Depok']},
    {id: 2, name: 'Jawa Timur', kabupaten: ['Surabaya', 'Malang', 'Kediri', 'Blitar', 'Jember']},
    {id: 3, name: 'Jawa Tengah', kabupaten: ['Semarang', 'Solo', 'Yogyakarta', 'Magelang', 'Purwokerto']},
    {id: 4, name: 'DKI Jakarta', kabupaten: ['Jakarta Pusat', 'Jakarta Utara', 'Jakarta Selatan', 'Jakarta Timur', 'Jakarta Barat']}
  ];

  const provinsiSelect = document.getElementById('provinsi');
  const kabupatenSelect = document.getElementById('kabupaten');

  // Populate provinsi
  provinsiList.forEach(p => {
    const option = document.createElement('option');
    option.value = p.name;
    option.textContent = p.name;
    provinsiSelect.appendChild(option);
  });

  function loadKabupaten() {
    const selected = provinsiList.find(p => p.name === provinsiSelect.value);
    kabupatenSelect.innerHTML = '<option value="">Pilih Kabupaten/Kota</option>';
    if(selected) {
      selected.kabupaten.forEach(k => {
        const option = document.createElement('option');
        option.value = k;
        option.textContent = k;
        kabupatenSelect.appendChild(option);
      });
    }
  }

  // ===== Update Summary =====
  const paketSelect = document.getElementById('paket');
  const namaPerusahaanInput = document.getElementById('namaPerusahaan');
  const siklusRadios = document.querySelectorAll('input[name="siklus"]');
  const hargaSpan = document.getElementById('summaryHarga');
  const summaryNama = document.getElementById('summaryNama');
  const summaryPaket = document.getElementById('summaryPaket');
  const summarySiklus = document.getElementById('summarySiklus');

  function updateHarga() {
    const paket = paketSelect.selectedOptions[0];
    const hargaBulanan = parseInt(paket.dataset.hargaBulanan || 0);
    const hargaTahunan = parseInt(paket.dataset.hargaTahunan || 0);
    const siklus = document.querySelector('input[name="siklus"]:checked').value;
    const harga = siklus === 'tahunan' ? hargaTahunan : hargaBulanan;
    
    hargaSpan.textContent = 'Rp' + harga.toLocaleString('id-ID');
    summaryNama.textContent = namaPerusahaanInput.value || '-';
    summaryPaket.textContent = paket.textContent.trim();
    summarySiklus.textContent = siklus.charAt(0).toUpperCase() + siklus.slice(1);
  }

  namaPerusahaanInput.addEventListener('input', updateHarga);
  paketSelect.addEventListener('change', updateHarga);
  siklusRadios.forEach(r => r.addEventListener('change', updateHarga));
  
  // Initial update
  updateHarga();

  // ===== Submit Form =====
  document.getElementById('submitBtn').addEventListener('click', function() {
    // Validasi checkbox persetujuan
    const setuju = document.getElementById('persetujuan').checked;
    if(!setuju){
      alert('Anda harus menyetujui syarat dan ketentuan.');
      return;
    }

    // Validasi field required
    const namaPerusahaan = namaPerusahaanInput.value.trim();
    const subdomain = document.getElementById('subdomain').value.trim();
    const provinsi = provinsiSelect.value;
    const kabupaten = kabupatenSelect.value;
    const alamat = document.getElementById('alamat').value.trim();

    if(!namaPerusahaan || !subdomain || !provinsi || !kabupaten || !alamat) {
      alert('Mohon lengkapi semua data yang diperlukan.');
      return;
    }

    // Hitung harga sesuai siklus
    const paket = paketSelect.selectedOptions[0];
    const hargaBulanan = parseFloat(paket.dataset.hargaBulanan || 0);
    const hargaTahunan = parseFloat(paket.dataset.hargaTahunan || 0);
    const siklus = document.querySelector('input[name="siklus"]:checked').value;
    const harga = siklus === 'tahunan' ? hargaTahunan : hargaBulanan;

    const data = {
      data_center: document.getElementById('dataCenter').value,
      subdomain_url: subdomain,
      siklus: siklus,
      paket_id: paketSelect.value,
      harga: harga,
      nama_perusahaan: namaPerusahaan,
      provinsi: provinsi,
      kabupaten: kabupaten,
      alamat: alamat,
      setuju: 1
    };

    // Disable button saat proses
    const submitBtn = document.getElementById('submitBtn');
    submitBtn.disabled = true;
    submitBtn.innerHTML = '<i class="fas fa-spinner fa-spin mr-2"></i>Memproses...';

    fetch('/subs', {
      method: 'POST',
      headers: {
        'Content-Type': 'application/json',
        'X-CSRF-TOKEN': '{{ csrf_token() }}'
      },
      body: JSON.stringify(data)
    })
    .then(res => res.json())
    .then(res => {
      if(res.success){
        alert('Berhasil! Pesanan Anda sedang diproses.');
        window.location.href = '/invoice'; // Redirect ke halaman daftar subscription
      } else {
        // Tampilkan error validasi
        if(res.errors) {
          let errorMsg = 'Terjadi kesalahan:\n';
          for(let field in res.errors) {
            errorMsg += '- ' + res.errors[field].join(', ') + '\n';
          }
          alert(errorMsg);
        } else {
          alert('Gagal: ' + (res.message || 'Terjadi kesalahan. Silakan coba lagi.'));
        }
        
        // Enable button kembali
        submitBtn.disabled = false;
        submitBtn.innerHTML = '<i class="fas fa-paper-plane mr-2"></i>Lanjut Pembayaran';
      }
    })
    .catch(err => {
      console.error(err);
      alert('Terjadi kesalahan saat submit. Silakan coba lagi.');
      
      // Enable button kembali
      submitBtn.disabled = false;
      submitBtn.innerHTML = '<i class="fas fa-paper-plane mr-2"></i>Lanjut Pembayaran';
    });
  });
</script>

</body>
</html>