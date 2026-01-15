@extends('layouts.user')

@section('content')
<h2 class="text-2xl font-bold mb-4">Film Sedang Tayang</h2>

<div class="grid grid-cols-4 gap-6">
    <div class="bg-white rounded shadow p-3">
        <img src="/poster.jpg" class="rounded mb-2">
        <h3 class="font-semibold">Judul Film</h3>
        <button class="mt-2 bg-black text-white px-4 py-1 rounded">
            Pesan Tiket
        </button>
    </div>
</div>
@endsection
