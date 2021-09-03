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
        <x-label for="content" :value="__('Content')" />

        <x-textarea id="content" rows="5" class="block mt-1 w-full" placeholder="Share something cool..." name="content" :value="old('title', $post->title)" required />

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
