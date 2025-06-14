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
                'nama_pelanggan' => null,
                'alamat' => null,
                'no_hp' => null,
            ]);

            // Simpan ke detail_transaksi
            foreach ($keranjang as $id_produk => $item) {
                DetailTransaksi::create([
                    'transaksi_id' => $transaksi->id,
                    'id_produk' => $id_produk,
                    'nama_produk' => $item['nama'],
                    'harga' => $item['harga'],
                    'jumlah' => $item['jumlah'],
                ]);
            }

            session()->forget('keranjang');
            DB::commit();

            // Arahkan ke form isi data
            return redirect()->route('transaksi.form.isiData', ['id' => $transaksi->id])
                 ->with('success', 'Checkout berhasil!');

        } catch (\Exception $e) {
            DB::rollback();
            return redirect()->back()->with('error', 'Gagal checkout: ' . $e->getMessage());
        }
    }

    // Form untuk mengisi data pelanggan
    public function formIsiData($id)
    {
        $transaksi = Transaksi::findOrFail($id);
        return view('transaksi.isi_data', compact('transaksi'));
    }

    // Menyimpan data pelanggan
    public function simpanDataPelanggan(Request $request, $id)
    {
        $request->validate([
            'nama_pelanggan' => 'required|string|max:255',
            'alamat' => 'required|string',
            'no_hp' => 'required|string|max:20',
        ]);

        $transaksi = Transaksi::findOrFail($id);
        $transaksi->update([
            'nama_pelanggan' => $request->nama_pelanggan,
            'alamat' => $request->alamat,
            'no_hp' => $request->no_hp,
        ]);

        return redirect()->route('transaksi.riwayat')->with('success', 'Data pelanggan berhasil disimpan!');
    }
    
}
