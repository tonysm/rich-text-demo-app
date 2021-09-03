<div class="rounded border border-transparent hover:border-gray-100 hover:shadow bg-white">
    <a href="{{ route('posts.show', $post) }}" class="block w-full p-8">
        <div class="pb-6 border-b text-xl font-semibold">
            {{ $post->title }}
        </div>

        <div class="mt-4">
            {{ Str::limit($post->content->toPlainText(), 300) }}
        </div>
    </a>
</div>
