<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Buku</title>
</head>
<body>
    <table class="table table-stripped">
        <thead>
            <tr>
                <th>id</th>
                <th>Judul Buku</th>
                <th>Penulis</th>
                <th>Harga</th>
                <th>Tanggal Terbit</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($data_buku as $buku)
            <tr> 
                <td>{{ $buku->id }}</td>
                <td>{{ $buku->judul }}</td>
                <td>{{ $buku->penulis }}</td>
                <td>{{ "Rp. " . number_format($buku->harga, 2, ',', '.') }}</td>
                <td>{{ \Carbon\Carbon::parse($buku->tgl_terbit)->format('d-m-Y') }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>

    <!-- Menampilkan jumlah buku -->
    <p><strong>Jumlah total data: {{ $jumlah_buku }}</strong></p>
    
    <!-- Menampilkan total harga semua buku di bawah tabel -->
    <p><strong>Total harga semua buku: Rp. {{ number_format($total_harga, 2, ',', '.') }}</strong></p>

</body>
</html>