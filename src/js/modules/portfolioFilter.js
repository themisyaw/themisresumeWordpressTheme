import Animator from './animator.js';

class PortfolioFilter {
    constructor() {
        this.portfolioTimeline = document.querySelector('.portfolio-timeline');
        if (!this.portfolioTimeline) return;
        
        this.addCategoryClickListener();
        this.get_portfolio('All');
    }

    async get_portfolio(categoryName) {
        const url = categoryName === 'All' 
            ? `${resumeCVData.root_url}/wp-json/custom/v1/portfolio` 
            : `${resumeCVData.root_url}/wp-json/custom/v1/portfolio?category=${categoryName}`;

        try {
            const response = await fetch(url);
            console.log(response);
            const items = await response.json();
            this.portfolioTimeline.innerHTML = '';

            items.forEach(item => {
                let host = 'project.local';
                if (item.live_url) {
                    try { host = new URL(item.live_url).hostname; } catch (e) {}
                }

                const element = `
                <li class="proj fade-in-element">
                    <div class="collapsible-btn" id="btn-toggle-${item.id}">
                        <div class="mockup">
                            <div class="mockup-bar"><span class="dot"></span><span class="dot"></span><span class="dot"></span><span class="mockup-url">${host}</span></div>
                            <div class="mockup-preview">
                                ${item.img_url
                                    ? `<img src="${item.img_url}" alt="${item.title}">`
                                    : `<i class="fa fa-code" aria-hidden="true"></i>`
                                }
                            </div>
                        </div>
                        <h5 class="proj-title">${item.title}</h5>
                    </div>
                    <div class="collapsible-content" id="content-toggle-${item.id}" style="max-height: 0; overflow: hidden;">
                        <div class="proj-desc">${item.description}</div>
                        <div class="proj-links">
                            ${item.live_url ? `<a href="${item.live_url}" class="proj-link" target="_blank">Live project ↗</a>` : ''}
                            ${item.github ? `<a href="${item.github}" class="proj-link" target="_blank">Code ↗</a>` : ''}
                        </div>
                    </div>
                </li>`;
                this.portfolioTimeline.insertAdjacentHTML("beforeend", element);
            });

            
            this.addToggleEvents();
            Animator.observeAndShow('.proj');

        } catch (error) {
            console.error('Portfolio load failed:', error);
        }
    }

    addToggleEvents() {
        const btns = this.portfolioTimeline.querySelectorAll('.collapsible-btn');
        btns.forEach(btn => {
            btn.onclick = () => {
                const content = btn.nextElementSibling;
                if (content.style.maxHeight === '0px' || !content.style.maxHeight) {
                    content.style.maxHeight = content.scrollHeight + "px";
                } else {
                    content.style.maxHeight = '0px';
                }
            };
        });
    }

    addCategoryClickListener() {
        document.querySelector('.category-menu').addEventListener('click', (e) => {
            const btn = e.target.closest('.filter-btn');
            if (btn) {
                const cat = btn.dataset.category;
                this.get_portfolio(cat);
                
                document.querySelectorAll('.filter-btn').forEach(b => b.classList.remove('active-filter'));
                btn.classList.add('active-filter');
            }
        });
    }
}

export default PortfolioFilter;