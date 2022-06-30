<figure class="attachment attachment--{{ $attachment->richTextPreviewable() ? 'preview' : 'file' }} attachment--{{ $media->extension }}">
    @if ($attachment->richTextPreviewable())
        <img src="{{ $attachment->getPreviewableUrl() }}" />
    @endif

    <figcaption class="attachment__caption">
        @if ($attachment->caption)
            {{ $attachment->caption }}
        @else
            <span class="attachment__name">{{ $media->filename }}</span>
            <span clas="attachment__size">{{ $media->humanReadableSize }}</span>
        @endif
    </figcaption>
</figure>
