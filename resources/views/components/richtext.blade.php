@props(['id', 'value', 'name', 'disabled' => false])

<input type="hidden" id="{{ $id }}_input" name="{{ $name }}" value="{{ $value?->toTrixHtml() }}" />
<trix-editor id="{{ $id }}" input="{{ $id }}_input" {{ $disabled ? 'disabled' : '' }} {!! $attributes->merge(['class' => 'trix-content rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50']) !!}>{{ $value }}</trix-editor>
