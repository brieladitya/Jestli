@extends('layouts.app')

@section('content')
<div class="max-w-3xl mx-auto bg-white p-6 rounded shadow">
    <h2 class="text-2xl font-bold mb-4">{{ $user->name }}’s Profile</h2>
    <p class="text-gray-600">Email: {{ $user->email }}</p>

    <div class="mt-6">
        <a href="{{ route('dashboard') }}" class="text-blue-600 underline">← Back to Feed</a>
    </div>
</div>
@endsection
