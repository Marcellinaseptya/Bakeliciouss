<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Transaksi;
use App\Models\DetailTransaksi;
use Illuminate\Support\Facades\DB;

class CheckoutController extends Controller
{
    public function prosesCheckout()
    {
        $keranjang = session()->get('keranjang', []);
        if (empty($keranjang)) {
            return redirect()->back()->with('error', 'Keranjang masih kosong.');
        }

        DB::beginTransaction();
        try {
            // Hitung total harga
            $total = 0;
            foreach ($keranjang as $item) {
                $total += $item['harga'] * $item['jumlah'];
            }

            // Simpan ke tabel transaksi
            $transaksi = Transaksi::create([
                'total' => $total,
                'status' => 'pending',
            ]);

            // Simpan ke tabel detail_transaksi
            foreach ($keranjang as $id_produk => $item) {
                DetailTransaksi::create([
                    'transaksi_id' => $transaksi->id_transaksi,
                    'id_produk' => $id_produk,
                    'nama_produk' => $item['nama'],
                    'harga' => $item['harga'],
                    'jumlah' => $item['jumlah'],
                ]);
            }

            // Hapus isi keranjang
            session()->forget('keranjang');

            DB::commit();

            return redirect()->route('transaksi.riwayat')->with('success', 'Checkout berhasil!');
        } catch (\Exception $e) {
            DB::rollback();
            return redirect()->back()->with('error', 'Gagal checkout: ' . $e->getMessage());
        }
    }
}
