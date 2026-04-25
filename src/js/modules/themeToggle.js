class ThemeToggle {
    constructor() {
        this.btn = document.querySelector('#theme-switch');
        this.currentTheme = localStorage.getItem('theme');
        this.init();
    }

    init() {
        // 1. Set initial theme
        if (this.currentTheme) {
            document.documentElement.setAttribute('data-theme', this.currentTheme);
        } else if (window.matchMedia('(prefers-color-scheme: dark)').matches) {
            // Default to dark if OS is dark
            document.documentElement.setAttribute('data-theme', 'dark');
        }

        // 2. Add Event Listener
        if (this.btn) {
            this.btn.addEventListener('click', () => this.toggle());
        }
    }

    toggle() {
        let theme = document.documentElement.getAttribute('data-theme');
        let newTheme = (theme === 'dark') ? 'light' : 'dark';

        document.documentElement.setAttribute('data-theme', newTheme);
        localStorage.setItem('theme', newTheme);
    }
}

export default ThemeToggle;