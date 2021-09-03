import { Controller } from '@hotwired/stimulus';

export default class extends Controller {
    connect() {
        console.log('hey, there');
    }

    upload(event) {
        if (! event?.attachment?.file) {
            return
        }

        this._uploadAttachment(event.attachment);
    }

    _uploadAttachment(attachment) {
        const data = new FormData();
        data.append('attachment', attachment.file);

        window.axios.post('/attachments', data, {
            onUploadProgress(progressEvent) {
                attachment.setUploadProgress(progressEvent.loaded / progressEvent.total * 100);
            },
        }).then(({ data }) => {
            attachment.setAttributes({
                url: data.image_url,
            });
        });
    }
}
