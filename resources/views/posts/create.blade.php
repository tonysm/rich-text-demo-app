<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            <a href="{{ route('dashboard')}} ">Dashboard</a> / {{ __('New Post') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="p-8 rounded-lg bg-white">
                <div id="create_post">
                    <x-post-form :post="$post" />
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
