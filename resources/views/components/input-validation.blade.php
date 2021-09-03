@props(['for' => ''])

@if ($errors->has($for))
<div class="mt-2 text-red-700">
    {{ $errors->first($for) }}
</div>
@endif
