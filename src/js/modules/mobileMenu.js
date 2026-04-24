class ScrollSpy {
    constructor(options = {}) {
        this.menuSelector = options.menuSelector || '#menu';
        this.activeClass = options.activeClass || 'active';
        this.offset = options.offset || '-10% 0px -80% 0px';
        
        this.navLinks = document.querySelectorAll(`${this.menuSelector} a`);
        this.sections = this.getSections();
        this.isScrolling = false; 

        if (this.navLinks.length > 0) {
            this.setInitialActive(); // Highlight the first item immediately
            this.init();
        }
    }

    // New: Logic to set the first item as active on load
    setInitialActive() {
        const hash = window.location.hash;
        if (hash) {
            // If the user arrived via a link like mysite.com/#portfolio
            this.updateActiveState(hash.replace('#', ''));
        } else {
            // Otherwise, default to the first link in the menu
            const firstId = this.navLinks[0].getAttribute('href').replace('#', '');
            this.updateActiveState(firstId);
        }
    }

    getSections() {
        return Array.from(this.navLinks)
            .map(link => {
                const id = link.getAttribute('href');
                return id.startsWith('#') ? document.querySelector(id) : null;
            })
            .filter(section => section !== null);
    }

    init() {
        this.navLinks.forEach(link => {
            link.addEventListener('click', (e) => {
                const targetId = link.getAttribute('href');
                const targetElement = document.querySelector(targetId);

                if (targetElement) {
                    e.preventDefault();
                    this.isScrolling = true;
                    this.updateActiveState(targetId.replace('#', ''));

                    targetElement.scrollIntoView({
                        behavior: 'smooth',
                        block: 'start'
                    });

                    this.onScrollStop(() => {
                        this.isScrolling = false;
                    });
                }
            });
        });

        const observerOptions = {
            root: null,
            rootMargin: this.offset,
            threshold: 0
        };

        const observer = new IntersectionObserver((entries) => {
            if (this.isScrolling) return;

            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    this.updateActiveState(entry.target.id);
                }
            });
        }, observerOptions);

        this.sections.forEach(section => observer.observe(section));
    }

    onScrollStop(callback) {
        let isScrolling;
        window.addEventListener('scroll', () => {
            window.clearTimeout(isScrolling);
            isScrolling = setTimeout(() => {
                callback();
            }, 100);
        }, { passive: true });
    }

    updateActiveState(id) {
        this.navLinks.forEach(link => {
            if (link.getAttribute('href') === `#${id}`) {
                link.classList.add(this.activeClass);
            } else {
                link.classList.remove(this.activeClass);
            }
        });
    }
}

document.addEventListener('DOMContentLoaded', () => {
    new ScrollSpy({ menuSelector: '#menu' });
});
export default ScrollSpy;