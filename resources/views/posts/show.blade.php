@extends('layouts.app')

@section('content')
  <div class="max-w-3xl mx-auto bg-white rounded shadow overflow-hidden">
    <img src="{{ Storage::url($post->image) }}" class="w-full object-cover" style="height:500px;">
    <div class="p-4">
      <div class="text-sm text-gray-600">By {{ $post->user->name }} • {{ $post->created_at->diffForHumans() }}</div>
      <p class="mt-3">{{ $post->caption }}</p>

      @if(auth()->id() === $post->user_id)
        <form method="POST" action="{{ route('posts.destroy', $post) }}" class="mt-4">
          @csrf
          @method('DELETE')
          <button type="submit" class="px-3 py-1 bg-red-500 text-white rounded">Delete</button>
        </form>
      @endif
    </div>
  </div>
@endsection
