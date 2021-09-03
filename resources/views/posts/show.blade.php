<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            <a href="{{ route('dashboard') }}">Dashboard</a> / Post #{{ $post->id }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="p-8 rounded-lg bg-white">
                <div class="relative">
                    <div class="text-xl font-semibold border-b pb-6">
                        {{ $post->title }}
                    </div>

                    <div class="absolute top-0 right-0">
                        <details class="relative">
                            <summary class="list-none">
                                <button type="button" onclick="this.parentNode.click()" class="text-gray-400 hover:text-gray-500">
                                    <x-icon type="dots-circle" />
                                </button>
                            </summary>

                            <div class="absolute top-6 right-0">
                                <ul class="divide-y rounded rounded-rt-0 border bg-white px-4 py-2 w-40">
                                    <li class="py-2"><a class="block w-full text-left" href="{{ route('posts.edit', $post) }}">Edit</a></li>
                                    <li class="py-2"><button class="block w-full text-left" form="delete_post">Delete</button></li>
                                </ul>

                                <form id="delete_post" onsubmit="if (! confirm('Are you sure you want to delete this post?')) { return false; }" action="{{ route('posts.destroy', $post) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                </form>
                            </div>
                        </details>
                    </div>
                </div>

                <div class="mt-4">
                    {!! clean($post->content) !!}
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
