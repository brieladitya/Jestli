@extends('layouts.app')

@section('content')
<div class="max-w-lg mx-auto bg-white p-8 rounded-2xl shadow-md">
    <h2 class="text-2xl font-bold mb-6">Create Post</h2>

    <form action="{{ route('posts.store') }}" method="POST" enctype="multipart/form-data" class="space-y-6">
        @csrf

        <!-- Image Upload -->
        <div>
            <label class="block text-gray-700 mb-2 font-semibold">Image</label>
            <input type="file" name="image" id="imageInput" accept="image/*"
                   class="block w-full text-gray-700 border border-gray-300 rounded-lg cursor-pointer focus:outline-none focus:ring focus:ring-blue-300"/>

            <!-- Preview box -->
            <div id="previewContainer"
                 class="mt-4 hidden relative w-full rounded-xl overflow-hidden bg-gray-100 border border-gray-200">
                <img id="previewImage"
                     class="object-cover aspect-square w-full rounded-lg"
                     alt="Image Preview"/>
                <button type="button"
                        id="removeImage"
                        class="absolute top-2 right-2 bg-white/80 hover:bg-white text-gray-700 text-sm px-2 py-1 rounded-md shadow">
                    ✕
                </button>
            </div>
        </div>

        <!-- Caption -->
        <div>
            <label for="caption" class="block text-gray-700 mb-2 font-semibold">Caption</label>
            <textarea name="caption" id="caption" rows="4"
                      class="w-full border border-gray-300 rounded-lg p-3 focus:ring focus:ring-blue-300"
                      placeholder="Write something..."></textarea>
        </div>

        <!-- Submit -->
        <button type="submit"
                class="bg-blue-600 hover:bg-blue-700 text-white font-semibold px-6 py-2 rounded-lg">
            Post
        </button>
    </form>
</div>

<!-- Live preview script -->
<script>
document.getElementById('imageInput').addEventListener('change', function(event) {
    const file = event.target.files[0];
    const previewContainer = document.getElementById('previewContainer');
    const previewImage = document.getElementById('previewImage');
    const removeButton = document.getElementById('removeImage');

    if (file) {
        const reader = new FileReader();
        reader.onload = e => {
            previewImage.src = e.target.result;
            previewContainer.classList.remove('hidden');
        };
        reader.readAsDataURL(file);
    }

    removeButton.addEventListener('click', () => {
        previewContainer.classList.add('hidden');
        previewImage.src = '';
        event.target.value = ''; // clear input
    });
});
</script>
@endsection
