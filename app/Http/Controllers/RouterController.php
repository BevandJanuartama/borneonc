<?php

namespace App\Http\Controllers;

use App\Models\Router;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;

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

        // Isi file sederhana
        $script = "nama user: " . Auth::user()->name . "\n"
            . "nama router: " . $router->nama_router . "\n"
            . "jam download: " . now()->format('Y-m-d H:i:s') . "\n\n"
            . "ini script percobaan belum selesai";

        $filename = "router_script_{$router->id}.txt";

        // Simpan file ke storage
        Storage::disk('public')->put($filename, $script);

        // Update path script ke DB
        $router->update(['script_path' => $filename]);

        // Download file
        return response()->download(storage_path("app/public/{$filename}"));
    }

}
