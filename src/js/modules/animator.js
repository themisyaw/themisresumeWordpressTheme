class Animator {
    /**
     * Watches elements and adds a class when they enter the viewport
     * @param {string} selector - The CSS selector to watch
     * @param {string} activeClass - The class to add (default: 'show')
     */
    static observeAndShow(selector, activeClass = 'show') {
        const elements = document.querySelectorAll(selector);
        
        const observerOptions = {
            threshold: 0.1, // Trigger when 10% of the element is visible
            rootMargin: '0px 0px -50px 0px' // Slight offset so it triggers just before entering
        };

        const observer = new IntersectionObserver((entries) => {
            entries.forEach((entry, index) => {
                if (entry.isIntersecting) {
                    // Optional: Add a tiny staggered delay based on appearance order
                    entry.target.style.transitionDelay = `${index * 0.05}s`;
                    entry.target.classList.add(activeClass);
                    // Stop watching once it has appeared
                    observer.unobserve(entry.target);
                }
            });
        }, observerOptions);

        elements.forEach(el => observer.observe(el));
    }
}

export default Animator;