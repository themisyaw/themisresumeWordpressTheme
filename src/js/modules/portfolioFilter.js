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
                const element = `
                <li class="my-5 fade-in-element shadow portfolioitem overflow-hidden border-0"> 
                    <div class="row m-0 rounded collapsible-btn" id="btn-toggle-${item.id}" style="cursor: pointer;">
                        <div class="col-md-6 p-0 position-relative portfolio-image-container" style="min-height:200px;">
                            ${item.img_url 
                                ? `<img class="img-fluid rounded w-100 h-100" style="object-fit:contain;" src="${item.img_url}" alt="${item.title}">`
                                : `<div class="h-100 w-100 d-flex align-items-center justify-content-center bg-light"><i class="fa fa-code fa-2x text-muted opacity-50"></i></div>`
                            }
                        </div>
                        <div class="col-md-5 p-2 d-flex flex-column justify-content-center">
                            <h5 class="text-start border-secondary p-3 border-left m-0 black2 bold">${item.title}</h5> 
                        </div>
                        <div class="col-md-1 p-0 align-items-center justify-content-center d-flex">
                            <i class="fa fa-chevron-down text-secondary" aria-hidden="true"></i>
                        </div>
                    </div>  
                    <div class="row m-0 border-top collapsible-content" id="content-toggle-${item.id}" style="max-height: 0; overflow: hidden; transition: all 0.4s ease;">
                        <div class="col-12 p-4">
                           <div class="p-2 text-secondary">${item.description}</div>
                        </div>
                    </div>
                </li>`;
                this.portfolioTimeline.insertAdjacentHTML("beforeend", element);
            });

            
            this.addToggleEvents();
            Animator.observeAndShow('.portfolioitem');

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