@extends('layouts.app')

@section('content')
<div class="max-w-3xl mx-auto py-8 space-y-8">

    <h1 class="text-3xl font-bold text-center mb-6">Your Feed</h1>

    @foreach($posts as $post)
        <article class="bg-white shadow-md rounded-2xl w-full overflow-visible flex flex-col">
            <!-- Header -->
            <header class="flex items-center justify-between px-6 py-4 border-b">
                <div class="flex items-center space-x-4">
                    <div class="w-12 h-12 rounded-full bg-gray-200 flex items-center justify-center font-semibold text-gray-600">
                        {{ strtoupper(substr($post->user->name, 0, 1)) }}
                    </div>
                    <div>
                        <div class="font-semibold text-gray-800">{{ $post->user->name }}</div>
                        <div class="text-sm text-gray-400">{{ $post->created_at->diffForHumans() }}</div>
                    </div>
                </div>
            </header>

            <!-- Image (no fixed parent height, image decides height) -->
            <div class="w-full bg-gray-100 flex justify-center">
                <img
                  src="{{ Storage::url($post->image) }}"
                  alt="Post image"
                  class="object-contain w-full h-auto max-h-[900px] block"
                  loading="lazy"
                >
            </div>

            <!-- Caption -->
            <div class="px-6 py-5">
                <p class="text-gray-700">
                    <span class="font-semibold mr-2">{{ $post->user->name }}</span>
                    {{ $post->caption }}
                </p>
            </div>
        </article>
    @endforeach

    <div class="mt-6">
        {{ $posts->links() }}
    </div>
</div>
@endsection
