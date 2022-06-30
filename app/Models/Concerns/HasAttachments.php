<?php

namespace App\Models\Concerns;

use App\Models\Attachment;

trait HasAttachments
{
    public function syncAttachmentsMeta()
    {
        $this->content->attachments()
            ->filter(fn ($attachment) => $attachment->attachable instanceof Attachment)
            ->each(fn ($attachment) => (
                $attachment->attachable->update([
                    'record' => $this,
                    'caption' => $attachment->node->getAttribute('caption'),
                ])
            ));
    }

    public function attachments()
    {
        return $this->morphMany(Attachment::class, 'record');
    }
}
