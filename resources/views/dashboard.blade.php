<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Dashboard') }}
            </h2>

            <div>
                <a href="{{ route('posts.create') }}">
                    New Post
                </a>
            </div>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div id="posts" class="space-y-5">
                @forelse ($posts as $post)
                    <x-post-card :post="$post" />
                @empty
                    <x-posts-empty />
                @endforelse
            </div>
        </div>
    </div>
</x-app-layout>
