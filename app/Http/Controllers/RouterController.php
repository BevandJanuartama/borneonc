<?php

namespace App\Http\Controllers;

use App\Models\Router;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class RouterController extends Controller
{
    // =================== LIST ROUTER =================== //
    public function index()
    {
        $routers = Router::all();
        return view('admin-sub.routers.index', compact('routers'));
    }

    // =================== CREATE ROUTER =================== //
    public function create()
    {
        return view('admin-sub.routers.create');
    }

    // =================== SIMPAN ROUTER =================== //
    public function store(Request $request)
    {
        $request->validate([
            'nama_router'  => 'required|string|max:255',
            'tipe_koneksi' => 'required|in:ip_public,vpn_radius',
            'ip_address'   => 'nullable|ip'
        ]);

        $router = Router::create([
            'nama_router'  => $request->nama_router,
            'tipe_koneksi' => $request->tipe_koneksi,
            'ip_address'   => $request->tipe_koneksi === 'ip_public'
                ? $request->ip_address
                : '172.31.' . rand(0, 255) . '.' . rand(1, 254),
            'secret'       => Str::random(16),
        ]);

        return redirect()->route('routers.index')
            ->with('success', 'Router berhasil ditambahkan.');
    }

    // =================== DOWNLOAD SCRIPT UNTUK MIKROTIK =================== //
    public function downloadScript($id)
    {
        $router = Router::findOrFail($id);

        $serverIp = "103.226.139.21"; // 🔹 IP VPS BNC
        $vpnName  = "BNCCLOUD";       // 🔹 Nama interface VPN
        $profile  = "BNCVPN";         // 🔹 Profile PPP

        $script = <<<RSC
#COPY PASTE SEMUA SCRIPT BNCRADIUS DIBAWAH INI KE NEW TERMINAL MIKROTIK
#######################################################################
/snmp community
set [ find default=yes ] disabled=yes write-access=no
add addresses=$serverIp name=BNCRADIUS write-access=yes
/snmp
set enabled=yes trap-community=BNCRADIUS trap-version=2

/system identity
set name="{$router->nama_router}"

/system clock
set time-zone-autodetect=no time-zone-name=Asia/Makassar

/radius incoming
set accept=yes port=3799

/ip dns
set allow-remote-requests=yes

/ppp profile
add change-tcp-mss=yes comment="default by bncradius (jangan dirubah)" name=$profile only-one=yes use-encryption=yes

/interface ovpn-client
add connect-to=$serverIp name=$vpnName profile=$profile user="{$router->nama_router}" password="{$router->secret}" disabled=no

# ✅ Auto reconnect jika VPN drop
/system scheduler
add interval=10s name=bncradius-reconnect on-event="{\
:global intname $vpnName;\
:local pingresult ([/ping $serverIp interface=\$intname count=3]);\
:if (\$pingresult = 0) do={\
    /interface ovpn-client disable \$intname;\
    :delay 2;\
    /interface ovpn-client enable \$intname;\
}\
}" policy=ftp,reboot,read,write,policy,test,password,sniff,sensitive,romon
RSC;

        $filename = "router_script_{$router->id}.rsc";

        Storage::disk('public')->put($filename, $script);

        $router->update(['script_path' => $filename]);

        return response()->download(storage_path("app/public/{$filename}"));
    }

    // =================== DOWNLOAD OVPN (OPSIONAL) =================== //
    public function downloadOVPN($id)
    {
        $router = Router::findOrFail($id);

        $config = <<<OVPN
client
dev tun
proto tcp
remote 103.226.139.21 1194
resolv-retry infinite
nobind
persist-key
persist-tun
remote-cert-tls server
cipher AES-256-CBC
auth SHA256
auth-user-pass
verb 3

# Username & Password otomatis dari DB
<auth-user-pass>
{$router->nama_router}
{$router->secret}
</auth-user-pass>
OVPN;

        $filename = $router->nama_router . ".ovpn";

        return response($config)
            ->header('Content-Type', 'application/x-openvpn-profile')
            ->header('Content-Disposition', "attachment; filename={$filename}");
    }

    // =================== VIEW OVPN (OPSIONAL) =================== //
    public function viewOVPN($id)
    {
        $router = Router::findOrFail($id);

        if (!$router->ovpn_path || !file_exists($router->ovpn_path)) {
            return back()->with('error', 'OVPN file tidak ditemukan.');
        }

        $content = file_get_contents($router->ovpn_path);
        return view('admin-sub.routers.view-ovpn', compact('router', 'content'));
    }
}
