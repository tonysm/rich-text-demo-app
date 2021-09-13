@props(['id', 'value', 'name', 'disabled' => false])

<div class="rounded-md group">
    <input type="hidden" id="{{ $id }}_input" name="{{ $name }}" value="{{ $value?->toTrixHtml() }}" />
    <div class="border border-gray-300 rounded-md focus-within:border-indigo-300 focus-within:ring focus-within:ring-indigo-200 focus-within:ring-opacity-50">
        <trix-toolbar id="{{ $id }}_toolbar" class="sticky top-0 z-10 p-2 pb-0 bg-white border-b border-gray-300 rounded-t-md"></trix-toolbar>

        <trix-editor
            id="{{ $id }}"
            input="{{ $id }}_input"
            toolbar="{{ $id }}_toolbar"
            {{ $disabled ? 'disabled' : '' }}
            {!! $attributes->merge(['class' => 'trix-content p-2 focus-0 outline-none ring-0 rounded-0 border-0']) !!}
            data-controller="trix-attachments"
            data-action="
                trix-attachment-add->trix-attachments#upload
            "
        >{{ $value }}</trix-editor>
    </div>
</div>
