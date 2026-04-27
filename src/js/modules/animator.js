class Animator {
    /**
     * 
     * @param {string} selector - The CSS selector to watch
     * @param {string} activeClass - The class to add (default: 'show')
     */
    static observeAndShow(selector, activeClass = 'show') {
        const elements = document.querySelectorAll(selector);
        
        const observerOptions = {
            threshold: 0.1, 
            rootMargin: '0px 0px -50px 0px' 
        };

        const observer = new IntersectionObserver((entries) => {
            entries.forEach((entry, index) => {
                if (entry.isIntersecting) {
                   
                    entry.target.style.transitionDelay = `${index * 0.05}s`;
                    entry.target.classList.add(activeClass);
                   
                    observer.unobserve(entry.target);
                }
            });
        }, observerOptions);

        elements.forEach(el => observer.observe(el));
    }
}

export default Animator;