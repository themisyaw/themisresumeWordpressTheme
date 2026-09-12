
import Animator from './animator.js';
class WorkExpFilter {
    constructor() {
        this.WorkExpTimeline = document.querySelector('.workexp-timeline');
        this.addCategoryClickListener();
        this.get_workExp('All');
    }

    async get_workExp(categoryName) {
        const url = categoryName === 'All' 
            ? `${resumeCVData.root_url}/wp-json/custom/v1/posts` 
            : `${resumeCVData.root_url}/wp-json/custom/v1/posts?category=${categoryName}`;

        try {
            const response = await fetch(url);
            if (!response.ok) throw new Error(`HTTP error! status: ${response.status}`);

            const posts = await response.json();
            this.WorkExpTimeline.innerHTML = '';

            posts.forEach(post => {
                const isCurrent = (post.to && post.to.current && post.to.current[0] === 'Current');
                const dates = isCurrent ? `${post.from} – present` : `${post.from} – ${post.to}`;

                const element = `
                <li class="entry inner-content">
                    <h5 class="black2 bold m-0">${post.title}<span class="entry-co"> — ${post.company}</span></h5>
                    <div class="entry-meta">${post.location} · ${dates}</div>
                    <div class="entry-desc">${post.description}</div>
                </li>`;

                this.WorkExpTimeline.insertAdjacentHTML("beforeend", element);
            });

           
            Animator.observeAndShow('.inner-content');

        } catch (error) {
            console.error('Fetch operation failed:', error);
            this.WorkExpTimeline.innerHTML = `<p class="text-center">Error loading experience.</p>`;
        }
    }

    addCategoryClickListener() {
        document.addEventListener('click', (event) => {
            const filterBtn = event.target.closest('.category-item') || event.target.closest('.filter-btn');
            if (filterBtn) {
                const categoryName = filterBtn.dataset.category; 
                this.get_workExp(categoryName);

                const allBtns = document.querySelectorAll('.filter-btn, .category-item');
                allBtns.forEach(btn => btn.classList.remove('active-filter'));
                filterBtn.classList.add('active-filter');
            }
        });
    }
}

export default WorkExpFilter;