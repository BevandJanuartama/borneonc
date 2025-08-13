<?php

namespace App\Http\Controllers;

use App\Models\Router;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class RouterController extends Controller
{
    public function index()
    {
        $routers = Router::all();
        return view('admin-sub.routers.index', compact('routers'));
    }

    public function create()
    {
        return view('admin-sub.routers.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_router' => 'required|string|max:255',
            'tipe_koneksi' => 'required|in:ip_public,vpn_radius',
            'ip_address' => 'nullable|ip'
        ]);

        Router::create([
            'nama_router' => $request->nama_router,
            'tipe_koneksi' => $request->tipe_koneksi,
            'ip_address' => $request->tipe_koneksi === 'ip_public'
                ? $request->ip_address
                : '172.31.' . rand(0, 255) . '.' . rand(1, 254), // IP default random jika VPN RADIUS
            'secret' => Str::random(16),
        ]);

        return redirect()->route('routers.index')->with('success', 'Router berhasil ditambahkan.');
    }

    public function downloadScript($id)
    {
        $router = Router::findOrFail($id);

        // Generate script Mikrotik multi-line (contoh mirip RLRADIUS)
        $script = <<<RSC
    #COPY PASTE SEMUA SCRIPT RLRADIUS DIBAWAH INI KE NEW TERMINAL MIKROTIK
    #JIKA DIBUKA MENGGUNAKAN WINDOWS 11, AGAR TIDAK ERROR BUKA FILE INI DENGAN NOTEPAD++
    #Link download notepad++ = https://notepad-plus-plus.org/downloads
    #######################################################################
    /snmp community
    set [ find default=yes ] disabled=yes write-access=no
    add addresses=172.31.192.1 name=RLRADIUS write-access=yes
    /snmp
    set enabled=yes trap-community=RLRADIUS trap-version=2

    /system identity
    set name="{$router->nama_router}"

    /system clock
    set time-zone-autodetect=no time-zone-name=Asia/Makassar

    /radius incoming
    set accept=yes port=3799

    /ip dns
    set allow-remote-requests=yes

    /ppp profile
    add change-tcp-mss=yes comment="default by rlradius (jangan dirubah)" name=RLVPN only-one=yes use-encryption=yes

    /interface l2tp-client
    add connect-to=server4.rlcloud.id name=RLCLOUD profile=RLVPN user={$router->nama_router} password={$router->secret} disabled=no

    /system scheduler
    add interval=7s name=rlradiusfailover on-event="{\
        \n:global intname RLCLOUD\
        \n:global indexvpn ([:pick [/system clock get time] 6 8] % 15+1)\
        \n:global jenisvpn [/interface get \$intname type];\
        \n:global address \"server\$indexvpn.rlcloud.id\"\
        \n:local pingresult ([/ping 172.31.192.1 interface=\$intname count=5])\
        \n:if (\$pingresult = 0) do={\
        \n    /int set \$intname disabled=no;\
        \n    :if ( \$jenisvpn = \"sstp-out\" ) do={ /int sstp-client set connect-to=\$address comment=\"ServerVPN\$indexvpn\" [find name=\$intname] }\
        \n    :if ( \$jenisvpn = \"ovpn-out\" ) do={ /int ovpn-client set connect-to=\$address comment=\"ServerVPN\$indexvpn\" [find name=\$intname] }\
        \n    :if ( \$jenisvpn = \"l2tp-out\" ) do={ /int l2tp-client set connect-to=\$address comment=\"ServerVPN\$indexvpn\" [find name=\$intname] }\
        \n}\
        \n}" policy=ftp,reboot,read,write,policy,test,password,sniff,sensitive,romon
    RSC;

        $filename = "router_script_{$router->id}.rsc";

        // Simpan file
        Storage::disk('public')->put($filename, $script);

        // Update path script ke DB
        $router->update(['script_path' => $filename]);

        // Download file
        return response()->download(storage_path("app/public/{$filename}"));
    }
}
