import { Controller } from '@hotwired/stimulus';

export default class extends Controller {
    static targets = ['tab', 'item'];

    filter(event) {
        const category = event.currentTarget.dataset.category;

        this.tabTargets.forEach((tab) => {
            const isActive = tab.dataset.category === category;
            tab.classList.toggle('is-active', isActive);
            tab.setAttribute('aria-pressed', isActive ? 'true' : 'false');
        });

        this.itemTargets.forEach((item) => {
            const matches = category === 'all' || item.dataset.category === category;
            item.hidden = !matches;
        });
    }
}
