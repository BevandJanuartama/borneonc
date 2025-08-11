<?php

namespace App\Http\Controllers;

use App\Models\Subscription;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Paket;
use Midtrans\Snap;
use Midtrans\Config;

class SubscriptionController extends Controller
{
    public function create(Request $request)
    {
        $pakets = Paket::all();
        $selectedPaketId = $request->paket_id;

        return view('user.subs-form', [
            'pakets' => $pakets,
            'selectedPaketId' => $selectedPaketId,
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'data_center'     => 'required',
            'subdomain_url'   => 'required|unique:subscriptions,subdomain_url',
            'siklus'          => 'required',
            'harga'           => 'required|numeric',
            'nama_perusahaan' => 'required',
            'provinsi'        => 'required',
            'kabupaten'       => 'required',
            'alamat'          => 'required',
            'setuju'          => 'accepted',
        ]);

        $subscription = Subscription::create([
            'user_id'         => Auth::id(),
            'data_center'     => $request->data_center,
            'subdomain_url'   => $request->subdomain_url,
            'siklus'          => $request->siklus,
            'harga'           => $request->harga,
            'nama_perusahaan' => $request->nama_perusahaan,
            'provinsi'        => $request->provinsi,
            'kabupaten'       => $request->kabupaten,
            'alamat'          => $request->alamat,
            'telepon'         => Auth::user()->telepon,
            'setuju'          => true,
            'status'          => 'belum dibayar'
        ]);

        // Midtrans config
        Config::$serverKey = config('midtrans.server_key');
        Config::$isProduction = false;
        Config::$isSanitized = true;
        Config::$is3ds = true;

        try {
            $orderId = 'SUBS-' . $subscription->id . '-' . time();

            $params = [
                'transaction_details' => [
                    'order_id' => $orderId,
                    'gross_amount' => $subscription->harga,
                ],
                'customer_details' => [
                    'first_name' => Auth::user()->name,
                    'phone' => Auth::user()->telepon,
                ],
            ];

            $snapToken = Snap::getSnapToken($params);

            return response()->json([
                'snapToken' => $snapToken,
                'order_id' => $orderId,
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'error' => 'Gagal membuat Snap Token: ' . $e->getMessage(),
            ], 500);
        }
    }
}
