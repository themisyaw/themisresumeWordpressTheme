class ScrollSpy {
    constructor(options = {}) {
        this.menuSelector = options.menuSelector || '#menu';
        this.activeClass = options.activeClass || 'active';
        this.offset = options.offset || '-10% 0px -80% 0px';
        
        this.navLinks = document.querySelectorAll(`${this.menuSelector} a`);
        this.sections = this.getSections();
        
        // The "Lock" mechanism
        this.isScrolling = false; 

        if (this.navLinks.length > 0) {
            this.init();
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
        // 1. Click Logic with Lock
        this.navLinks.forEach(link => {
            link.addEventListener('click', (e) => {
                const targetId = link.getAttribute('href');
                const targetElement = document.querySelector(targetId);

                if (targetElement) {
                    e.preventDefault();
                    
                    // ACTIVATE THE LOCK
                    this.isScrolling = true;
                    this.updateActiveState(targetId.replace('#', ''));

                    targetElement.scrollIntoView({
                        behavior: 'smooth',
                        block: 'start'
                    });

                    // DEACTIVATE THE LOCK after scroll finishes
                    // We use a timeout or the 'scrollend' event
                    this.onScrollStop(() => {
                        this.isScrolling = false;
                    });
                }
            });
        });

        // 2. Observer Logic with Bypass
        const observerOptions = {
            root: null,
            rootMargin: this.offset,
            threshold: 0
        };

        const observer = new IntersectionObserver((entries) => {
            // If we are currently in a "Click Scroll", ignore the observer updates
            if (this.isScrolling) return;

            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    this.updateActiveState(entry.target.id);
                }
            });
        }, observerOptions);

        this.sections.forEach(section => observer.observe(section));
    }

    // Helper to detect when smooth scroll actually finishes
    onScrollStop(callback) {
        let isScrolling;
        window.addEventListener('scroll', () => {
            window.clearTimeout(isScrolling);
            isScrolling = setTimeout(() => {
                callback();
            }, 100); // 100ms after the last scroll event, we assume it's stopped
        }, { passive: true, once: false });
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