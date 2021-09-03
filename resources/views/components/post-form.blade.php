<form method="POST" action="{{ $post->exists ? route('posts.update', $post) : route('posts.store') }}">
    @csrf
    @if ($post->exists)
        @method('PUT')
    @endif

    <!-- Post Title -->
    <div>
        <x-label for="title" :value="__('Title')" />

        <x-input id="title" class="block mt-1 w-full" placeholder="Type the title..." type="text" name="title" :value="old('title', $post->title)" required autofocus />

        <x-input-validation for="title" />
    </div>

    <!-- Post Content -->
    <div class="mt-4">
        <x-label for="content" :value="__('Content')" class="mb-1" />

        <x-richtext id="content" name="content" :value="$post->content" />

        <x-input-validation for="content" />
    </div>


    <div class="flex items-center justify-between mt-4">
        <div>
            @if ($post->exists)
                <a href="{{ route('posts.show', $post) }}">Cancel</a>
            @else
                <a href="{{ route('dashboard') }}">Cancel</a>
            @endif
        </div>

        <div class="flex items-center justify-end">
            <x-button class="ml-3">
                {{ __('Save') }}
            </x-button>
        </div>
    </div>
</form>
