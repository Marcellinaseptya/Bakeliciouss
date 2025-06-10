<!DOCTYPE html>
<html>
<head>
    <title>Keranjang</title>
    <style>
        body {
            font-family: sans-serif;
            background-color: #f0dfca;
            margin: 0;
            padding: 40px;
        }

        h2 {
            text-align: center;
            font-size: 32px;
            color: #4a2c2a;
            margin-bottom: 40px;
        }

        .keranjang-container {
            display: flex;
            justify-content: center;
            gap: 40px;
            flex-wrap: wrap;
        }

        .cart-items, .order-summary {
            background-color: #ffffff;
            border-radius: 12px;
            padding: 24px;
            box-shadow: 0 4px 10px rgba(0,0,0,0.1);
        }

        .cart-items {
            flex: 2;
            min-width: 500px;
        }

        .cart-header, .cart-item {
            display: grid;
            grid-template-columns: 100px 1fr 100px 100px 60px;
            align-items: center;
            gap: 10px;
            padding: 12px 0;
            border-bottom: 1px solid #e0e0e0;
        }

        .cart-header {
            font-weight: bold;
            border-bottom: 2px solid #000;
        }

        .cart-item img {
            width: 70px;
            border-radius: 10px;
        }

        .quantity {
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 5px;
            border: 1px solid #444;
            border-radius: 20px;
            padding: 4px 8px;
        }

        .quantity button {
            background: none;
            border: none;
            font-size: 18px;
            cursor: pointer;
        }

        .remove-btn {
            background: none;
            border: none;
            font-size: 18px;
            cursor: pointer;
            color: #8b0000;
        }

        .order-summary {
            flex: 1;
            min-width: 280px;
            background-color: #fdfaf6;
        }

        .order-summary h3 {
            font-size: 20px;
            margin-bottom: 16px;
        }

        .voucher {
            display: flex;
            margin-bottom: 20px;
        }

        .voucher input {
            flex: 1;
            padding: 8px;
            border: 1px solid #ccc;
            border-radius: 6px 0 0 6px;
        }

        .voucher button {
            padding: 8px 12px;
            border: none;
            background-color: #000;
            color: #fff;
            border-radius: 0 6px 6px 0;
            cursor: pointer;
        }

        .order-summary p {
            display: flex;
            justify-content: space-between;
            margin: 6px 0;
        }

        .checkout-btn {
            width: 100%;
            margin-top: 20px;
            padding: 12px;
            background-color: #000;
            color: #fff;
            border: none;
            border-radius: 8px;
            cursor: pointer;
        }
    </style>
</head>
<body>
    @include('layouts.navbar')
    <h2>Keranjang Belanja</h2>

    @if(session('success'))
        <p style="color: green; text-align:center;">{{ session('success') }}</p>
    @endif

    @if(count($keranjang) > 0)
    <div class="keranjang-container">
        <div class="cart-items">
            <div class="cart-header">
                <div>Gambar</div>
                <div>Produk</div>
                <div>Jumlah</div>
                <div>Total</div>
                <div>Hapus</div>
            </div>

            @foreach($keranjang as $id => $item)
            <div class="cart-item">
                <img src="{{ asset('storage/' . $item['gambar']) }}">
                <div>
                    <strong>{{ $item['nama'] }}</strong>
                    <br>
                    <small>Enak enak enak</small>
                </div>
                <div class="quantity">
                    <form method="POST" action="{{ route('keranjang.update', $id) }}">
                        @csrf
                        <button type="submit" name="action" value="kurang">-</button>
                        {{ $item['jumlah'] }}
                        <button type="submit" name="action" value="tambah">+</button>
                    </form>
                </div>
                <div>Rp {{ number_format($item['harga'] * $item['jumlah']) }}</div>
                <form method="POST" action="{{ route('keranjang.hapus', $id) }}">
                    @csrf
                    @method('DELETE')
                    <button class="remove-btn">🗑</button>
                </form>
            </div>
            @endforeach
        </div>

        <div class="order-summary">
            <h3>Order Sekarang</h3>
            <div class="voucher">
                <input type="text" placeholder="Discount Voucher">
                <button>Apply</button>
            </div>
            <p><span>Sub Total</span> <span>Rp {{ number_format($total) }}</span></p>
            <p><span>Delivery Fee</span> <span>Rp 50.000</span></p>
            <hr>
            <p><strong>Total</strong> <strong>Rp {{ number_format($total + 50000) }}</strong></p>
            <button class="checkout-btn">Checkout Now</button>
        </div>
    </div>
    @else
        <p style="text-align:center">Keranjang masih kosong.</p>
    @endif
</body>
</html>
