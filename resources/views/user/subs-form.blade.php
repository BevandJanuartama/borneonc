<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Form Berlangganan</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <script src="https://app.sandbox.midtrans.com/snap/snap.js" data-client-key="{{ config('midtrans.client_key') }}"></script>
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
              <select id="dataCenter" class="w-full border border-gray-200 px-4 py-3 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all">
                <option value="idc">IDC 3D Jakarta</option>
                <option value="ncix">NCIX Pekanbaru</option>
              </select>
            </div>

            <div>
              <label class="block text-sm font-medium text-gray-700 mb-2">
                <i class="fas fa-globe mr-2 text-blue-500"></i>Subdomain
              </label>
              <div class="flex">
                <input type="text" id="subdomain" class="border border-gray-200 w-full px-4 py-3 rounded-l-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all" placeholder="contohnama" />
                <span class="inline-flex items-center px-4 py-3 border border-l-0 border-gray-200 rounded-r-lg bg-gray-50 text-sm text-gray-600">.bncradius.com</span>
              </div>
            </div>

            <div>
              <label class="block text-sm font-medium text-gray-700 mb-2">
                <i class="fas fa-box mr-2 text-blue-500"></i>Pilih Paket
              </label>
              <select id="paket" class="w-full border border-gray-200 px-4 py-3 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all" onchange="updateHarga()">
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
              <input type="text" id="namaPerusahaan" class="w-full border border-gray-200 px-4 py-3 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-transparent transition-all" placeholder="Masukkan nama perusahaan" />
            </div>

            <div class="grid md:grid-cols-2 gap-4">
              <div>
                <label class="block text-sm font-medium text-gray-700 mb-2">
                  <i class="fas fa-map-marker-alt mr-2 text-indigo-500"></i>Provinsi
                </label>
                <select id="provinsi" onchange="loadKabupaten()" class="w-full border border-gray-200 px-4 py-3 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-transparent transition-all">
                  <option value="">Pilih Provinsi</option>
                </select>
              </div>

              <div>
                <label class="block text-sm font-medium text-gray-700 mb-2">
                  <i class="fas fa-city mr-2 text-indigo-500"></i>Kabupaten/Kota
                </label>
                <select id="kabupaten" class="w-full border border-gray-200 px-4 py-3 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-transparent transition-all">
                  <option value="">Pilih Kabupaten/Kota</option>
                </select>
              </div>
            </div>

            <div>
              <label class="block text-sm font-medium text-gray-700 mb-2">
                <i class="fas fa-map mr-2 text-indigo-500"></i>Alamat Lengkap
              </label>
              <textarea id="alamat" class="w-full border border-gray-200 px-4 py-3 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-transparent transition-all resize-none" rows="3" placeholder="Masukkan alamat lengkap perusahaan"></textarea>
            </div>

            <div>
              <label class="block text-sm font-medium text-gray-700 mb-2">
                <i class="fas fa-phone mr-2 text-indigo-500"></i>Nomor Telepon
              </label>
              <input type="text" class="w-full border border-gray-200 px-4 py-3 rounded-lg bg-gray-50 text-gray-600" value="{{ Auth::user()->telepon }}" readonly />
            </div>

            <div class="bg-gray-50 p-4 rounded-lg">
              <label class="flex items-start gap-3 cursor-pointer">
                <input type="checkbox" id="persetujuan" class="mt-1 w-4 h-4 text-indigo-600 border-2 border-gray-300 rounded focus:ring-indigo-500" />
                <div class="text-sm text-gray-700">
                  <strong>Persetujuan Data</strong><br>
                  Saya menyatakan bahwa data yang saya masukkan sudah benar dan saya setuju dengan syarat & ketentuan yang berlaku.
                </div>
              </label>
            </div>
          </div>
        </div>
      </div>

      <!-- Summary Sidebar -->
      <div class="lg:col-span-1">
        <div class="sticky top-8">
          <div class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden">
            <div class="bg-gradient-to-r from-green-600 to-emerald-600 p-6">
              <div class="flex items-center gap-3 text-white">
                <div class="w-10 h-10 bg-white/20 rounded-xl flex items-center justify-center">
                  <i class="fas fa-receipt text-lg"></i>
                </div>
                <div>
                  <h3 class="text-xl font-semibold">Ringkasan Order</h3>
                  <p class="text-green-100 text-sm">Detail pembayaran</p>
                </div>
              </div>
            </div>
            
            <div class="p-6 space-y-4">
              <div class="text-center">
                <div id="harga" class="text-3xl font-bold text-gray-800 mb-2">-</div>
                <div id="hargaPromo" class="space-y-1"></div>
              </div>
              
              <hr class="my-4">
              
              <div class="space-y-3 text-sm">
                <div class="flex justify-between">
                  <span class="text-gray-600">Data Center:</span>
                  <span class="font-medium" id="summary-dc">IDC 3D Jakart</span>
                </div>
                <div class="flex justify-between">
                  <span class="text-gray-600">Subdomain:</span>
                  <span class="font-medium" id="summary-subdomain">-.bncradius.com</span>
                </div>
                <div class="flex justify-between">
                  <span class="text-gray-600">Siklus:</span>
                  <span class="font-medium" id="summary-siklus">Bulanan</span>
                </div>
              </div>
              
              <button id="pay-button" type="button" class="w-full bg-gradient-to-r from-green-600 to-emerald-600 hover:from-green-700 hover:to-emerald-700 text-white px-6 py-4 rounded-xl font-semibold shadow-lg hover:shadow-xl transition-all transform hover:-translate-y-0.5 disabled:opacity-50 disabled:cursor-not-allowed">
                <i class="fas fa-credit-card mr-2"></i>
                Bayar Sekarang
              </button>
              
              <div class="text-center text-xs text-gray-500 mt-3">
                <i class="fas fa-shield-alt mr-1"></i>
                Pembayaran aman dengan enkripsi SSL
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

