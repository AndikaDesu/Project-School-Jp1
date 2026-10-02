<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Menu Kantin</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h1 class="mb-4">Data Menu Kantin</h1>
        <a href="{{ route('menus.create') }}" class="btn btn-primary mb-3">Tambah Menu</a>
        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif
        @if($menus->count() > 0)
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Nama</th>
                        <th>Jenis</th>
                        <th>Gambar</th>
                        <th>Keterangan</th>
                        <th>Harga</th>
                        <th>Stock</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($menus as $menu)
                        <tr>
                            <td>{{ $menu->nama }}</td>
                            <td>{{ ucfirst($menu->jenis) }}</td>
                            <td>
                                @if($menu->gambar)
                                    <img src="{{ asset('storage/' . $menu->gambar) }}" alt="{{ $menu->nama }}" width="50">
                                @else
                                    Tidak ada gambar
                                @endif
                            </td>
                            <td>{{ $menu->keterangan ?? '-' }}</td>
                            <td>Rp {{ number_format($menu->harga, 0, ',', '.') }}</td>
                            <td>{{ $menu->stock }}</td>
                            <td>
                                <a href="{{ route('menus.show', $menu) }}" class="btn btn-info btn-sm">Lihat</a>
                                <a href="{{ route('menus.edit', $menu) }}" class="btn btn-warning btn-sm">Edit</a>
                                <form action="{{ route('menus.destroy', $menu) }}" method="POST" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus menu ini?')">Hapus</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @else
            <p class="text-center">DATA MENU KANTIN BELUM TERSEDIA</p>
        @endif
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>