<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EcoTrip Transaction Mail</title>
</head>
<body>
    <h1>Transaksi anda di <b style="color: #134B40; font-weight: bold;">EcoTrip</b> berhasil!</h1>
    <div style="margin: 2rem 0;">
        <p>Berikut detail transaksi anda :</p>
        <table>
            <tr>
                <td>Kode Tiket</td>
                <td>:</td>
                <td>{{ $kode_tiket }}</td>
            </tr>
            <tr>
                <td>Pesanan</td>
                <td>:</td>
                <td>{{ $order }}</td>
            </tr>
            <tr>
                <td>Tanggal Tiket</td>
                <td>:</td>
                <td>{{ $date_tiket }}</td>
            </tr>
            <tr>
                <td>Tanggal Pesanan</td>
                <td>:</td>
                <td>{{ $date }}</td>
            </tr>
            <tr>
                <td>Total Harga</td>
                <td>:</td>
                <td>{{ $price }}</td>
            </tr>
        </table>
    </div>
    <div>
        <p>Silahkan melakukan pembayaran ke nomor rekening di bawah ini :</p>
        <span>7670533471 (Bank Central Asia) a/n EcoTrip</span>
    </div>
    <div style="margin-top: 2rem;">
        <p>Jika anda sudah melakukan pembayaran, silahkan menunggu konfirmasi dari admin</p>
        <p>Terima Kasih</p>
    </div>
</body>
</html>