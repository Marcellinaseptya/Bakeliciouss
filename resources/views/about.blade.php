@extends('layouts.app')

@section('content')
@include('layouts.navbar')

<div class="container mx-auto p-6">
    <h1 class="text-3xl font-bold text-center mb-6">Tentang BakeLicious</h1>

    <p class="text-lg text-gray-700 text-center">
        BakeLicious adalah toko kue yang menghadirkan berbagai pilihan kue lezat dengan bahan berkualitas terbaik.
    </p>

    <div class="text-center mt-6">
        <img src="https://source.unsplash.com/600x400/?cake" alt="Toko Kue" class="mx-auto rounded-lg shadow-lg">
    </div>
</div>
@endsection
