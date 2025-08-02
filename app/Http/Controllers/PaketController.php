<?php

namespace App\Http\Controllers;

use App\Models\Paket;
use Illuminate\Http\Request;

class PaketController extends Controller
{
    // Tampilkan semua paket
    public function index()
    {
        $pakets = Paket::all();
        return view('paket.index', compact('pakets'));
    }

    // Tampilkan form tambah paket
    public function create()
    {
        return view('paket.create');
    }

    // Simpan data paket baru
    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'harga_bulanan' => 'required',
            'mikrotik' => 'required',
            'langganan' => 'required',
            'voucher' => 'required',
            'user_online' => 'required',
            'vpn_tunnel' => 'boolean',
            'vpn_remote' => 'boolean',
            'whatsapp_gateway' => 'boolean',
            'payment_gateway' => 'boolean',
            'custom_domain' => 'boolean',
            'client_area' => 'boolean',
            'harga_tahunan' => 'required',
        ]);

        Paket::create($request->all());

        return redirect()->route('paket.index')->with('success', 'Paket berhasil ditambahkan.');
    }

    // Tampilkan detail paket (optional)
    public function show(Paket $paket)
    {
        return view('paket.show', compact('paket'));
    }

    // Tampilkan form edit paket
    public function edit(Paket $paket)
    {
        return view('paket.edit', compact('paket'));
    }

    // Update data paket
    public function update(Request $request, Paket $paket)
    {
        $request->validate([
            'nama' => 'required',
            'harga_bulanan' => 'required',
            'mikrotik' => 'required',
            'langganan' => 'required',
            'voucher' => 'required',
            'user_online' => 'required',
            'vpn_tunnel' => 'boolean',
            'vpn_remote' => 'boolean',
            'whatsapp_gateway' => 'boolean',
            'payment_gateway' => 'boolean',
            'custom_domain' => 'boolean',
            'client_area' => 'boolean',
            'harga_tahunan' => 'required',
        ]);

        $paket->update($request->all());

        return redirect()->route('paket.index')->with('success', 'Paket berhasil diperbarui.');
    }

    // Hapus paket
    public function destroy(Paket $paket)
    {
        $paket->delete();

        return redirect()->route('paket.index')->with('success', 'Paket berhasil dihapus.');
    }
}
