<?php

namespace App\Http\Controllers;

use App\Models\Info;
use Illuminate\Http\Request;

class InfoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $infos = Info::orderBy('tanggal_kejadian', 'desc')->paginate(10);
        return view('admin-sub.info', compact('infos'));
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Info $info)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Info $info)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Info $info)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroyAll()
    {
        // Hapus semua log dan reset auto-increment
        \App\Models\Info::truncate();

        return redirect()->route('info.index')
                        ->with('success', 'Semua log berhasil dihapus');
    }
}
