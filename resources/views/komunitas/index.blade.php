<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Forum Komunitas Bakelicious</title>
    <link rel="stylesheet" href="{{ asset('css/komunitas.css') }}">
</head>
<body>
    @include('layouts.navbar')
    <h1>Forum Komunitas Bakelicious</h1>

    @if(session('success'))
        <p class="success">{{ session('success') }}</p>
    @endif

    <a href="#tanyaModal" class="open-button">+ Tulis Pertanyaan</a>

    {{-- Modal Form Pertanyaan --}}
    <div id="tanyaModal" class="modal">
        <div class="modal-content">
            <a href="#" class="close">&times;</a>
            <h2>Tulis Pertanyaan</h2>
            <form action="{{ route('komunitas.store') }}" method="POST">
                @csrf
                <label>Nama:</label>
                <input type="text" name="nama" required>

                <label>Judul Pertanyaan:</label>
                <input type="text" name="judul" required>

                <label>Isi Pertanyaan:</label>
                <textarea name="isi" rows="3" required></textarea>

                <button type="submit">Kirim Pertanyaan</button>
            </form>
        </div>
    </div>

    <hr>
    <h2>Diskusi Terbaru</h2>
    @foreach($pertanyaans as $pertanyaan)
        <div class="card">
            <h3>{{ $pertanyaan->judul }}</h3>
            <p><strong>{{ $pertanyaan->nama }}</strong> bertanya:</p>
            <p>{{ $pertanyaan->isi }}</p>
            <a href="{{ route('komunitas.show', $pertanyaan->id) }}" class="detail-link">Lihat & Jawab</a>
        </div>
    @endforeach

</body>
</html>
