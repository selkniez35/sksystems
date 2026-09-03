import { Controller } from '@hotwired/stimulus';

export default class extends Controller {
    static targets = ['overlay', 'description', 'counter', 'fileInput', 'fileName'];

    connect() {
        this.boundKeydown = this.onKeydown.bind(this);
    }

    open(event) {
        event.preventDefault();
        this.overlayTarget.hidden = false;
        document.body.classList.add('quote-modal-open');
        document.addEventListener('keydown', this.boundKeydown);
    }

    close() {
        this.overlayTarget.hidden = true;
        document.body.classList.remove('quote-modal-open');
        document.removeEventListener('keydown', this.boundKeydown);
    }

    onKeydown(event) {
        if (event.key === 'Escape') {
            this.close();
        }
    }

    updateCount() {
        const max = this.descriptionTarget.maxLength > 0 ? this.descriptionTarget.maxLength : 1000;
        this.counterTarget.textContent = `${this.descriptionTarget.value.length} / ${max}`;
    }

    updateFileName() {
        const file = this.fileInputTarget.files[0];
        this.fileNameTarget.textContent = file ? file.name : 'Cahier des charges, maquettes, documents... (PDF, PNG, JPG – Max. 10 Mo)';
    }
}