<script>
  function getSiklus() {
    return document.querySelector('input[name="siklus"]:checked').value;
  }

  function updateHarga() {
    const siklus = getSiklus();
    const paketSelect = document.getElementById('paket');
    const selectedOption = paketSelect.options[paketSelect.selectedIndex];

    const hargaBulanan = parseInt(selectedOption.dataset.hargaBulanan);
    const hargaTahunan = parseInt(selectedOption.dataset.hargaTahunan);
    const harga = siklus === 'tahunan' ? hargaTahunan : hargaBulanan;

    const formatted = new Intl.NumberFormat('id-ID', {
      style: 'currency',
      currency: 'IDR',
      minimumFractionDigits: 0
    }).format(harga);

    document.getElementById('harga').textContent = `${formatted}`;

    const hargaPromo = document.getElementById('hargaPromo');
    if (siklus === 'tahunan') {
      const coret = hargaBulanan * 12;
      hargaPromo.innerHTML = `
        <div class="text-sm text-gray-400 line-through">Rp${coret.toLocaleString('id-ID')}/12 bulan</div>
        <div class="text-sm text-green-600 font-medium">Anda Hemat Rp${(coret - hargaTahunan).toLocaleString('id-ID')}</div>
      `;
      hargaPromo.style.display = 'block';
    } else {
      hargaPromo.style.display = 'none';
    }

    // Update summary
    updateSummary();
  }

  function updateSummary() {
    const siklus = getSiklus();
    const dataCenter = document.getElementById('dataCenter').value;
    const subdomain = document.getElementById('subdomain').value || '-';

    document.getElementById('summary-dc').textContent = dataCenter === 'idc' ? 'IDC 3D Jakarta' : 'NCIX Pekanbaru';
    document.getElementById('summary-subdomain').textContent = `${subdomain}.bncradius.com`;
    document.getElementById('summary-siklus').textContent = siklus.charAt(0).toUpperCase() + siklus.slice(1);
  }

  function loadKabupaten() {
    const provId = document.getElementById('provinsi').value;
    const kabupatenSelect = document.getElementById('kabupaten');
    kabupatenSelect.innerHTML = '<option value="">Loading...</option>';

    fetch(`https://www.emsifa.com/api-wilayah-indonesia/api/regencies/${provId}.json`)
      .then(res => res.json())
      .then(kabupaten => {
        kabupatenSelect.innerHTML = '<option value="">Pilih Kabupaten/Kota</option>';
        kabupaten.forEach(k => {
          const option = document.createElement('option');
          option.value = k.name;
          option.textContent = k.name;
          kabupatenSelect.appendChild(option);
        });
      });
  }

  document.addEventListener('DOMContentLoaded', function () {
    updateHarga();
    
    // Load provinsi
    fetch('https://www.emsifa.com/api-wilayah-indonesia/api/provinces.json')
      .then(res => res.json())
      .then(provinsi => {
        const selectProvinsi = document.getElementById('provinsi');
        provinsi.forEach(p => {
          const option = document.createElement('option');
          option.value = p.id;
          option.textContent = p.name;
          selectProvinsi.appendChild(option);
        });
      });

    // Add event listeners
    document.getElementById('dataCenter').addEventListener('change', updateSummary);
    document.getElementById('subdomain').addEventListener('input', updateSummary);
  });

  document.getElementById('pay-button').addEventListener('click', function () {
    const siklus = getSiklus();
    const data = {
      data_center: document.getElementById('dataCenter').value,
      subdomain_url: document.getElementById('subdomain').value,
      siklus: siklus,
      harga: document.getElementById('paket').selectedOptions[0].dataset[`harga${siklus.charAt(0).toUpperCase() + siklus.slice(1)}`],
      nama_perusahaan: document.getElementById('namaPerusahaan').value,
      provinsi: document.getElementById('provinsi').selectedOptions[0].text,
      kabupaten: document.getElementById('kabupaten').value,
      alamat: document.getElementById('alamat').value,
      setuju: document.getElementById('persetujuan').checked
    };

    console.log('Data yang akan dikirim:', data);

    fetch('/subs', {
      method: 'POST',
      headers: {
        'Content-Type': 'application/json',
        'X-CSRF-TOKEN': '{{ csrf_token() }}'
      },
      body: JSON.stringify(data)
    })
    .then(response => {
      if (!response.ok) {
        throw new Error('Network response was not ok');
      }
      return response.json();
    })
    .then(data => {
      console.log('Respons dari server:', data);
      if (data.snapToken) {
        snap.pay(data.snapToken, {
          onSuccess: function(result) {
            window.location.href = '/invoice';
          },
          onPending: function(result) {
            alert('Menunggu pembayaran.');
          },
          onError: function(result) {
            alert('Pembayaran gagal!');
          },
          onClose: function() {
            alert('Anda menutup popup tanpa menyelesaikan pembayaran.');
          }
        });
      } else {
        alert('Gagal mendapatkan token pembayaran.');
      }
    })
    .catch(err => {
      console.error('Terjadi kesalahan:', err);
      alert('Terjadi kesalahan saat memproses pembayaran.');
    });
  });
</script>

</body>
</html>