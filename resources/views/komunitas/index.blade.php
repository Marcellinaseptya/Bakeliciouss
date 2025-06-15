@extends('layouts.app')

@section('content')
<link rel="stylesheet" href="{{ asset('css/komunitas.css') }}">

<div class="container py-4">
    <h2 class="text-2xl font-bold mb-4 text-[#452725]">Forum Komunitas</h2>

    @if(session('success'))
        <div class="bg-green-200 text-green-800 p-3 rounded mb-4">
            {{ session('success') }}
        </div>
    @endif

    <form action="{{ route('komunitas.store') }}" method="POST" class="forum-form">
        @csrf
        <input type="text" name="nama" placeholder="Nama" required>
        <input type="text" name="judul" placeholder="Judul Pertanyaan" required>
        <textarea name="isi" placeholder="Tulis pertanyaanmu..." required></textarea>
        <button type="submit">Kirim Pertanyaan</button>
    </form>

    @forelse($pertanyaans as $pertanyaan)
        <div class="pertanyaan-card">
            <h3>{{ $pertanyaan->judul }}</h3>
            <p class="author">oleh {{ $pertanyaan->nama }}</p>
            <p class="isi">{{ $pertanyaan->isi }}</p>

            <div class="jawaban-wrapper">
                <strong>Jawaban:</strong>
                @if($pertanyaan->jawabans && count($pertanyaan->jawabans) > 0)
                    <ul>
                        @foreach($pertanyaan->jawabans as $jawaban)
                            <li>
                                <strong>{{ $jawaban->nama }}:</strong> {{ $jawaban->isi }}
                            </li>
                        @endforeach
                    </ul>
                @else
                    <p class="text-gray-500">Belum ada jawaban.</p>
                @endif
            </div>

            <form action="{{ route('komunitas.jawab', $pertanyaan->id) }}" method="POST" class="jawaban-form">
                @csrf
                <input type="text" name="nama" placeholder="Nama" required>
                <textarea name="isi" placeholder="Tulis jawaban..." required></textarea>
                <button type="submit">Kirim Jawaban</button>
            </form>
        </div>
    @empty
        <p class="text-center text-gray-600">Belum ada pertanyaan di forum.</p>
    @endforelse
</div>
@endsection
