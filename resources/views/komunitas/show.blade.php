<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>{{ $pertanyaan->judul }} - Komunitas</title>
    <link rel="stylesheet" href="{{ asset('css/komunitas.css') }}">
</head>
<body>
    @include('layouts.navbar')
    <a href="{{ route('komunitas.index') }}" class="back-link">← Kembali ke Forum</a>

    <div class="card">
        <h1>{{ $pertanyaan->judul }}</h1>
        <p><strong>{{ $pertanyaan->nama }}</strong> bertanya:</p>
        <p>{{ $pertanyaan->isi }}</p>
    </div>

    <a href="#jawabModal" class="open-button">+ Jawab Pertanyaan</a>

    {{-- Modal Form Jawaban --}}
    <div id="jawabModal" class="modal">
        <div class="modal-content">
            <a href="#" class="close">&times;</a>
            <h2>Jawab Pertanyaan</h2>
            <form action="{{ route('komunitas.jawab', $pertanyaan->id) }}" method="POST">
                @csrf
                <label>Nama:</label>
                <input type="text" name="nama" required>

                <label>Jawaban:</label>
                <textarea name="isi" rows="3" required></textarea>

                <button type="submit">Kirim Jawaban</button>
            </form>
        </div>
    </div>

    <hr>
    <h3>Jawaban:</h3>
    @forelse($pertanyaan->jawabans as $jawaban)
        <div class="card">
            <p><strong>{{ $jawaban->nama }}</strong> menjawab:</p>
            <p>{{ $jawaban->isi }}</p>
        </div>
    @empty
        <p>Belum ada jawaban.</p>
    @endforelse

</body>
</html>
